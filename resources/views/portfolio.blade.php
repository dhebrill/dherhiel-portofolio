@extends('layouts.app', ['profile' => $profile])

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.education')
    @include('sections.experience')
    @include('sections.achievements')
    @include('sections.projects')
    @include('sections.skills')
    @include('sections.certificates')
    @include('sections.contact')
    <x-image-modal />
@endsection
