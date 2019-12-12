@extends('layouts.app')

@section('content')
    <div class="container">
        <b>@lang('ID'):</b> {{$post->id}}
        <br>
       <b>@lang('Title'):</b>  {{$post->title}}
        <br>
        <b>@lang('Content'):</b> {{$post->content}}
    </div>
@endsection
