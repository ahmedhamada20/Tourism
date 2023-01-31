@extends('admin.layout.master')
@section('title', 'Edit questionsAnswer')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit questionsAnswer</h4>
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
                    <form action="{{route('questionsAnswer.update','test')}}" method="post" enctype="multipart/form-data">
                      @method('PUT')
                        @csrf

                        <input type="hidden" value="{{$data->id}}" name="id">

                        <div class="row">
                            <div class="col">
                                <label>Name Questions AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$data->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>Name Questions En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror" value="{{$data->getTranslation('name','en')}}">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Answers  AR</label>
                                <textarea class="form-control" name="notes" rows="5" id="elm1">
                                    {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Answers EN</label>
                                <textarea class="form-control" name="notes_en" rows="5" id="elm1">
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
