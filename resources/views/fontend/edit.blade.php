@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4 m-auto">
        <form action="{{ route('todo.update',$todos->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <span class="float-left" style="font-weight: bolder">Edit Your Todo</span>
                    <small class="float-right"><a href="{{ route('todo.index') }}" style="font-size: 20px"><i class="fa fa-arrow-circle-left"></i></a></small>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <input type="text" name="title" value="{{ $todos->title }}" class="text-center" placeholder="Enter Title" required><br>
                        
                    </div>
                    <div class="d-block">
                        <h5 class="m-2 float-left">Add Your item</h5>

                        <small class="mb-2 text-success float-right" id="click" style="font-size: 20px"><i class="fa fa-plus-circle"></i></small>
                    </div>
                    <div id="itemgroup">
                        @foreach ($task as $key => $item)
                        <div>
                            <input type="text" name="todo[]" value="{{ $item }}" class="text-center mb-2 float-left" required>

                            <small class="mb-2 text-danger float-right rem" style="font-size: 20px"><i class="fa fa-window-close"></i></small>
                        </div>
                        @endforeach
                    </div>  
                </div>
                <div class="card-footer">
                    <button type="submit" style="">save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.rem').click(function(e){
                e.preventDefault();
                $(this).parent().remove();
            });

        var dd = $('.counter').length;
        $('#click').click(function(){
            dd++;
            // if(dd > 5){
            //     $('#fieldalert').removeClass('noshow');
            //     return;
            // }
            newDiv = $(document.createElement('div')).attr('class','d-block');
            newDiv.after().html('<input type="text" name="todo[]" class="float-left text-center mb-2" required><small class="float-right rem text-danger mb-2" style="font-size: 20px"><i class="fa fa-window-close"></i></small>');
            newDiv.appendTo('#itemgroup');

            $('.rem').click(function(e){
                e.preventDefault();
                $(this).parent().remove();
            });
        });
        
    });
</script>   
@endsection