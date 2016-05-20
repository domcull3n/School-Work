@extends('app')

@section('content')

<article>
    <h2>
        Alias: {{ $page->alias }}
    </h2>

    <div class="body">Description: {{ $page->description }}</div>

    <div class="body">Created by: {{ $page->user_id }}</div>

    <div class="body">Created at: {{ $page->created_at }}</div>

    <div class="body">Modified by: {{ $page->user_modifyBy }}</div>

    <div class="body">Modified at: {{ $page->updated_at }}</div>

    {{--@unless($page->articles->isEmpty())--}}
    {{--<h5>Assigned Articles:</h5>--}}
    {{--<ul>--}}
    {{--@foreach($page->articles as $article)--}}
    {{--<li>{{ $article->name }}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--@endunless--}}

</article>
@stop