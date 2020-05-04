@extends('layout.user.logged.master')
@section('ptitle','Taken service details')
@section('content')

    <div class="col-md-10 col-sm-10">
        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Patient name:</label> <label style="color:#2e6da4">{{ $appoinment->name }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Address:</label> <label style="color:#2e6da4">{{ $appoinment->address }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Hospital name:</label> <label style="color:#2e6da4">{{ $appoinment->hospital->name }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Phone:</label> <label style="color:#2e6da4">{{ $appoinment->phone }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Date:</label> <label style="color:#2e6da4">{{ $appoinment->date }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Status:</label> <label style="color:#2e6da4">{{ $appoinment->status }}</label>
        </div>

        <div class="col-md-6 col-sm-6">
            <label style="color:#31b0d5">Test name:</label> <label style="color:#2e6da4">{{ $test }}</label>
        </div>

        <br><br><br><br><br><br>
        <div class="col-md-10 col-sm-10 text-center">
            <div class="col-md-2 col-sm-8">
            @if($appoinment->status=="pending")
                <form action="{{ url('service/cancel',$appoinment->id) }}" method="post">
                    @csrf
                    <button class="btn btn-primary">Cancel request</button>
                </form>
            @endif
            </div>
            <div class="col-md-1 col-sm-1">
                <a href="{{ url('requested') }}"><button type="button" class="btn btn-primary" >Bcak</button></a>

            </div>
        </div>
    </div>
@endsection
