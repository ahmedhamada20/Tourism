@extends('admin.layout.master')
@section('title', 'All extra')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">All extra</h4>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">

                    <a href="{{route('extra.create')}}" class="btn btn-success btn-sm">Add new extra</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>icon</th>
                            <th>Price Person EG</th>
                            <th>Price Person EN</th>
                            <th>Number Group</th>
                            <th>Price Group EG</th>
                            <th>Price Group EN</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-info h5">{!!$row->icon!!}</td>
                                <td>{{$row->price_person_eg ?? 'No Data'}}</td>
                                <td>{{$row->price_person_en ?? 'No Data'}}</td>
                                <td>{{$row->number_group ?? 'No Data'}}</td>
                                <td>{{$row->price_group_eg ?? 'No Data'}}</td>
                                <td>{{$row->price_group_en ?? 'No Data'}}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                                @include('admin.extra.edit')
                                @include('admin.extra.deleted')
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
