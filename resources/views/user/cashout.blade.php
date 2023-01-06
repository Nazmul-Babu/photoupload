@extends('layouts.userLayout')
@section('slider')
<x-slider title="upload your image"></x-slider>
@endsection
@section('header')
@include('partials.header')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-4">
            <h1>my balance:{{ $userfinancial->balance}}</h1>
            <form action="{{ route('cashout')}}" method="POST">
                {{ csrf_field() }}
                <input type="submit" value="cashout" name="cashout"{{ $userfinancial->balance <= 10 ? 'disabled' :'' }}>
            </form>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <th>amount</th>
                <th>status</th>
            </thead>
            <tbody>
                @foreach ($cashout as $cashouts)

                <tr>
                    <td>{{$cashouts->amount}}</td>
                    <td>{{$cashouts->status}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer')
@include('partials.footer')
@endsection
