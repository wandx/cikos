
@extends('back.master')
@section('title','Client | Add Client')
@section('page_heading')
    <h2>Add Client</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Client manager</a>
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
                {!! Form::open(['route'=>'bo.client.add.post','class'=>'form-horizontal','files'=>'true']) !!}
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
                        <div class="input-group">
                            {!! Form::password('password',['class'=>'form-control','required'=>'true']) !!}
                            <span class="input-group-addon" style="cursor:pointer;" id="pwdToggle"><i class="fa fa-eye"></i></span>
                        </div>

                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-2 control-label">Avatar</label>--}}
                    {{--<div class="col-sm-10">--}}
                        {{--{!! Form::file('avatar',['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Tambah</button>
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

        $('#pwdToggle').click(function () {
            var type = $(this).prev().attr('type');
            if(type == 'password'){
                $(this).prev().attr('type','text');
            }else{
                $(this).prev().attr('type','password');
            }

        });
    </script>
@stop