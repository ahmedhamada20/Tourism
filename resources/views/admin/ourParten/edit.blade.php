@extends('admin.layout.master')
@section('title', 'Edit ourParten')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit ourParten</h4>
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
                    <form action="{{route('ourParten.update','test')}}" method="post" enctype="multipart/form-data">
                      @method('PUT')
                        @csrf

                        <input type="hidden" value="{{$data->id}}" name="id">

                        <div class="row">
                            <div class="col">
                                <label>Name ourParten </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$data->name}}">
                            </div>
                            <div class="col">
                                <label>Link ourParten </label>
                                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                       value="{{$data->link}}">
                            </div>

                        </div>



                        <br>



                        @if($data->photo)
                            <img src="{{asset('admin/pictures/ourParten/' . $data->id .'/' .$data->photo->Filename)}}" width="50" height="50" class="rounded-circle" alt="...">
                        @endif
                        <input type="hidden" name="oldfile" value="{{$data->photo->Filename ?? ''}}">

                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="file" accept="image/*" name="filename">
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
