@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            All Post
        </div>
        <div class="card-body">
            @include('inc.message')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection