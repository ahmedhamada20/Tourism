@extends('admin.layout.master')
@section('title', 'All currencies')
@section('css')
@endsection
@section('page_title')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> currencies</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">currencies</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
{{--                <div class="card-header">--}}
                    <a href="{{route('currencies.create')}}" class="btn btn-success btn-sm">Add new currencies</a>
{{--                </div>--}}
                <br>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->symbol}}</td>
                                <td>{{$row->rate}}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                                @include('admin.currencies.edit')
                                @include('admin.currencies.deleted')
                            </tr>
                            <!-- Modal -->
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('js')
@endsection
