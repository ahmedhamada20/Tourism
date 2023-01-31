@extends('admin.layout.master')
@section('title', 'Reviews')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Reviews</h4>
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
                    <a href="{{route('add_review')}}" class="btn btn-success btn-sm">Add new Reviews</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>photo</th>
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{ asset('upload/review/'. $review->image)}}" width="50" height="50" class="list-thumbnail border-0">
                                </td>
                                <td>{{$review->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('edit_review',$review->id)}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{route('delete_review',$review->id)}}"><i class="fa fa-trash"></i></a>
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
