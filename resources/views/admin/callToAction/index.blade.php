@extends('admin.layout.master')
@section('title', 'All callToAction')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">All callToAction</h4>
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

                    <a href="{{route('callToAction.create')}}" class="btn btn-success btn-sm">Add new callToAction</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{!! $row->icon!!}</td>

                                <td>
                                    <a href="{{route('callToAction.edit', encrypt($row->id))}}"
                                       class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>

                                </td>
                                @include('admin.callToAction.deleted')

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
