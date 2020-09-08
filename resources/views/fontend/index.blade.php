@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header">
                <span class="float-left"><a title="Click To Home" href="{{ route('home') }}" style="font-weight: bolder;color: #000;text-decoration:none;">All Your Todos</a></span>
                <small class="float-right" id="last_updeath"><a href="{{ route('todo.create') }}" style="font-size: 20px"><i class="fa fa-plus-circle"></i></a></small>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-primary alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>{{ session()->get('message') }}</strong>
                    </div>
                @endif
                 
                 <table class="table table-border-none">
                    
                     @if ($todos->count() >0)
                     @foreach ($todos as $todo)
                        <tr>
                            @if ($todo->status == 0)
                                <th><a href="{{ route('todo.com',$todo->id) }}" title="Uncomplete"><i class="fa fa-check gray"></i></a></th>
                            @else
                                <th><a href="{{ route('todo.uncom',$todo->id) }}" title="Complete"><i class="fa fa-check green"></i></a></th>
                            @endif
                            <th><a href="{{ route('todo.show',$todo->id) }}" style="color: #000;text-decoration:none;text-transform: capitalize">{{ $todo->title }}</a></th>
                            <th><a href="{{ route('todo.edit',$todo->id) }}" class="text-primary"><i class="fa fa-edit"></a></i></th>
                            <th><a href="{{ route('todo.destroy',$todo->id) }}" id="delete" title="Delete" class="text-danger"><i class="fa fa-trash"></i></a></th>
                        </tr>
                     @endforeach

                     @else
                        <h5>No Task Available,Create One.</h5>
                     @endif
                     
        
                 </table>
            </div>
        </div>
    </div>
</div>
   <style>
       .green{
        color: green;
       }
       .gray{
        color: #ddd;
       }
    </style> 
@endsection