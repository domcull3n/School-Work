@extends('app')

@section('content')
    <h1>Articles</h1>

    <hr/>

    <a class="btn btn-default" href="/articles/create" role="button">Create Article</a>

    <hr/>

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{ url('/articles', $article->article_id) }}">{{ $article->name }} </a>
            </h2>

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
    @endforeach
@stop