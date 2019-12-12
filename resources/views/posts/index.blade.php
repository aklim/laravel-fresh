@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>@lang('ID')</th>
                <th>@lang('Title')</th>
                <th>@lang('Created At')</th>
                <th>@lang('Updated At')</th>
                <th>@lang('Action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>@if($post->created_at) {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }} @endif</td>
                    <td>@if($post->updated_at) {{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d H:i') }} @endif</td>
                    <td class="text-center">
                        <a href="/posts/{{$post->id}}" role="button" class="btn btn-primary">@lang('View')</a>
                        <a href="/posts/{{$post->id}}/edit" role="button" class="btn btn-primary">@lang('Edit')</a>
                        <a href="/posts/{{$post->id}}/edit" role="button" class="btn btn-primary"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$post->id}}').submit();">@lang('Delete')</a>

                        <form id="delete-form-{{$post->id}}" action="posts/{{$post->id}}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-12 text-right">
            <a role="button" class="btn btn-success" href="/posts/create">@lang('Create')</a>
        </div>
    </div>
@endsection
