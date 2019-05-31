@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Post : {{$post->title}}
        </div>
        <div class="card-body">
            @include('inc.message')
            <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titile</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="" class="form-control" >
                        @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="contents" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button  class="btn btn-success" type="submit">Update Post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .card-body input[type='file']{
            height: auto!important;
        }
    </style>
@endsection