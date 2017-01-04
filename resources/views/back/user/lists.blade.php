@extends('back.master')
@section('title','User | List')
@section('page_heading')
    <h2>User Lists</h2>
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
            <a href="#">List</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($admins->count() > 0)
                    @foreach($admins as $a)
                        <tr>
                            <td>{{$a->name}}</td>
                            <td>{{$a->email}}</td>
                            <td>
                                @foreach($a->role as $r)
                                    <?php $role_list .= "<span class='label label-primary'>".$r->display_name."</span> ";?>
                                @endforeach
                                <?php
                                $role_list = trim($role_list,' ');
                                echo $role_list;
                                $role_list = '';
                                ?>
                            </td>
                            <td>
                            <span data-toggle="tooltip" title="Edit {{$a->name}}">
                                <a href="{{route('bo.user.edit',['id'=>$a->id])}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            </span>

                                <span data-toggle="tooltip" title="Delete {{$a->name}}">
                                <button class="btn btn-xs btn-warning delete-user" data-id="{{$a->id}}" data-name="{{$a->name}}"><i class="fa fa-trash"></i></button>
                            </span>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No Data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>


@stop
@section('modals')
    <!-- Modal -->
    <div id="roles-manager" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <form id="froles">
                <div class="modal-body">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).on('click','.delete-user',function(e){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            swal({
                title:'Apakah anda yakin?',
                text:'User akan dihapus secara permanen.',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Ya, hapus user',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/usermanager/delete/"+id,function(){
                    swal({
                        title:'Terhapus!',
                        text:'User berhasil dihapus.',
                        type:'success',
                        timer:500,
                        showConfirmButton:false,
                    },function(){
                        location.reload();
                    });
                })

            });
        })
    </script>
@stop