@extends('layout.mtp.master')
@section('ptitle','MTP home page')
@section('content')
    <div class="col-md-12 col-sm-12" id="mtphome">
        <div class="col-md-4 col-sm-4">

        </div>
        <div class="col-md-8 col-sm-8">
            <h3 style="color: #4cae4c">Total service requests received:  {{ $requests }}</h3>
        </div>
        <div class="col-md-4 col-sm-4">

        </div>
        <div class="col-md-8 col-sm-8">
            <h3 style="color: #4cae4c">Total registred users :  {{ $users }}</h3>
        </div>
        <div class="col-md-4 col-sm-4">

        </div>
        <div class="col-md-8 col-sm-8">
            <h3 style="text-decoration: underline"><a style="color: #ac2925" href="{{ url('clientrequests/pending') }}">Total pending service requests :  {{ $pending }}</a></h3>
        </div>
        <div class="col-md-4 col-sm-4">

        </div>
        <div class="col-md-8 col-sm-8">
            <h3 style="text-decoration: underline"><a style="color: #ac2925" href="{{ url('clientrequests/processing') }}">Total processing service requests :  {{ $processing }}</a></h3>
        </div>
        <div class="col-md-4 col-sm-4">

        </div>
        <div class="col-md-8 col-sm-8">
            <h3 style="text-decoration: underline"><a style="color: #ac2925" href="{{ url('clientrequests/completed') }}">Total completed service requests :  {{ $completed }}</a></h3>
        </div>


    </div>
@endsection
