@extends('back.master')
@section('title','User | Roles')
@section('page_heading')
    <h2>Roles</h2>
@stop

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="index-2.html">Home</a>
        </li>
        <li>
            <a href="#">User manager</a>
        </li>
        <li>
            <a href="#">Roles</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add-role"><i class="fa fa-plus"></i> Tambah Role</button>

        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Display name</th>
                    <th>MenuAccess</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($roles->count() > 0)
                    @foreach($roles as $r)
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>{{$r->display_name}}</td>
                            <td>
                                @foreach($r->menu as $m)
                                    <?php $menu_list .= "<span class='label label-warning'>".$m->display_name."</span> ";?>
                                @endforeach
                                <?php
                                $menu_list = trim($menu_list,' ');
                                echo $menu_list;
                                $menu_list = '';
                                ?>
                            </td>
                            <td>
                        <span data-toggle="tooltip" title="Edit {{$r->display_name}}'s role">
                            <a href="{{route('bo.user.role.edit',['id'=>$r->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        </span>
                                <span data-toggle="tooltip" title="Delete {{$r->display_name}}">
                            <button class="btn btn-xs btn-warning delete-role" data-id="{{$r->id}}" data-name="{{$r->display_name}}"><i class="fa fa-trash"></i></button>
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
    <div id="add-role" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                {!! Form::open(['route'=>'bo.role.add']) !!}
                    <div class="modal-body clearfix">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Display</label>
                            <div class="col-sm-10">
                                {!! Form::text('display_name',null,['class'=>'form-control','required'=>'true']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Menu</label>
                            <div class="col-sm-10">
                                {!! Form::select('menus[]',$all_menus,null,['class'=>'form-control','required'=>'true','multiple'=>'true']) !!}
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).on('click','.delete-role',function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            swal({
                title:'Apakah anda yakin?',
                text:'Role akan dihapus secara permanen.',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Ya, hapus role',
                closeOnConfirm:false,
                showLoaderOnConfirm:true
            },function(){
                $.get("/backoffice/usermanager/delete_role/"+id,function(){
                    swal({
                        title:'Terhapus!',
                        text:'Role berhasil dihapus.',
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