@extends('admin.layout.master')
@section('title', 'Create extra')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Create extra</h4>
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
                    <form action="{{route('extra.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <label>Name extra AR</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       required>
                            </div>

                            <div class="col">
                                <label>Name extra En</label>
                                <input type="text" name="name_en"
                                       class="form-control @error('name_en') is-invalid @enderror" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Price Person EG</label>
                                <input type="number" name="price_person_eg" class="form-control" required>
                            </div>

                            <div class="col">
                                <label>Price Person EN</label>
                                <input type="number" name="price_person_en" class="form-control" required>
                            </div>




                            <div class="col">
                                <label>Price Group EG</label>
                                <input type="number" name="price_group_eg" class="form-control" >
                            </div>


                            <div class="col">
                                <label>Price Group EN</label>
                                <input type="number" name="price_group_en" class="form-control" >
                            </div>


                            <div class="col">
                                <label>Number Group</label>
                                <input type="number" name="number_group" class="form-control" >
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>icon</label>
                                <input type="text" name="icon" required
                                       class="form-control @error('icon') is-invalid @enderror">
                            </div>
                        </div>


                        <br>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes  AR</label>
                                <textarea class="form-control" rows="5" name="notes" id="elm1"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes  EN</label>
                                <textarea class="form-control" rows="5" name="notes_en" id="elm1"></textarea>
                            </div>
                        </div>

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
