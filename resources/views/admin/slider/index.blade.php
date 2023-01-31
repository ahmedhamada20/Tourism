 @extends('admin.layout.master')
@section('title', 'Slider')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Dashboard</h4>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New Slide
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Slider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('store_slider')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-3">
                                            <label>Name AR</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                   required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Name EN</label>
                                            <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                                   required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>notes AR</label>
                                            <textarea class="form-control" name="notes" rows="2"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>notes EN</label>
                                            <textarea class="form-control" name="notes_en" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Photo</label>
                                            <input type="file" accept="image/*" name="image" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img  src="{{asset('upload/slider/'.$slider->image)}}" alt="" style="width: 50px; height: 50px;border-radius: 50%"></td>
                                <td>{{$slider->name}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$slider->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$slider->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('update_slider',$slider->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="col-md-12 mb-3">
                                                                <label>Name AR</label>
                                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                                       value="{{$slider->getTranslation('name','ar')}}">
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label>Name EN</label>
                                                                <input type="text" name="name_en" class="form-control @error('name') is-invalid @enderror"
                                                                       value="{{$slider->getTranslation('name','en')}}">
                                                            </div>


                                                            <div class="col-md-12 mb-3">
                                                                <label>notes AR</label>
                                                                <textarea class="form-control" name="notes" rows="2">
                                                                    {{$slider->getTranslation('notes','ar')}}
                                                                </textarea>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label>notes EN</label>
                                                                <textarea class="form-control" name="notes_en" rows="2">
                                                                     {{$slider->getTranslation('notes','en')}}
                                                                </textarea>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <label>Photo</label>
                                                                <input type="file" accept="image/*" name="image" >
                                                            </div>
                                                            <img  src="{{asset('upload/slider/'.$slider->image)}}" alt="" style="width: 100%; height: 200px;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-danger" href="{{route('delete_slider',$slider->id )}}"><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                            <!-- Modal -->
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('js')
@endsection
