
@extends('back.master')
@section('title','User | Add Admin')
@section('page_heading')
    <h2>Add Admin</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">User manager</a>
        </li>
        <li class="active">
            <a href="#">Add</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="col-sm-12">
                {!! Form::open(['route'=>'bo.user.add.post','class'=>'form-horizontal','files'=>'true']) !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        {!! Form::email('email',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        {!! Form::password('password',['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Roles</label>
                    <div class="col-sm-10">
                        {!! Form::select('roles[]',$all_roles,null,['class'=>'form-control','multiple'=>'','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-10">
                        {!! Form::file('avatar',['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $('select').select2({'width':'100%'})
    </script>
@stop