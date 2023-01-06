@extends('layouts.adminLayout')
@section('header')
    @include('admin.partials.header')
@endsection
@section('sidebar')
    @include('admin.partials.sidepanels')
@endsection
@section('content')
<div class="side-app">

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">buy-out</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Users</h6>
                                    <h2 class="mb-0 number-font">44,278</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="saleschart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i
                                        class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                Last week</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Profit</h6>
                                    <h2 class="mb-0 number-font">67,987</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="leadschart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-pink"><i
                                        class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                Last 6 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Expenses</h6>
                                    <h2 class="mb-0 number-font">$76,965</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="profitchart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-green"><i
                                        class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                Last 9 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Cost</h6>
                                    <h2 class="mb-0 number-font">$59,765</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="costchart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-warning"><i
                                        class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                Last year</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 END -->

   <div class="row">
    <div class="col-lg-12">
        <form action="" method="GET">
            <input type="date" name="from_date">
            <input type="date" name="to_date">
            <input type="submit" value="search">
        </form>
        <table class="table table-dark">
            <thead>
                <th>image</th>
                <th>user</th>
                <th>upload date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($product as $products)
        @include('errors')


                <tr>
                    <td><img height="100" width="100" src="{{asset('images/'.$products->product_name)}}" alt=""></td>
                    <td>{{ $products->user->name }}</td>
                    <td>{{ \carbon\carbon::create($products->created_at )->diffforHumans()}}</td>
                    <td>
                        <form class="form-group form-inline" action="{{ route('buyout')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $products->id}}" name="productid">
                            <select  class="form-select"name="option" id="">
                                <option value="buy-out">Buy-out</option>
                                <option value="not-sellable">not-sellable</option>
                            </select>
                            <input class="form-control" type="number" step="any" name="rate" placeholder="price">

                            <input class="form-control" type="submit" value="save">

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>



</div>
<!-- CONTAINER END -->
</div>





@endsection
@section('sidebar-right')
    @include('admin.partials.sidebarright')
@endsection
@section('footer')
    @include('admin.partials.footer')
@endsection
