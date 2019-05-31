@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Tag : {{$tags->tag}}
        </div>
        <div class="card-body">
            @include('inc.message')
            <form action="{{route('tag.update',['id'=> $tags->id])}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="tag" class="form-control" value="{{$tags->tag}}">
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