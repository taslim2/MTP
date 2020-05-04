@extends('layout.user.logged.master')
@section('ptitle','Make an appoinment')
@section('content')
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('images/appointment-image.jpg') }}" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="{{ url('appoinment/test/save') }}">
                    @csrf
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h4>Select Test from {{ $hospital->name }}</h4>
                        </div>


                        <div class="col-md-6 col-sm-6">
                            <label for="date">Appoinment id</label>
                            <input type="text" name="appoinment_id" value="{{ $appoinmen_id }}" class="form-control" readonly>
                            @error('appoinment_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">

                            <div class="col-md-12 col-sm-12">
                                <label for="select" class="control-label">Select Test</label>
                                <select class="form-control" name="test_id" id="test">
                                    <option value="">Select Test</option>
                                    @foreach($tests as $test)
                                        <option value="{{ $test->test_id }}">{{ $test->test->name }}  ({{ $test->cost }})/=</option>
                                    @endforeach
                                </select>
                                @error('test_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="form-control" id="cf-submit">Confirm</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-6 col-sm-6">
                        <form action="{{ url('appoinment/test/delete',$appoinmen_id) }}" method="post">
                            @csrf
                            <button type="submit" class="form-control" id="cf-submit">Cancel</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
