@extends('layout.mtp.master')
@section('ptitle','Clients requests')
@section('content')
    <div class="col-md-12 col-sm-12" id="services">
        <h3><a href="{{ url('clientrequests/pending') }}" style="color: #000000">Open pending Services</a></h3>
        <h3><a href="{{ url('clientrequests/processing') }}" style="color: #000000">Open processing Services</a></h3>
        <h3><a href="{{ url('clientrequests/completed') }}" style="color: #000000">Open completed Services</a></h3>
    </div>
@endsection
