@extends('layouts.userLayout')
@section('slider')
<x-slider title="upload your image"></x-slider>
@endsection
@section('header')
@include('partials.header')
@endsection
@section('content')
  <div class="container" style="padding-bottom: 10px;padding-top:10px">
    <div class="row">
        <form action="{{ route('payment')}}" method="POST">
            {{ csrf_field() }}
            <input type="submit" name="submit" value="pay">
        </form>
    </div>
  </div>
@endsection
@section('footer')
@include('partials.footer')
@endsection
