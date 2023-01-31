@extends('admin.layout.master')
@section('title', 'All package')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">All package</h4>
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

                    <a href="{{route('package.create')}}" class="btn btn-success btn-sm">Add new package</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>extras</th>
                            <th>dates</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->price}}</td>
                                <td>
                                    <ul>
                                        @foreach($row->extras as $extra)
                                            <li>  {{$extra->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <ul>
                                        @foreach($row->dates as $date)
                                            <li>  {{$date->dates  .' ' . $date->times}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>

                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                         Action
                                        </button>
                                        <div class="dropdown-menu">
                                          <a href="{{route('package.edit', encrypt($row->id))}}" class="dropdown-item"><i class="fa fa-edit text-success mr-2"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash text-danger mr-2"></i> Deleted</a>
                                          <a class="dropdown-item" href="{{route('package.show', encrypt($row->id))}}"><i class="fa fa-eye text-info mr-2"></i>Show</a>
                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#create_to{{$row->id}}"><i class="fa fa-anchor text-warning mr-2"></i> Duplicated</a>
                                          <a class="dropdown-item" href="{{route('included_pakage.show', encrypt($row->id))}}"><i class="fa fa-anchor text-primary mr-2"></i> Included</a>
                                          <a class="dropdown-item"  href="{{route('excluded_pakage.show', encrypt($row->id))}}"><i class="fa fa-anchor text-success mr-2"></i> excluded</a>
                                          <a class="dropdown-item" href="{{route('additional_pakage.show', encrypt($row->id))}}"><i class="fa fa-anchor text-info mr-2"></i> Additional Info</a>
                                          <a class="dropdown-item" href="{{route('moreDetails_pakage.show', encrypt($row->id))}}"><i class="fa fa-anchor text-Light mr-2"></i> More Details</a>
                                        </div>
                                      </div>
                                </td>
                                @include('admin.package.deleted')
                                @include('admin.package.duplication')
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
