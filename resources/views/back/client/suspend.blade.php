@extends('back.master')
@section('title','Client | Suspend')
@section('page_heading')
    <h2>Suspended Client Lists</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Client manager</a>
        </li>
        <li class="active"><a href="#">Suspended</a></li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach($users as $u)
                        <tr>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{\Carbon\Carbon::parse($u->created_at)->format('d M Y')}}</td>
                            <td>
                                <span data-toggle="tooltip" title="Restore {{$u->name}}">
                                    <button onclick="restoreUser({{$u->id}},'{{$u->name}}')" class="btn btn-xs btn-info"><i class="fa fa-refresh"></i></button>
                                </span>
                                <span data-toggle="tooltip" title="Delete {{$u->name}}">
                                    <button onclick="deleteUser({{$u->id}},'{{$u->name}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4">No Data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{$users->render()}}
    </div>


@stop

@section('scripts')
    <script>
        function restoreUser(id,name){
            swal({
                title:'Apakah anda yakin?',
                text:'User akan pulih kembali',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Ya, pulihkan user',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/clientmanager/dorestore/"+id,function(){
                    swal({
                        title:'Pulih!',
                        text:'User Berhasil dipulihkan',
                        type:'success',
                        timer:500,
                        showConfirmButton:false,
                    },function(){
                        location.reload();
                    });
                })

            });
        }

        function deleteUser(id,name){
            swal({
                title:'Apakah anda yakin?',
                text:'User akan dihapus secara permanen!',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Ya, hapus user',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/clientmanager/dodelete/"+id,function(){
                    swal({
                        title:'Terhapus',
                        text:'User Berhasil dihapus',
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