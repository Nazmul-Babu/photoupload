@extends('layouts.userLayout')
@section('slider')
<x-slider title="upload your image"></x-slider>
@endsection
@section('header')
@include('partials.header')
@endsection
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($product as $products )

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset('images/'.$products->product_name)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $products->name}}</h5>
                            <!-- Product price-->
                          {{ $products->details}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        @if ($products->status == 'approved')
                        <div class="text-center"><a onclick="return confirm('are you sure')" class="btn btn-outline-dark mt-auto  {{ $products->status !='approved' ? 'disabled' :' '}}"  href="{{ route('sellimage',$products->id)}}">{{ strtoupper($products->status=='approved'?'Request for sale':$products->status)}}</a></div>

                        @else
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto  {{ $products->status !='approved' ? 'disabled' :' '}}" href="#">{{ strtoupper($products->status=='approved'?'Request for sale':$products->status)}}</a></div>

                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    {{ $product->links()}}

    </div>

</section>

@endsection
@section('footer')
@include('partials.footer')
@endsection
