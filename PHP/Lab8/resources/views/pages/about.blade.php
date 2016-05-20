@extends('app')

@section('content')
    {{--@if($first == 'John')--}}
        {{--<h1>About Me: {{$first}} {{$last}}</h1>--}}
    {{--@else--}}
        {{--<h1>Else</h1>--}}
    {{--@endif--}}
    {{--<h1>About Me {{$first}} {{$last}}</h1>--}}

    <h1>About</h1>

    @if(count($people))
    <h3>People I Like:</h3>
    <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    @endif

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ultricies, lectus a vestibulum bibendum,
        urna ex facilisis lectus, ac tristique lorem arcu et justo. Ut finibus, enim sit amet vestibulum consectetur,
        lorem orci suscipit leo, eu tincidunt felis quam quis nisi.
    </p>
@stop