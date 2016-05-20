@extends('app')

@section('content')
    <h1>CSS Templates</h1>

    <hr/>

    <a class="btn btn-default" href="/templates/create" role="button">Create CSS Template</a>

    <hr/>

    @foreach($templates as $template)
        <article>
            <h2>
                <a href="{{ url('/templates', $template->template_id) }}">{{ $template->name }} </a>
            </h2>

            <div class="body">Description: {{ $template->description }}</div>

            <div class="body">Active State: {{ $template->active_state }}</div>

            <div class="body">Created by: {{ $template->user_id }}</div>

            <div class="body">Created at: {{ $template->created_at }}</div>

            <div class="body">Modified by: {{ $template->user_modifyBy }}</div>

            <div class="body">Modified at: {{ $template->updated_at }}</div>

            <div class="body">{{ $template->css }}</div>
        </article>
    @endforeach
@stop