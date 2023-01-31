@extends('admin.layout.master')
@section('title', 'All transfer')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">All transfer</h4>
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
                    <a href="{{route('transfer.create')}}" class="btn btn-success btn-sm">Add new transfer</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price EG</th>
                            <th>Price EN</th>
                            <th>start date</th>
                            <th>end date</th>
                            <th>route form</th>
                            <th>route To</th>
                            <th>extra</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->price_EG}}</td>
                                <td>{{$row->price_EN}}</td>
                                <td>{{$row->start_date}}</td>
                                <td>{{$row->end_date}}</td>
                                <td>{{$row->route_form}}</td>
                                <td>{{$row->route_to}}</td>
                                <td>
                                    <ul>
                                        @foreach($row->extras as $extra)
                                          <li>  {{$extra->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a href="{{route('transfer.edit', encrypt($row->id))}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                    <a href="{{route('transfer.show', encrypt($row->id))}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#create_to{{$row->id}}"><i class="fa fa-anchor"></i></button>
                                </td>
                                @include('admin.transfer.deleted')
                                @include('admin.transfer.duplication')
                            </tr>
                            <!-- Modal -->
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('js')

@endsection
