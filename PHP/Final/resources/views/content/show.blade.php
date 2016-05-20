@extends('app')

@section('content')

    <article>
        <h2>
            Alias: {{ $content->alias }}
        </h2>

        <div class="body">Description: {{ $content->description }}</div>

        <div class="body">Display order: {{ $content->display_order }}</div>

        <div class="body">Created by: {{ $content->user_id }}</div>

        <div class="body">Created at: {{ $content->created_at }}</div>

        <div class="body">Modified by: {{ $content->user_modifyBy }}</div>

        <div class="body">Modified at: {{ $content->updated_at }}</div>

        {{--@unless($content->articles->isEmpty())--}}
        {{--<h5>Articles:</h5>--}}
        {{--<ul>--}}
        {{--@foreach($content->articles as $article)--}}
        {{--<li>{{ $article->name }} on {{ $article->page }}</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--@endunless--}}

    </article>
@stop