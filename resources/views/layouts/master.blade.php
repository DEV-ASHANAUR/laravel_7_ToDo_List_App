<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('fontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('fontend') }}/css/fontawesome-all.min.css">
    <script src="{{ url('fontend') }}/js/jquery-2.1.4.min.js"></script>
    <script src="{{ url('fontend') }}/js/plugins.js"></script>
    <script src="{{ url('fontend') }}/js/sweetalert.js"></script>
    {{-- <style>
        .noshow{
            display: none;
        }
    </style> --}}
</head>
<body>
    <div class="container mt-5">
        @yield('content')
        
        <!-- <h3 class="text-center text-muted mt-4">Add More Item</h3>
        <form action="">
            <div id="itemgroup">
                <div class="form-row">
                    <div class="form-group col-md-6 m-auto">
                        <input type="text" class="form-control mb-2 counter" name="addmore[]" placeholder="Add Item 1">
                    </div>
                    <div class="form-group col-md-2 text-left">
                        <span class="btn btn-warning mt-2 mb-2" id="click"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
                
            </div> -->
            <!-- <div class="form-group col-md-6 m-auto text-right">
                <span class="btn btn-warning mt-2 mb-2" id="click"><i class="fa fa-plus"></i></span>
            </div> -->
            <!-- <div class="form-group col-md-6 m-auto">
                <div class="alert alert-danger alert-dismissable noshow" id="fieldalert">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Sorry !</strong>You've reached the maximum limit.
                </div>
            </div>
            
        </form> -->
    </div>
    <script>
        $(document).ready(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                });
        });
        });
    </script>
</body>
</html>