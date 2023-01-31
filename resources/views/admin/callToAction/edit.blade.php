@extends('admin.layout.master')
@section('title', 'Edit callToAction')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit callToAction :: {{$data->name}}</h4>
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
                    <form action="{{route('callToAction.update','test')}}" method="post" enctype="multipart/form-data">
                       @method('PUT')
                        @csrf


                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col">
                                <label>Name callToAction AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$data->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>Name callToAction En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror" value="{{$data->getTranslation('name','en')}}">
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label>icon</label>
                                <input type="text" name="icon" value="{{$data->icon}}" class="form-control">
                            </div>
                        </div>




                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes callToAction AR</label>
                                <textarea class="form-control" rows="5" name="notes" id="elm1">
                                    {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes callToAction EN</label>
                                <textarea class="form-control" rows="5" name="notes_en" id="elm1">
                                      {{$data->getTranslation('notes','en')}}
                                </textarea>
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
