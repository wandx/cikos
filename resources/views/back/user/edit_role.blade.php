
@extends('back.master')
@section('title','Edit '.$role->display_name)
@section('page_heading')
    <h2>{{ucfirst($role->display_name)}}</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">User manager</a>
        </li>
        <li>
            <a href="#">Role</a>
        </li>
        <li class="active">
            <a href="#">{{$role->display_name}}</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="col-sm-12">
                {!! Form::model($role,['route'=>['bo.user.role.update','id'=>$role->id],'class'=>'form-horizontal','files'=>'true']) !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Display name</label>
                    <div class="col-sm-10">
                        {!! Form::text('display_name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Menus</label>
                    <div class="col-sm-10">
                        {!! Form::select('menus[]',$all_menus,$role->menu->pluck('id')->toArray(),['class'=>'form-control','multiple'=>'']) !!}
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