@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Menu</span>
                        <span class="pull-right"><a href="{{ URL("/menu/create/") }}">Add</a></span>

                    </div>

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Menu Title</th>
                                <th>Menu URL</th>
                                <th>Parent Menu</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($menus) && count($menus) > 0)
                                @php
                                    $cnt = 0;
                                @endphp

                                @foreach($menus as $key=>$menu)
                                    <tr>
                                        <td>{{++$cnt}}</td>
                                        <td>{{$menu->menu_name}}</td>
                                        <td>{{$menu->menu_url}}</td>
                                        <td>{{$menu->parent_menu}}</td>
                                        <td>{{$menu->description}}</td>
                                        <td> <a href="{{ URL("/menu/$menu->id/edit") }}">Edit</a> | <a href="javascript:void(0);" class="delete_menu" data-id ="{{ $menu->id }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr No</th>
                                <th>Menu Title</th>
                                <th>Menu URL</th>
                                <th>Parent Menu</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            setTimeout(function(){
               $('.alert-success').hide();
            }, 3000);


        });
    </script>

    <script>
        $(document).on('click','.delete_menu',function(e){
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type:'POST',
                url:"{{ url("menu/") }}/"+id,
                data:{id:id,_method:'DELETE', _token: '{{csrf_token()}}'},
                success: function (data) {
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log('eeeee');

                }
            });
        });
    </script>
@endsection
