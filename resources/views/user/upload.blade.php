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
        <div class="col-8 offset-2">
    @include('errors')
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

    <form action="{{ route('upload')}}" method="POST" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="name" class="form-control" placeholder="name"><br>
        <input type="text" name="details" class="form-control" placeholder="details"><br>
        <input type="file" name="product_name" class="form-control"><br>
        <input type="submit" name="submit" class="form-control btn btn-success"><br>
      </form>
    </div>
</div>
  </div>
@endsection
@section('footer')
@include('partials.footer')
@endsection
