@extends('admin.layout.master')
@section('title', 'TripsType')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">TripsType</h4>
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
                    <a href="{{route('add_TripsType')}}" class="btn btn-success btn-sm">Add new TripsType</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                           
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($TripsType as $why)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                            
                                <td>{{$why->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('edit_TripsType',$why->id)}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{route('delete_TripsType',$why->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('js')
@endsection
