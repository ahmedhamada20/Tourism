@extends('admin.layout.master')
@section('title', 'Show package')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Show package</h4>
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
                    <h4 class="mt-0 header-title">Show package :: {{$data->name}}</h4>

                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                <span class="d-none d-md-block">details package</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                <span class="d-none d-md-block">Photos</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <label>Name package AR</label>
                                    <input type="text" readonly value="{{$data->getTranslation('name','ar')}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>Name package En</label>
                                    <input type="text" readonly value="{{$data->getTranslation('name','en')}}" class="form-control">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>rate</label>
                                    <input type="number" name="rate" readonly value="{{$data->rate}}" class="form-control">
                                </div>
                            </div>

{{--                            <br>--}}
{{--                            <div class="row">--}}

{{--                                <div class="col">--}}
{{--                                    <label>Price</label>--}}
{{--                                    <input type="number" name="price" value="{{$data->price}}" class="form-control @error('price') is-invalid @enderror">--}}
{{--                                </div>--}}

{{--                                <div class="col">--}}
{{--                                    <label>before Price</label>--}}
{{--                                    <input type="number" name="before_price" value="{{$data->before_price}}" class="form-control @error('price') is-invalid @enderror">--}}
{{--                                </div>--}}

{{--                                <div class="col">--}}
{{--                                    <label>dates</label>--}}
{{--                                    <select class="js-example-basic-multiple form-control" name="dates_id[]" multiple="multiple">--}}
{{--                                        @foreach($dates as  $date)--}}
{{--                                            <option value="{{$date->id}}" @foreach($data->dates as $row) {{$row->id == $date->id ? 'selected' : ''}} @endforeach>{{$date->dates .' -- '. $date->times}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <br>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <label>trips</label>--}}
{{--                                    <select class="js-example-basic-multiple form-control" name="trips_id[]" multiple="multiple">--}}
{{--                                        @foreach($trips as  $trip)--}}
{{--                                            <option value="{{$trip->id}}" @foreach($data->trips as $row) {{$row->id == $trip->id ? 'selected' : ''}} @endforeach>{{$trip->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}


{{--                                <div class="col">--}}
{{--                                    <label>transfers</label>--}}
{{--                                    <select class="js-example-basic-multiple form-control" name="transfers_id[]" multiple="multiple">--}}
{{--                                        @foreach($transfers as  $transfer)--}}
{{--                                            <option value="{{$transfer->id}}"  @foreach($data->transfers as $row) {{$row->id == $transfer->id ? 'selected' : ''}} @endforeach>{{$transfer->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="col">--}}
{{--                                    <label>Extra</label>--}}
{{--                                    <select class="js-example-basic-multiple form-control" name="extras_id[]" multiple="multiple">--}}
{{--                                        @foreach($extras as  $extra)--}}
{{--                                            <option value="{{$extra->id}}"  @foreach($data->extras as $row) {{$row->id == $extra->id ? 'selected' : ''}} @endforeach>{{$extra->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <br>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <label>Notes Destination AR</label>--}}
{{--                                    <textarea class="form-control" rows="5" name="notes">--}}
{{--                                    {{$data->getTranslation('notes','ar')}}--}}
{{--                                </textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <br>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <label>Notes Destination EN</label>--}}
{{--                                    <textarea class="form-control" rows="5" name="notes_en">--}}
{{--                                      {{$data->getTranslation('notes','en')}}--}}
{{--                                </textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        </div>
                        <div class="tab-pane p-3" id="profile-1" role="tabpanel">

                            <form action="{{route('package.store')}}"  method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="page_id" value="3">
                                <input type="hidden" name="id_photos" value="{{$data->id}}">


                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" accept="image/*" name="FilenameMany[]" multiple required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Upload Photos</button>
                                    </div>
                                </div>

                            </form>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(getphotosPackage($data->id) as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="{{asset('admin/pictures/package/' . $data->id . '/' . $row->Filename)}}"
                                               target="_blank"> <img
                                                    src="{{asset('admin/pictures/package/' . $data->id . '/' . $row->Filename)}}"
                                                    width="50" height="50" alt=""></a></td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                        </td>


                                        {{--DELETED Photo--}}
                                        <div class="modal fade" id="deleted{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deleted photo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('package.destroy','test')}}" method="post" enctype="multipart/form-data">
                                                            @method('DELETE')
                                                            @csrf

                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                            <input type="hidden" name="id_photos" value="{{$row->id}}">
                                                            <input type="hidden" name="page_id" value="3">
                                                            <input type="hidden" name="oldfile" value="{{$row->Filename ?? ''}}">


                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="text-danger"> Are Sure Of The Deleting Process Destination ?? </label>
                                                                    <input type="text" name="name" class="form-control" value="{{$row->Filename}}" readonly>
                                                                </div>
                                                            </div>

                                                            <br>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                    <!-- Modal -->
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
