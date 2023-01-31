@extends('admin.layout.master')
@section('title', 'User')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">User</h4>
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
            <a href="{{route('create_user.create')}}" class="btn btn-success">Add new user</a>
            </div>
            <br>
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>

                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#edit{{$row->id}}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>

                                    @include('admin.user.edit')
                                    @include('admin.user.deleted')


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
