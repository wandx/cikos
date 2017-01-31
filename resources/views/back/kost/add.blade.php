@extends('back.master')
@section('title','Kost | Add')
@section('page_heading')
    <h2>Add</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Kosts</a>
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

                    <div class="form-group">
                        <label for="">Latitude</label>
                        {!! Form::text('Latitude',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="">Longitude</label>
                        {!! Form::text('longitude',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="">User</label>
                        {!! Form::select('user_id',$users,null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Province</label>
                        {!! Form::select('province_id',$provinces,null,['class'=>'form-control select2','required'=>'true','placeholder'=>'Select Province']) !!}
                    </div>

                    <div class="form-group">
                        <label for="">City</label>
                        {!! Form::select('city_id',[],null,['class'=>'form-control select2','disabled','placeholder'=>'Select City']) !!}
                    </div>

                    <div class="form-group">
                        <label for="">District</label>
                        {!! Form::select('district_id',[],null,['class'=>'form-control select2','disabled','placeholder'=>'Select District']) !!}
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        {!! Form::text('address',null,['class'=>'form-control','required'=>'true','disabled']) !!}
                    </div>

                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        {!! Form::textarea('description',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary" id="picture-container">
        <div class="panel-heading">
            <h3 class="panel-title">Images</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-7">
                    <input type="file" name="img[]" class="form-control" required>
                </div>
                <div class="col-sm-4">
                    {!! Form::select('imgtype[]',[],null,['class'=>'form-control','required','placeholder'=>'Type']) !!}
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Facility</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="">Kost Facility</label>
                {!! Form::select('facilities[]',[],null,['class'=>'form-control multiple-select2','multiple']) !!}
            </div>
            <div class="form-group">
                <label for="">Public Facility</label>
                {!! Form::select('public_facilities[]',[],null,['class'=>'form-control multiple-select2','multiple']) !!}
            </div>
        </div>
    </div>

    <div class="panel panel-primary" id="rents-container">
        <div class="panel-heading">
            <h3 class="panel-title">Rents</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-7">
                    <input type="text" name="price[]" class="form-control" placeholder="Price" required>
                </div>
                <div class="col-sm-4">
                    {!! Form::select('type[]',[],null,['class'=>'form-control','required','placeholder'=>'Type']) !!}
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $('.select2').select2({
            width:'100%'
        });

        $('.multiple-select2').select2({
            width:'100%',
            tags:true
        });

        $(document).on('change','select[name="province_id"]',function(){
            var id = $(this).val();
            if(id !== ""){
                $.get('/misc/getCity/'+id,function(data){
                    $('select[name="city_id"]').html(data);
                    $('select[name="city_id"]').prop('disabled',false);
                    $('select[name="city_id"]').select2().trigger('change');
                })
            }else{
                $('select[name="city_id"]').val("");
                $('select[name="city_id"]').prop('disabled',true);
                $('select[name="city_id"]').select2().trigger('change');
            }

        })

        $(document).on('change','select[name="city_id"]',function(){
            var id = $(this).val();
            if(id !== ""){
                $.get('/misc/getDistrict/'+id,function(data){
                    $('select[name="district_id"]').html(data);
                    $('select[name="district_id"]').prop('disabled',false);
                    $('select[name="district_id"]').select2().trigger('change');
                })
            }else{
                $('select[name="district_id"]').val("");
                $('select[name="district_id"]').prop('disabled',true);
                $('select[name="district_id"]').trigger('change');
            }
        })

        $(document).on('change','select[name="district_id"]',function(){
            var id = $(this).val();

            if(id !== ""){
                $('input[name="address"]').prop('disabled',false);
            }else{
                $('[name="address"]').val("");
                $('input[name="address"]').prop('disabled',true);
            }
        })
    </script>
@stop