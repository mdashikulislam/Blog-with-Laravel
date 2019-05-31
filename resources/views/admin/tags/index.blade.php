@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            All Category
        </div>
        <div class="card-body">
            @include('inc.message')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>
                </thead>
                <tbody>
                @if($tags->count() > 0)
                    @foreach($tags as $result)
                        <tr>
                            <td>{{$result->tag}}</td>
                            <td>
                                <a href="{{route('tag.edit',['id'=> $result->id])}}" class="btn btn-info">Edit</a>

                            </td>
                            <td>
                                <a href="{{route('tag.delete',['id'=>$result->id])}}" class="btn badge-danger msg">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" style="text-align: center;">No Publish Tag</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
