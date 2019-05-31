@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Category : {{$category->name}}
        </div>
        <div class="card-body">
            @include('inc.message')
            <form action="{{route('category.update',['id'=> $category->id])}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
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