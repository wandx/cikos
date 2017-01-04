@extends('back.master')
@section('title','Tokens')
@section('page_heading')
    <h2>Tokens</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Tokens</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <a href="{{route('bo.token.generate')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Generate</a>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th width="60%">Token</th>
                        <th width="15%">Request</th>
                        <th width="10%">Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tokens->count() > 0)
                        @foreach($tokens as $t)
                            <tr>
                                <td>
                                    <i class="fa fa-circle" style="color: {{ ($t->status == 'active') ? 'green' : 'orange'}};;"></i> &nbsp;

                                    {{$t->token}}</td>
                                <td>{{$t->request_count}}</td>
                                <td>
                                    <span class="static-value" style="cursor:pointer;">
                                        {{$t->request_limit}}
                                    </span>
                                    <input type="text" class="form-control hidden dynamic-value" value="{{$t->request_limit}}" data-id="{{$t->id}}">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a title="Refresh" href="{{route('bo.token.refresh',['id'=>$t->id])}}" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i></a>
                                        <button onclick="suspendToken({{$t->id}},'{{$t->token}}')" class="btn btn-warning btn-xs" title="Suspend"><i class="fa fa-warning"></i></button>
                                        <button onclick="restoreToken({{$t->id}},'{{$t->token}}')" class="btn btn-success btn-xs" title="Restore"><i class="fa fa-refresh"></i></button>
                                        <button onclick="deleteToken({{$t->id}},'{{$t->token}}')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="4">
                                No data
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('dblclick','.static-value',function(){
            $(this).toggleClass('hidden');
            $(this).next('.dynamic-value').toggleClass('hidden');
        })

        $(document).on('focusout','.dynamic-value',function(){
            var limit = $(this).val();
            var id = $(this).attr('data-id');
            var x = $(this);
            $.get('/backoffice/tokenmanager/update_limit/'+id+'/'+limit,function(){

                x.toggleClass('hidden');
                x.prev('.static-value').toggleClass('hidden').html(limit);

            });

        })
        function deleteToken(id,token) {
            swal({
                title:'Are you sure?',
                text:token+' will be deleted.',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Yes, delete token!',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/tokenmanager/delete/"+id,function(){
                    swal({
                        title:'Deleted!',
                        text:'Token deleted.',
                        type:'success',
                        timer:500,
                        showConfirmButton:false,
                    },function(){
                        location.reload();
                    });
                })

            });
        }

        function suspendToken(id,token) {
            swal({
                title:'Are you sure?',
                text:token+' will be suspend.',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Yes, suspend token!',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/tokenmanager/suspend/"+id,function(){
                    swal({
                        title:'Suspended!',
                        text:'Token suspended.',
                        type:'success',
                        timer:500,
                        showConfirmButton:false,
                    },function(){
                        location.reload();
                    });
                })

            });
        }

        function restoreToken(id,token) {
            swal({
                title:'Are you sure?',
                text:token+' will be restore.',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Yes, restore token!',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/tokenmanager/restore/"+id,function(){
                    swal({
                        title:'Restored!',
                        text:'Token restored.',
                        type:'success',
                        timer:500,
                        showConfirmButton:false,
                    },function(){
                        location.reload();
                    });
                })

            });
        }
    </script>
@stop