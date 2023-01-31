@extends('admin.layout.master')
@section('title', 'Show transfer')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Show transfer</h4>
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
                    <h4 class="mt-0 header-title">Show transfer :: {{$data->name}}</h4>

                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                <span class="d-none d-md-block">details transfer</span><span class="d-block d-md-none"><i
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
                                    <label>Name transfer AR</label>
                                    <input type="text" readonly value="{{$data->getTranslation('name','ar')}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>Name transfer En</label>
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

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>price EG</label>
                                    <input type="text" readonly value="{{$data->price_EG}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>price EN</label>
                                    <input type="text" readonly value="{{$data->price_EN}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>Start Date</label>
                                    <input type="text" readonly value="{{$data->start_date}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>End Date</label>
                                    <input type="text" readonly value="{{$data->end_date}}" class="form-control">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>Route form</label>
                                    <input type="text" readonly value="{{$data->route_form}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label>Route To</label>
                                    <input type="text" readonly value="{{$data->route_to}}" class="form-control">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>Extra</label>
                                    <select class="js-example-basic-multiple form-control"  readonly multiple>
                                        @foreach($extras as  $extra)
                                            <option value="{{$extra->id}}" @foreach($data->extras as $row){{$row->id == $extra->id ? 'selected' : ''}}@endforeach>{{$extra->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>destenations</label>
                                    <select class="form-control" name="destenation_id">
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
                                        <input class="form-check-input" type="radio" name="type" value="1" {{($data->type == 1 ? ' checked' : '') }} id="flexRadioDefault1" readonly>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            one way
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" value="0" {{($data->type == 0 ? ' checked' : '') }} id="flexRadioDefault2" readonly>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            go & Back
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane p-3" id="profile-1" role="tabpanel">

                            <form action="{{route('transfer.store')}}"  method="post" enctype="multipart/form-data">
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
                                @foreach(getphotosTransfer($data->id) as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="{{asset('admin/pictures/transfer/' . $data->id . '/' . $row->Filename)}}"
                                               target="_blank"> <img
                                                    src="{{asset('admin/pictures/transfer/' . $data->id . '/' . $row->Filename)}}"
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
                                                        <form action="{{route('transfer.destroy','test')}}" method="post" enctype="multipart/form-data">
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
