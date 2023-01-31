@extends('front.layout.master')
@section('title')
    {{trans('app.register')}}
@endsection
@section('css')
@endsection
@section('content')
    <section class="mt-5 mb-5">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <form action="{{route('register')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label for="">{{trans('app.name')}}</label>
                                <input class="form-control" type="text" placeholder="{{trans('app.name')}}" name="name" aria-label="default input example" required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">{{trans('app.email')}}</label>
                                <input class="form-control" type="email" placeholder="{{trans('app.email')}}" name="email" aria-label="default input example" required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>{{trans('app.country')}}</label>
                                <select class="form-select" aria-label="Default select example" name="countries_id" required>
                                    <option value="" disabled selected>{{trans('app.country')}}</option>
                                    @foreach(App\Models\Countries::all() as $countrie)
                                        <option value="{{$countrie->id}}">{{$countrie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">{{trans('app.password')}}</label>
                                <input class="form-control" type="password" placeholder="{{trans('app.password')}}" name="password" aria-label="default input example" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">{{trans('app.confirmation_password')}}</label>
                                <input class="form-control" type="password" placeholder="{{trans('app.confirmation_password')}}" name="password_confirmation" aria-label="default input example" required>
                            </div>
                            <div class="col-md-12 d-grid gap-2 text-white mt-3">
                                <button type="submit" class="btn btn-warning">{{trans('app.register')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
