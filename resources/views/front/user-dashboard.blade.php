@extends('front.layout.master')
@section('title')
    Dashboard
@endsection
@section('css')
@endsection
@section('content')
    <section class="container ng-scope ng-fadeInLeftShort" style="">
        <!-- uiView:  -->
        <div class="ng-fadeInLeftShort ng-scope" style="">
            <div class="container-overlap bg-blue-500 ng-scope">
                <div class="media m0 pv">
                    <div class="media-left"><a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                             alt="User" class="media-object img-circle thumb64"></a>
                    </div>
                    <div class="media-body media-middle">
                        <h4 class="media-heading text-white bold">{{Auth::user()->name}}</h4>
                        <span class="text-white">{{Auth::user()->email}}</span>
                    </div>
                </div>
            </div>
            <div class="container-fluid ng-scope">
                <div class="row">
                    <!-- Left column-->
                    <div class="col-md-7 col-lg-8">
                        <form class="card ng-pristine ng-valid">
                            <h5 class="card-heading pb0">Contact Information</h5>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <em class="ion-document-text icon-fw mr"></em>{{$order->trip->name ?? $order->transfer->name ?? $order->package->name}}
                                            </td>
                                            <td class="ng-binding">{{$order->status}}</td>
                                            <td class="ng-binding">{{$order->total}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-divider"></div>
                        </form>
                        <button class="btn btn-success btn-sm">Total Orders pending
                            :: {{getTotalOrdersPending(auth()->user()->id)}}</button>

                        <button class="btn btn-success btn-sm">Total Orders confirmed
                            :: {{getTotalOrdersConfirmed(auth()->user()->id)}}</button>

                        <button class="btn btn-success btn-sm">Total Orders
                            :: {{getTotalOrders(auth()->user()->id)}}</button>
                    </div>
                    <!-- Right column-->
                    <div class="col-md-5 col-lg-4">
                        <div class="card">
                            <h5 class="card-heading">
                                My Tours
                            </h5>
                            <div class="mda-list">

                                @foreach($orders as $order)

                                    <div class="mda-list-item"><img
                                            src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="List user"
                                            class="mda-list-item-img">


                                        <div class="mda-list-item-text mda-2-line">
                                            <h3>
                                                <a>{{$order->trip->name ?? $order->transfer->name ?? $order->package->name}}</a>
                                            </h3>
                                            <div class="text-muted text-ellipsis">{{$order->total}}</div>
                                            <div
                                                class="text-muted text-ellipsis">{{$order->created_at->diffforhumans()}}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
@endsection



