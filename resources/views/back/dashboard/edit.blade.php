
@extends('back.master')
@section('title','Dashboard | Edit '.$admin->name)
@section('page_heading')
    <h2>{{ucfirst($admin->name)}}</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li class="active">
            <a href="#">Edit profile</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="col-sm-12">
                {!! Form::model($admin,['route'=>'bo.editprofile.post','class'=>'form-horizontal','files'=>'true']) !!}
                <div class="col-sm-2">
                    <img src="{{asset($admin->avatar)}}" class="img-rounded" style="width: 100%;">
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            {!! Form::email('email',null,['class'=>'form-control','disabled'=>'true']) !!}
                        </div>
                    </div>
                    @if(\App\Libs\Bo::hasUserAccess())
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Roles</label>
                            <div class="col-sm-10">
                                {!! Form::select('roles[]',$all_roles,$admin->role->pluck('id')->toArray(),['class'=>'form-control','multiple'=>'']) !!}
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Avatar</label>
                        <div class="col-sm-10">
                            {!! Form::file('avatar',['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <input type="hidden" value="{{$admin->avatar}}" name="old_img">

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
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