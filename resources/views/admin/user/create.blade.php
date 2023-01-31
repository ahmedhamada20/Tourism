@extends('admin.layout.master')
@section('title', 'Create new User')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Create new User</h4>
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
                    <form action="{{route('create_user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <label>name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       required>
                            </div>

                            <div class="col">
                                <label>email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" required>
                            </div>

                            <div class="col">
                                <label>phone</label>
                                <input type="number" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>password</label>
                                <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>countries</label>
                                <select class="js-example-basic-multiple form-control" name="countries_id" required>
                                    <option value="" disabled selected>-- Choose --</option>
                                    @foreach(App\Models\Countries::all() as  $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
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
