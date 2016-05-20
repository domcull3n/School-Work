@extends('app')

@section('content')

    <h1>Create a New CSS Template</h1>

    <hr/>

    {!! Form::model($css = new \App\Css, ['url' => 'templates']) !!}
        @include('templates.form', ['submitButtonText' => 'Add CSS Template'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
