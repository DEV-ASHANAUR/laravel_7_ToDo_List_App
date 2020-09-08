@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header">
                <span class="float-left" style="font-weight: bolder">Your Todos</span>
                <small class="float-right" id="last_updeath"><a href="{{ route('todo.index') }}" style="font-size: 20px"><i class="fa fa-arrow-circle-left"></i></a></small>
            </div>
            <div class="card-body">
                <h5 class="ml-2" style="text-transform: uppercase;">{{ $todos->title }} <i class="fa fa-arrow-down" style="color: red;font-size:15px;margin-top:5px;"></i></h5>
                 <table class="table ml-2">
                        @foreach ($task as $key => $item)
                            <tr>
                                <th style="text-transform: capitalize">{{ $key+1 }} . {{ $item }}</th>
                            </tr>
                        @endforeach
                 </table>
            </div>
        </div>
    </div>
</div>
    
@endsection