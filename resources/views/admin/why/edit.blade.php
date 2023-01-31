@extends('admin.layout.master')
@section('title', 'Edit Why Choose')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit Why Choose</h4>
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
                    <form action="{{route('update_why',$why->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Name Why Choose</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$why->name}}">
                            </div>
                            <div class="col">
                                <label>Note Why Choose</label>
                                <input type="text" name="disc" class="form-control @error('disc') is-invalid @enderror"
                                       value="{{$why->disc}}">
                            </div>
                        </div>
                        <br>
                            <img src="{{asset('upload/why/' . $why->image )}}" width="50" height="50" class="rounded-circle" alt="...">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="file"  accept="image/*" name="image">
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
