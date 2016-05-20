@extends('app')

@section('content')
    <h1>Content Areas</h1>

    <hr/>

    <a class="btn btn-default" href="/content/create" role="button">Create Content Area</a>

    <hr/>

    @foreach($contents as $content)
        <article>
            <h2>
                <a href="{{ url('content', $content->content_id) }}">{{ $content->name }} </a>
            </h2>

            <h2>
                Alias: {{ $content->alias }}
            </h2>

            <div class="body">Description: {{ $content->description }}</div>

            <div class="body">Display order: {{ $content->display_order }}</div>

            <div class="body">Created by: {{ $content->user_id}}</div>

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
    @endforeach
@stop