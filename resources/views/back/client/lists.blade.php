@extends('back.master')
@section('title','Client | Lists')
@section('page_heading')
    <h2>Client Lists</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Client manager</a>
        </li>
        <li class="active"><a href="#">Lists</a></li>
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
                                <span data-toggle="tooltip" title="Suspend {{$u->name}}">
                                    <button onclick="suspendUser({{$u->id}},'{{$u->name}}')" class="btn btn-xs btn-warning"><i class="fa fa-warning"></i></button>
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
        function suspendUser(id,name){
            swal({
                title:'Apakah anda yakin?',
                text:'User akan suspended',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Ya, suspend user',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/clientmanager/dosuspend/"+id,function(){
                    swal({
                        title:'Suspended!',
                        text:'User Suspended',
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