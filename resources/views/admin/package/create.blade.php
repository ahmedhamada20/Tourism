@extends('admin.layout.master')
@section('title', 'Create package')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Create package</h4>
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
                    <form action="{{route('package.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <label>Name package AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       required>
                            </div>

                            <div class="col">
                                <label>Name package En</label>
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
                                <label>Price Adult EG</label>
                                <input type="number" name="price_adult_EG" required
                                       class="form-control @error('price_adult_EG') is-invalid @enderror">
                            </div>


                            <div class="col">
                                <label>Price Adult EN</label>
                                <input type="number" name="price_adult_EN" required
                                       class="form-control @error('price_adult_EN') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>Price Child EG</label>
                                <input type="number" name="price_child_EG" required
                                       class="form-control @error('price_child_EG') is-invalid @enderror">
                            </div>


                            <div class="col">
                                <label>Price Child EN</label>
                                <input type="number" name="price_child_EN" required
                                       class="form-control @error('price_child_EN') is-invalid @enderror">
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>Price</label>
                                <input type="number" name="price" required class="form-control @error('price') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>before Price</label>
                                <input type="number" name="before_price" required class="form-control @error('before_price') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>dates</label>
                                <select class="js-example-basic-multiple form-control" required name="dates_id[]" multiple="multiple">
                                    @foreach($dates as  $date)
                                        <option value="{{$date->id}}">{{$date->dates .' -- '. $date->times}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>trips</label>
                                <select class="js-example-basic-multiple form-control" required name="trips_id[]" multiple="multiple">
                                    @foreach($trips as  $trip)
                                        <option value="{{$trip->id}}">{{$trip->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col">
                                <label>transfers</label>
                                <select class="js-example-basic-multiple form-control" required name="transfers_id[]" multiple="multiple">
                                    @foreach($transfers as  $transfer)
                                        <option value="{{$transfer->id}}">{{$transfer->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label>Extra</label>
                                <select class="js-example-basic-multiple form-control" required name="extras_id[]" multiple="multiple">
                                    @foreach($extras as  $extra)
                                        <option value="{{$extra->id}}">{{$extra->name}}</option>
                                    @endforeach
                                </select>
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
