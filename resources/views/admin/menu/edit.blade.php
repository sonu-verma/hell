@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Menu</div>

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif


                    <div class="panel-body">

                        {{ Form::open(['name'=>'menu_create_form', 'id'=>'menu_create_form', 'method'=>'PUT', 'route'=>['menu.update',$menuData->id], 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
                        <div class="form-group">
                            @php
                                echo Form::label('menu_name', 'Menu Name');
                                echo Form::text('menu_name',$menuData->menu_name, array('class' => 'form-control','placeholder'=>'Please enter title'));
                            @endphp
                            @if($errors->first('menu_name'))
                                <span class="text-danger">{{$errors->first('menu_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            @php
                                echo Form::label('menu_url', 'Menu URL');
                                echo Form::text('menu_url',$menuData->menu_url, array('class' => 'form-control','placeholder'=>'Please enter url'));
                            @endphp
                            @if($errors->first('menu_name'))
                                <span class="text-danger">{{$errors->first('menu_url')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            @php
                                echo Form::label('parent', 'Select parent');
                                echo Form::select('parent', array('' => 'Select Parent','1' => 'Large', '2' => 'Small'),$menuData->parent_menu, array('class' => 'form-control'));
                            @endphp

                        </div>
                        <div class="form-group">
                            @php
                                echo Form::label('description', 'Enter desciption');
                                 echo Form::text('description',$menuData->description, array('class' => 'form-control','placeholder'=>'Please enter description'));
                            @endphp
                            @if($errors->first('menu_name'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
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
