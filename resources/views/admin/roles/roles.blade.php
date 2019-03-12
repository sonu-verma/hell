@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Roles</span>
                        <span class="pull-right"><a href="{{ URL("/roles/create/") }}">Add</a></span>

                    </div>

                    @if (\Session::has('delete'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('delete') !!}</li>
                            </ul>
                        </div>
                    @endif

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
                                <th>Title</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($roles) && count($roles) > 0)
                                @php
                                    $cnt = 0;
                                @endphp

                                @foreach($roles as $key=>$role)
                                    <tr>
                                        <td>{{++$cnt}}</td>
                                        <td>{{$role->role_name}}</td>
                                        <td>  <a href="{{ URL("/roles/edit/".$role->id)  }}">Edit</a> | <a href="{{ URL("/roles/delete/".$role->id)  }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
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
@endsection
