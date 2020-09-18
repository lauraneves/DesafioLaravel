@extends('admin.layouts.app')
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastrar um Curso')
        @slot('url', route('courses.store'))
        @slot('form')
            @include('admin.courses.form', ['show' => false])
        @endslot
    @endcomponent
@endsection
