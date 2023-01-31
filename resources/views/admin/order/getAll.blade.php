@extends('admin.layout.master')
@section('title')
    Order
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> Order </h4>
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
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>status</th>
                            <th>trip </th>
                            <th> package </th>
                            <th>transfer</th>
{{--                            <th>adult price</th>--}}
{{--                            <th>child price</th>--}}
{{--                            <th>adult number</th>--}}
{{--                            <th>child number</th>--}}
                            <th>nationalty</th>
                            <th>total</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->trip->name ?? ''}}</td>
                                <td>{{$row->package->name ?? ''}}</td>
                                <td>{{$row->transfer->name ?? ''}}</td>
{{--                                <td>{{$row->adult_price ?? ''}}</td>--}}
{{--                                <td>{{$row->child_price ?? ''}}</td>--}}
{{--                                <td>{{$row->adult_number ?? ''}}</td>--}}
{{--                                <td>{{$row->child_number ?? ''}}</td>--}}
                                <td>{{$row->nationalty ?? ''}}</td>
                                <td>{{$row->total ?? ''}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                                @include('admin.order.change_status')
                                @include('admin.order.deleted')
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
