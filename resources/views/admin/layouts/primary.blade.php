@extends('admin.layouts.base')

@section('header')
    @include('admin.parts.header')
@endsection

@section('sidebar')
    @include('admin.parts.sidebar')
@endsection

@section('content')
    @include('admin.parts.content')
@endsection

@section('footer')
    @include('admin.parts.footer')
@endsection

@section('control-sidebar')
    @include('admin.parts.control-sidebar')
@endsection

@if(session('success'))
    @component('admin.components.callouts.success', ['message' => session('success')])@endcomponent
@endif

@if(session('error'))
    @component('admin.components.callouts.error', ['message' => session('error')])@endcomponent
@endif