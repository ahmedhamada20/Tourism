@extends('admin.layout.master')
@section('title', 'Edit TripsType')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit TripsType</h4>
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
                    <form action="{{route('update_TripsType',$why->id)}}" method="post" enctype="multipart/form-data">
                        @csrf



                         <div class="row">
                            <div class="col">
                                <label>Name  AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$why->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>Name  En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror"
                                       value="{{$why->getTranslation('name','en')}}">
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
