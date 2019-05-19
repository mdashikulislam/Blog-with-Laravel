@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            create a new Post
        </div>
        <div class="card-body">
            <form action="{{route('post.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                    <label for="title">Titile</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button  class="btn btn-success" type="submit">Submit</button>
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