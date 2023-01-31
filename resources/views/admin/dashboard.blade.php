@extends('admin.layout.master')
@section('title', 'Dashboard')
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

            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">Orders confirmed</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Order::where('status','confirmed')->count()}}</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">Orders pending</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Order::where('status','pending')->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-pink mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">Orders canceled</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Order::where('status','canceled')->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">destenation</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Destenation::count()}}</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">currencies</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Currencies::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-pink mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">extra</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Extra::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">dates</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Dates::count()}}</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">currencies</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Currencies::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-pink mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">trips</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Trips::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">transfer</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Transfer::count()}}</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">currencies</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Currencies::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-pink mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">package</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\Package::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-xl-6 col-md-6">
                    <div class="card bg-info mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">admin</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\User::where('type','admin')->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-pink mini-stat text-white">
                        <div class="p-3 mini-stat-desc">
                            <div class="clearfix">
                                <h6 class="text-uppercase mt-0 float-left text-white-50">customer</h6>
                                <h4 class="mb-3 mt-0 float-right">{{App\Models\User::where('type','customer')->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

{{--            <div class="row">--}}
{{--                <div class="col-xl-9">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="mt-0 header-title">Sales Report</h4>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <div id="morris-line-example" class="morris-chart" style="height: 300px"></div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div>--}}
{{--                                        <h5 class="font-14 mb-5">Yearly Sales Report</h5>--}}

{{--                                        <div>--}}
{{--                                            <h5 class="mb-3">2018 : $19523</h5>--}}
{{--                                            <p class="text-muted mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis atque quos dolores et</p>--}}
{{--                                            <a href="#" class="btn btn-primary btn-sm">Read more <i class="mdi mdi-chevron-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="mt-0 header-title">Sales Analytics</h4>--}}
{{--                            <div id="morris-donut-example" class="morris-chart" style="height: 300px"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end row -->--}}

{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="mt-0 header-title mb-4">Latest Trasaction</h4>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-hover">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">ID No.</th>--}}
{{--                                        <th scope="col">Name</th>--}}
{{--                                        <th scope="col">Date</th>--}}
{{--                                        <th scope="col">Price</th>--}}
{{--                                        <th scope="col">Quantity</th>--}}
{{--                                        <th scope="col">Status</th>--}}
{{--                                        <th scope="col">Amount</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">#14567</th>--}}
{{--                                        <td>Michael Mitchell</td>--}}
{{--                                        <td>14 Jan</td>--}}
{{--                                        <td>$74</td>--}}
{{--                                        <td>2</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress" style="height: 5px;">--}}
{{--                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>$148</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">#14568</th>--}}
{{--                                        <td>Dennis Cervantes</td>--}}
{{--                                        <td>15 Jan</td>--}}
{{--                                        <td>$72</td>--}}
{{--                                        <td>2</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress" style="height: 5px;">--}}
{{--                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>$144</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">#14569</th>--}}
{{--                                        <td>Bernard Moats</td>--}}
{{--                                        <td>16 Jan</td>--}}
{{--                                        <td>$86</td>--}}
{{--                                        <td>1</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress" style="height: 5px;">--}}
{{--                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>$86</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">#14570</th>--}}
{{--                                        <td>Patrick Esquivel</td>--}}
{{--                                        <td>17 Jan</td>--}}
{{--                                        <td>$59</td>--}}
{{--                                        <td>2</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress" style="height: 5px;">--}}
{{--                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>$118</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">#14571</th>--}}
{{--                                        <td>Michael Barger</td>--}}
{{--                                        <td>18 Jan</td>--}}
{{--                                        <td>$62</td>--}}
{{--                                        <td>2</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="progress" style="height: 5px;">--}}
{{--                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>$124</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- end row -->
@endsection
@section('js')
@endsection
