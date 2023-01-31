@extends('front.layout.master')

@section('css')
    @livewireStyles
@stop

@section('content')


    @livewire('shoping.shoping-cart', ['transfer' => $transfer])

    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-info">
                        <div >
                            {{--                                <form action="{{route('change_curacy')}}" method="post">--}}
                            {{--                                    @csrf--}}
                            {{--                                    <select class="form-control language" name="curanncy_id" style="display: inline">--}}
                            {{--                                        @foreach(App\Models\Currencies::all() as $curanncy)--}}
                            {{--                                            <option value="{{$curanncy->id}}">{{$curanncy->name}}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                    <button type="submit" class="btn btn-primary" style="display: inline;    position: absolute;margin-right: 10px;margin-top: 5px;">Change</button>--}}
                            {{--                                </form>--}}
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col">

                                    <div class="item">




                                    </div>
                                    <div class="item">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    @livewireScripts
@stop
