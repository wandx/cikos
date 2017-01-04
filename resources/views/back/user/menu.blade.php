@extends('back.master')
@section('title','User | Menu')
@section('page_heading')
    <h2>User Menu</h2>
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
            <a href="#">Menu</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="col-xs-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Menu</h3>
            </div>
            <div class="panel-body" id="menu-container">
                @if($menus->count() > 0)
                    @foreach($menus as $m)
                        <div class="well text-center menu-row" data-name="{{$m->display_name}}" data-id="{{$m->id}}" style="cursor:pointer;"><i class="{{$m->icon}}"></i> {{$m->display_name}}</div>
                    @endforeach
                @else
                    <div class="well text-center">NoData</div>
                @endif
                <button data-toggle="modal" data-target="#mymodal" data-job="menu" class="btn btn-primary btn-block" id="addmenu"><i class="fa fa-plus"></i> Add Menu</button>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Sub Menu</h3>
            </div>
            <div class="panel-body" id="sub-menu-container">

            </div>
        </div>

    </div>
    <div class="col-xs-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Sub SubMenu</h3>
            </div>
            <div class="panel-body" id="sub-sub-menu-container">

            </div>
        </div>

    </div>
@stop
@section('modals')
    <!-- Modal -->
    <div id="mymodal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                {!! Form::open(['id'=>'myform']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="">Display</label>
                            <input type="text" class="form-control" name="display_name=" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).on('click','.menu-row',function(){
            var row = $(this);
            var id = row.attr('data-id');
            var name = row.attr('data-name');

            // Rename submenu header
            $('#sub-menu-container').prev().find('.panel-title').html(name);

            // Do request
            $.get('/backoffice/usermanager/getsubmenu/'+id,function(data){
                if(data === ""){
                    $('#sub-menu-container').html('<div class="well text-center">NoData</div><button data-toggle="modal" data-target="#mymodal" data-name="'+name+'" data-menuid="'+id+'" id="addsubmenu" data-job="submenu" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Sub Menu</button>');
                }else{
                    $('#sub-menu-container').html(data+'<button data-toggle="modal" data-target="#mymodal" data-name="'+name+'" data-menuid="'+id+'" id="addsubmenu" data-job="submenu" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Sub Menu</button>');
                }

            })
        })

        // Modal
        $('#mymodal').on('show.bs.modal',function(e){
            var trig = $(e.relatedTarget);
            var modal= $(this);
            var job = trig.data('job');

            switch(job){
                case 'menu':
                    modal.find('.modal-title').html('Add Menu');
                    $('#myform').attr('action','/backoffice/usermanager/addmenu');
                    break;
                case 'submenu':
                    var menu_name = trig.data('name');
                    var menuid = trig.data('menuid');
                    modal.find('.modal-title').html('Add sub menu for '+menu_name);
                    $('#myform').attr('action','/backoffice/usermanager/addsubmenu/'+menuid);
                    break;
                default:

                    break;
            }
        })

        $(document).on('submit','#myform',function(e){
            e.preventDefault();
            $(this).submit(function(){
                return false;
            });

            $.ajax({
                url:$(this).attr('action'),
                data:new FormData(this),
                dataType:'json',
                type:'post',
                processData:false,
                contentType:false,
                success:function(resp){
                    console.log(resp);
                }
            });

        })
    </script>
@stop