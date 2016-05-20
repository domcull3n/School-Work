@extends('app')

@section('content')

    <h1>Create a New Content Area</h1>

    <hr/>

    {!! Form::model($content = new \App\Content, ['url' => 'content']) !!}
        @include('content.form', ['submitButtonText' => 'Add Content Area'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
