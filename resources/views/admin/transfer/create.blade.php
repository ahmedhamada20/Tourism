@extends('admin.layout.master')
@section('title', 'Create transfer')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Create transfer</h4>
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
                    <form action="{{route('transfer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <label>Name Transfer AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       required>
                            </div>

                            <div class="col">
                                <label>Name currencies En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror" required>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label>rate</label>
                                <input type="number" name="rate" required class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Car Name</label>
                                <input type="text" name="car_name" required  class="form-control">
                            </div>


                            <div class="col">
                                <label>Car Type</label>
                                <input type="text" name="car_type" required  class="form-control">
                            </div>

                            <div class="col">
                                <label>Car model</label>
                                <input type="text" name="car_model" required  class="form-control">
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>Price EG</label>
                                <input type="number" name="price_EG" required class="form-control @error('price_EG') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EN </label>
                                <input type="number" name="price_EN" required class="form-control @error('price_EN') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EG Go</label>
                                <input type="number" name="price_EG_go" required class="form-control @error('price_EG_go') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EG Go Back</label>
                                <input type="number" name="price_EG_go_back" required class="form-control @error('price_EG_go_back') is-invalid @enderror">
                            </div>


                            <div class="col">
                                <label>Price EN Go</label>
                                <input type="number" name="price_EN_go" required class="form-control @error('price_EN_go') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price EN Back</label>
                                <input type="number" name="price_EN_back" required class="form-control @error('price_EN_back') is-invalid @enderror">
                            </div>



                        </div>

                        <br>


                        <div class="row">

                            <div class="col">
                                <label>Start Data</label>
                                <input type="date" name="start_date" required class="form-control @error('start_date') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>End date</label>
                                <input type="date" name="end_date" required class="form-control @error('end_date') is-invalid @enderror">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Route Form AR</label>
                                <input type="text" name="route_form" required
                                       class="form-control @error('route_form') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Route Form EN</label>
                                <input type="text" name="route_form_en" required
                                       class="form-control @error('route_form_en') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Route To AR</label>
                                <input type="text" name="route_to" required
                                       class="form-control @error('route_to') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Route To EN</label>
                                <input type="text" name="route_to_en" required
                                       class="form-control @error('route_to_en') is-invalid @enderror">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes Destination AR</label>
                                <textarea class="form-control" rows="5" name="notes" id="elm1"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes Destination EN</label>
                                <textarea class="form-control" rows="5" name="notes_en" id="elm1"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <input type="file" accept="image/*" name="FilenameMany[]" multiple>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Extra</label>
                                <select class="js-example-basic-multiple form-control"  name="extra_id[]" multiple="multiple">
                                    @foreach($extras as  $extra)
                                        <option value="{{$extra->id}}">{{$extra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>destenations</label>
                                <select class="form-control" name="destenation_id" required>
                                    <option value="" disabled selected>-- Choose --</option>
                                    @foreach($destenations as $destenation)
                                        <option value="{{$destenation->id}}">{{$destenation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>




                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        one way
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="0" id="flexRadioDefault2" checked>
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
