@extends('admin.layout.master')
@section('title', 'Edit Review')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit Review</h4>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update_review',$review->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Name Review</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$review->name}}">
                            </div>
                            <div class="col">
                                <label>Link Review</label>
                                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                       value="{{$review->link}}">
                            </div>
                        </div>
                        <br>
                            <img src="{{asset('upload/review/' . $review->image )}}" width="50" height="50" class="rounded-circle" alt="...">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="file" accept="image/*" name="image">
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
