@extends('admin.layout.master')
@section('title', 'aboutUs')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">aboutUs</h4>
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
                    <form action="{{route('aboutUs.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$data->id}}">


                        <div class="row">
                            <div class="col">
                                <label>name AR</label>
                                <input type="text" name="name" class="form-control" value="{{$data->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>name EN</label>
                                <input type="text" name="name_en" class="form-control" value="{{$data->getTranslation('name','en')}}">
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <label>notes AR</label>
{{--                                <textarea id="elm1" name="notes" rows="2" >--}}
{{--                                     {{$data->getTranslation('notes','ar')}}--}}
{{--                                </textarea>--}}
                                <textarea  class="form-control" rows="5" name="notes" id="elm1">
                                  {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>

                            <div class="col">
                                <label>notes EN</label>
                                <textarea  class="form-control" rows="5" name="notes_en" id="elm1">
                                    {{$data->getTranslation('notes','en')}}
                                </textarea>
                            </div>
                        </div>


                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 1</label>
                                <input type="text" name="icon_1" value="{{$data->icon_1}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 1 AR</label>
                                <input type="text" name="title_1" value="{{$data->getTranslation('title_1','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 1 EN</label>
                                <input type="text" name="title_1_en" value="{{$data->getTranslation('title_1','en')}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 2</label>
                                <input type="text" name="icon_2" value="{{$data->icon_2}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 2</label>
                                <input type="text" name="title_2" value="{{$data->getTranslation('title_2','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 2 EN</label>
                                <input type="text" name="title_2_en" value="{{$data->getTranslation('title_2','en')}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 3</label>
                                <input type="text" name="icon_3" value="{{$data->icon_3}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 3 AR</label>
                                <input type="text" name="title_3" value="{{$data->getTranslation('title_3','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 3 EN</label>
                                <input type="text" name="title_3_en" value="{{$data->getTranslation('title_3','en')}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 4</label>
                                <input type="text" name="icon_4" value="{{$data->icon_4}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 4 AR</label>
                                <input type="text" name="title_4" value="{{$data->getTranslation('title_4','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 4 EN</label>
                                <input type="text" name="title_4_en" value="{{$data->getTranslation('title_4','en')}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 5</label>
                                <input type="text" name="icon_5" value="{{$data->icon_5}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 5 AR</label>
                                <input type="text" name="title_5" value="{{$data->getTranslation('title_5','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 5 EN</label>
                                <input type="text" name="title_5_en" value="{{$data->getTranslation('title_5','en')}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon 6</label>
                                <input type="text" name="icon_6" value="{{$data->icon_6}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 6 AR</label>
                                <input type="text" name="title_6" value="{{$data->getTranslation('title_6','ar')}}" class="form-control">
                            </div>

                            <div class="col">
                                <label>title 6 EN</label>
                                <input type="text" name="title_6_en" value="{{$data->getTranslation('title_6','en')}}" class="form-control">
                            </div>
                        </div>

                        <hr>
                        <hr>

                        <!--<h5>Choose Us</h5>-->

                        <!--<br>-->
                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <label>name Choose Us AR</label>-->
                        <!--        <input type="text" name="name_chooseUs" class="form-control" value="{{$data->getTranslation('name_chooseUs','ar')}}">-->
                        <!--    </div>-->

                        <!--    <div class="col">-->
                        <!--        <label>name Choose Us EN</label>-->
                        <!--        <input type="text" name="name_chooseUs_en" class="form-control" value="{{$data->getTranslation('name_chooseUs','en')}}">-->
                        <!--    </div>-->

                        <!--</div>-->

                        <!--<br>-->


                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <label>notes Choose Us AR</label>-->
                        <!--        <textarea class="form-control" rows="5" name="notes_chooseUs" id="elm1">-->
                        <!--            {{$data->getTranslation('notes_chooseUs','ar')}}-->
                        <!--        </textarea>-->
                        <!--    </div>-->

                        <!--    <div class="col">-->
                        <!--        <label>notes Choose Us EN</label>-->
                        <!--        <textarea class="form-control" rows="5" name="notes_chooseUs_en" id="elm1">-->
                        <!--            {{$data->getTranslation('notes_chooseUs','en')}}-->
                        <!--        </textarea>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<br>-->

                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <label>URL</label>-->
                        <!--        <input type="text" name="video" value="{{$data->video}}" class="form-control">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<br>-->

                        <!--@if($data->photo)-->
                        <!--    <img src="{{asset('admin/pictures/aboutUs/' . $data->id .'/' .$data->photo->Filename)}}" width="50" height="50" alt="">-->
                        <!--@endif-->

                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <input type="file" name="filename" accept="image/*">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Update</button>
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
