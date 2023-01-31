@extends('admin.layout.master')
@section('title', 'Edit transfer')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Edit transfer :: {{$data->name}}</h4>
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
                    <form action="{{route('transfer.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$data->id}}">

                        <div class="row">
                            <div class="col">
                                <label>Name Transfer AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$data->getTranslation('name','ar')}}">
                            </div>

                            <div class="col">
                                <label>Name Transfer En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror"
                                       value="{{$data->getTranslation('name','en')}}">
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label>rate</label>
                                <input type="number" name="rate" value="{{$data->rate}}" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Car Name</label>
                                <input type="text" name="car_name" value="{{$data->car_name}}"  class="form-control">
                            </div>


                            <div class="col">
                                <label>Car Type</label>
                                <input type="text" name="car_type" value="{{$data->car_type}}"  class="form-control">
                            </div>

                            <div class="col">
                                <label>Car model</label>
                                <input type="text" name="car_model" value="{{$data->car_model}}"  class="form-control">
                            </div>

                        </div>
                        <br>

                        <div class="row">

                            <div class="col">
                                <label>Price EG</label>
                                <input type="number" name="price_EG" value="{{$data->price_EG}}" class="form-control @error('price_EG') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EN </label>
                                <input type="number" name="price_EN" value="{{$data->price_EN}}" class="form-control @error('price_EN') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EG Go</label>
                                <input type="number" name="price_EG_go" value="{{$data->price_EG_go}}" class="form-control @error('price_EG_go') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EG Go && Back</label>
                                <input type="number" name="price_EG_go_back" value="{{$data->price_EG_go_back}}" class="form-control @error('price_EG_go_back') is-invalid @enderror">
                            </div>


                            <div class="col">
                                <label>Price EN Go</label>
                                <input type="number" name="price_EN_go" value="{{$data->price_EN_go}}" class="form-control @error('price_EN_go') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EN Go && Back</label>
                                <input type="number" name="price_EN_back" value="{{$data->price_EN_go_back}}" class="form-control @error('price_EN_back') is-invalid @enderror">
                            </div>



                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Start Data</label>
                                <input type="date" name="start_date" value="{{$data->start_date}}"
                                       class="form-control @error('start_date') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>End date</label>
                                <input type="date" name="end_date" value="{{$data->end_date}}"
                                       class="form-control @error('end_date') is-invalid @enderror">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Route Form Ar</label>
                                <input type="text" name="route_form" value=" {{$data->getTranslation('route_form','ar')}}" 
                                       class="form-control @error('route_form') is-invalid @enderror">
                            </div> 
                            
                            <div class="col">
                                <label>Route Form En</label>
                                <input type="text" name="route_form_en" value=" {{$data->getTranslation('route_form','en')}}" 
                                       class="form-control @error('route_form') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Route To Ar</label>
                                <input type="text" name="route_to" value="{{$data->getTranslation('route_to','ar')}}"
                                       class="form-control @error('route_to') is-invalid @enderror">
                            </div>
                            <div class="col">
                                <label>Route To En</label>
                                <input type="text" name="route_to_en" value="{{$data->getTranslation('route_to','en')}}"
                                       class="form-control @error('route_to') is-invalid @enderror">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes  AR</label>
                                <textarea class="form-control" rows="5" name="notes" id="elm1">
                                    {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes  EN</label>
                                <textarea class="form-control" rows="5" name="notes_en" id="elm1">
                                     {{$data->getTranslation('notes','en')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Extra</label>
                                <select class="js-example-basic-multiple form-control" name="extra_id[]"
                                        multiple="multiple">
                                    @foreach($extras as  $extra)
                                        <option value="{{$extra->id}}" @foreach($data->extras as $row)
                                            {{$row->id == $extra->id ? 'selected' : ''}}
                                            @endforeach>{{$extra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <br>

                        <div class="row">
                            <div class="col">
                                <label>destenations</label>
                                <select class="form-control" name="destenation_id" required>
                                    @foreach($destenations as $destenation)
                                        <option value="{{$destenation->id}}" {{$destenation->id == $data->destenation_id ? 'selected' : ''}}>{{$destenation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="1"
                                           {{($data->type == 1 ? ' checked' : '') }} id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        one way
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="0"
                                           {{($data->type == 0 ? ' checked' : '') }} id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        go & Back
                                    </label>
                                </div>
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
