import * as THREE from 'three';

/**
 * Interactive particle sphere ("data network") for the hero.
 * - Points forming a sphere, cyan -> purple vertical gradient.
 * - Thin wireframe sphere inside.
 * - Auto-rotates. On desktop the user can drag to rotate (rotate only).
 * - On mobile/touch, manual drag is disabled (auto-rotate only).
 * - Rendering pauses when the canvas leaves the viewport (perf).
 */
export function initHero(container) {
    if (!container) return;

    const isTouch = window.matchMedia('(pointer: coarse)').matches;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let width = container.clientWidth;
    let height = container.clientHeight;

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(50, width / height, 0.1, 100);
    camera.position.z = 6;

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(width, height);
    renderer.setClearColor(0x000000, 0); // transparent
    container.appendChild(renderer.domElement);

    // Group holds both the points and wireframe so they rotate together.
    const group = new THREE.Group();
    scene.add(group);

    // ---- Particle sphere ----
    const PARTICLE_COUNT = isTouch ? 1400 : 2600; // limited for performance
    const radius = 2.4;
    const positions = new Float32Array(PARTICLE_COUNT * 3);
    const colors = new Float32Array(PARTICLE_COUNT * 3);

    const colorTop = new THREE.Color(0x22d3ee);    // cyan
    const colorBottom = new THREE.Color(0xa855f7); // purple

    for (let i = 0; i < PARTICLE_COUNT; i++) {
        // Even distribution on a sphere (golden spiral).
        const t = i / PARTICLE_COUNT;
        const phi = Math.acos(1 - 2 * t);
        const theta = Math.PI * (1 + Math.sqrt(5)) * i;

        const x = radius * Math.sin(phi) * Math.cos(theta);
        const y = radius * Math.cos(phi);
        const z = radius * Math.sin(phi) * Math.sin(theta);

        positions[i * 3] = x;
        positions[i * 3 + 1] = y;
        positions[i * 3 + 2] = z;

        // Vertical gradient cyan(top) -> purple(bottom).
        const mix = (y / radius + 1) / 2;
        const c = colorBottom.clone().lerp(colorTop, mix);
        colors[i * 3] = c.r;
        colors[i * 3 + 1] = c.g;
        colors[i * 3 + 2] = c.b;
    }

    const pointsGeometry = new THREE.BufferGeometry();
    pointsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    pointsGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    const pointsMaterial = new THREE.PointsMaterial({
        size: 0.045,
        vertexColors: true,
        transparent: true,
        opacity: 0.95,
        depthWrite: false,
        blending: THREE.AdditiveBlending,
    });

    const points = new THREE.Points(pointsGeometry, pointsMaterial);
    group.add(points);

    // ---- Inner wireframe sphere ----
    const wireGeometry = new THREE.IcosahedronGeometry(radius * 0.82, 2);
    const wireMaterial = new THREE.MeshBasicMaterial({
        color: 0x22d3ee,
        wireframe: true,
        transparent: true,
        opacity: 0.12,
    });
    const wireframe = new THREE.Mesh(wireGeometry, wireMaterial);
    group.add(wireframe);

    // ---- Glow core (fakes a soft bloom without post-processing deps) ----
    const glowGeometry = new THREE.SphereGeometry(radius * 0.4, 32, 32);
    const glowMaterial = new THREE.MeshBasicMaterial({
        color: 0xa855f7,
        transparent: true,
        opacity: 0.08,
        blending: THREE.AdditiveBlending,
    });
    group.add(new THREE.Mesh(glowGeometry, glowMaterial));

    // ---- Manual rotation (desktop only) ----
    const rotation = { x: 0, y: 0 };
    const target = { x: 0, y: 0 };
    let isDragging = false;
    let prev = { x: 0, y: 0 };

    function onPointerDown(e) {
        isDragging = true;
        prev = { x: e.clientX, y: e.clientY };
    }
    function onPointerMove(e) {
        if (!isDragging) return;
        const dx = e.clientX - prev.x;
        const dy = e.clientY - prev.y;
        target.y += dx * 0.005;
        target.x += dy * 0.005;
        target.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, target.x));
        prev = { x: e.clientX, y: e.clientY };
    }
    function onPointerUp() {
        isDragging = false;
    }

    if (!isTouch) {
        renderer.domElement.style.cursor = 'grab';
        renderer.domElement.addEventListener('pointerdown', (e) => {
            renderer.domElement.style.cursor = 'grabbing';
            onPointerDown(e);
        });
        window.addEventListener('pointermove', onPointerMove);
        window.addEventListener('pointerup', () => {
            renderer.domElement.style.cursor = 'grab';
            onPointerUp();
        });
    }

    // ---- Render loop with viewport-based pausing ----
    let isInView = true;
    const clock = new THREE.Clock();
    let frameId = null;

    const observer = new IntersectionObserver(
        ([entry]) => {
            isInView = entry.isIntersecting;
            if (isInView && frameId === null) animate();
        },
        { threshold: 0.05 }
    );
    observer.observe(container);

    function animate() {
        if (!isInView) {
            frameId = null;
            return;
        }
        frameId = requestAnimationFrame(animate);

        const delta = clock.getDelta();
        const autoSpeed = reducedMotion ? 0 : 0.18;

        // Auto-rotate around Y, ease toward manual target.
        target.y += autoSpeed * delta;
        rotation.x += (target.x - rotation.x) * 0.08;
        rotation.y += (target.y - rotation.y) * 0.08;

        group.rotation.x = rotation.x;
        group.rotation.y = rotation.y;
        wireframe.rotation.y -= 0.0015;

        renderer.render(scene, camera);
    }

    animate();

    // ---- Resize ----
    function onResize() {
        width = container.clientWidth;
        height = container.clientHeight;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    }
    window.addEventListener('resize', onResize);

    // Cleanup handle (optional).
    return function destroy() {
        observer.disconnect();
        window.removeEventListener('resize', onResize);
        if (frameId) cancelAnimationFrame(frameId);
        renderer.dispose();
        pointsGeometry.dispose();
        pointsMaterial.dispose();
        wireGeometry.dispose();
        wireMaterial.dispose();
        container.removeChild(renderer.domElement);
    };
}
