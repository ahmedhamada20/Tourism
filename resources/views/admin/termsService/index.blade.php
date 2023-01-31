@extends('admin.layout.master')
@section('title', 'termsService')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">termsService</h4>
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
                    <a href="{{route('termsService.create')}}" class="btn btn-success btn-sm">Add new termsService</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>photo</th>
                            <th>name</th>
                            <th>notes</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if($row->photo)
                                        <a href="{{ $row->image }}">
                                            <img src="{{ asset('admin/pictures/termsService/' . $row->id . '/' . $row->photo->Filename) }}" width="50" height="50" class="list-thumbnail border-0">
                                        </a>
                                    @endif
                                </td>

                                <td>{{$row->name}}</td>
                                <td>{{$row->notes ?? 'No Data'}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('termsService.edit',$row->id)}}"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                                @include('admin.termsService.deleted')
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
