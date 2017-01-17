@extends('back.master')
@section('title','Kost | Add')
@section('page_heading')
    <h2>Add</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="index-2.html">Home</a>
        </li>
        <li>
            <a href="#">Kost</a>
        </li>
        <li class="active">
            <a href="#">Add</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Basic Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop