@extends('layout.mtp.master')
@section('ptitle','Pending requests')
@section('content')
    <div class="col-md-8 col-sm-8">
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
            <label style="color:#31b0d5">Test name:</label> <label style="color:#2e6da4">{{ $test }}</label>
        </div>

        <form action="{{ url('clientrequests/pending/update',$appoinment->id) }}" method="post">
            @csrf
        <div class="col-md-6 col-sm-6">
            <div class="col-md-2 col-sm-2">
                <label style="color:#31b0d5">Status:</label>
            </div>

            <div class="col-md-6 col-sm-6">
                <select name="status" id="status" class="form-control">
                    <option value="pending" selected>Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </div>



            <button class="btn btn-primary">Update status</button>
        </form>

        <br><br><br><br>


        <div class="text-center">
            <a href="{{ url('clientrequests/pending') }}"><button type="button" class="btn btn-primary" >Bcak</button></a>
        </div>
    </div>
@endsection
