@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Role</div>

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">

                        {{ Form::open(['name'=>'role_create_form', 'id'=>'role_create_form', 'method'=>'POST', 'URL'=>'/roles/update', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}

                        @php
                           echo Form::hidden('id', $roleData['id']);
                        @endphp

                        <div class="form-group">
                            @php
                                echo Form::label('role_name', 'Role Name');
                                echo Form::text('role_name',$roleData['role_name'], array('class' => 'form-control','placeholder'=>'Please enter role name'));
                            @endphp
                            {{--@if($errors->first('role_name'))--}}
                                {{--<span class="text-danger">{{$errors->first('role_name')}}</span>--}}
                            {{--@endif--}}
                        </div>

                        <div class="form-group">
                            @php
                                echo Form::submit('Save', array('class' => 'btn btn-primary'));
                            @endphp
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
