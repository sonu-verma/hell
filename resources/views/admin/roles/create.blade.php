@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Role</div>

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        @if( isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif

                        <form action="{{ URL("/roles/save/") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Title</label>
                                <input type="text" class="form-control" name="role_name" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter Title">

                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>

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
