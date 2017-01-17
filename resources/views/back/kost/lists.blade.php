@extends('back.master')
@section('title','Kost | List')
@section('page_heading')
    <h2>Lists</h2>
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
            <a href="#">Lists</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Prices</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kosts as $k)
                        
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No Data</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop