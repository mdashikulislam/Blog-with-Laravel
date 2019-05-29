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
                @if($categorys->count() > 0)
                @foreach($categorys as $result)
                    <tr>
                        <td>{{$result->name}}</td>
                        <td>
                            <a href="{{route('category.edit',['id'=> $result->id])}}" class="btn btn-info">Edit</a>

                        </td>
                        <td>
                            <a href="{{route('category.delete',['id'=>$result->id])}}" class="btn badge-danger msg">Delete</a>
                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
{{--@section('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.msg').on('click', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                href = $(this).attr('href');--}}
{{--                return bootbox.confirm('Are you sure?', function(result) {--}}
{{--                    if (result) {--}}
{{--                        window.location = href;--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}