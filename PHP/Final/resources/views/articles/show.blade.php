@extends('app')

@section('content')

    <article>
        <h2>
            Title: {{ $article->title }}
        </h2>

        <div class="body">Description: {{ $article->description }}</div>

        <div class="body">All Pages: {{ $article->all_pages }}</div>

        <div class="body">Page: {{ $article->page_id }}</div>

        <div class="body">Area: {{ $article->content_id }}</div>

        <div class="body">Created by: {{ $article->user_id }}</div>

        <div class="body">Created at: {{ $article->created_at }}</div>

        <div class="body">Modified by: {{ $article->user_modifyBy }}</div>

        <div class="body">Modified at: {{ $article->updated_at}}</div>

        <div class="body">{{ $article->html_snippet }}</div>
    </article>

    {{--@unless($article->tags->isEmpty())--}}
    {{--<h5>Tags:</h5>--}}
    {{--<ul>--}}
        {{--@foreach($article->tags as $tag)--}}
            {{--<li>{{ $tag->name }}</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--@endunless--}}
@stop