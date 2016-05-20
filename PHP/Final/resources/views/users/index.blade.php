@extends('app')

@section('content')
    <h1>Users</h1>

    <hr/>

    @foreach($users as $user)
        <article>
            <h2>
                <a href="{{ url('/users', $user->user_id) }}">{{ $user->name }} </a>
            </h2>

            <div class="body">Email: {{ $user->email }}</div>

            <div class="body">Password: {{ $user->password }}</div>

            <div class="body">Created by: {{ $user->user_id }}</div>

            <div class="body">Created at: {{ $user->created_at }}</div>

            <div class="body">Modified by: {{ $user->user_modifyBy }}</div>

            <div class="body">Modified at: {{ $user->updated_at }}</div>

            {{--@unless($user->permissions->isEmpty())--}}
                {{--<h5>Permissions:</h5>--}}
                {{--<ul>--}}
                    {{--@foreach($user->permissions as $permission)--}}
                        {{--<li>{{ $permission->name }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--@endunless--}}
        </article>
    @endforeach
@stop