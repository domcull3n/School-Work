@extends('app')

@section('content')

    <article>
        <h2>
            {{ $template->name }}
        </h2>

        <div class="body">Description: {{ $template->description }}</div>

        <div class="body">Active State: {{ $template->active_state }}</div>

        <div class="body">Created by: {{ $template->user_id }}</div>

        <div class="body">Created at: {{ $template->created_at }}</div>

        <div class="body">Modified by: {{ $template->user_modifyBy }}</div>

        <div class="body">Modified at: {{ $template->updated_at }}</div>

        <div class="body">{{ $template->css }}</div>
    </article>
@stop