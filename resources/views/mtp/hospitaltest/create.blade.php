@extends('layout.mtp.master')
@section('ptitle','New Test add')
@section('content')
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('images/hospital.jpg') }}" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="{{ url('hospitaltest/store') }}">
                    @csrf
                    <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Add new Test</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">



                            <div class="col-md-6 col-sm-6">
                                <label for="name">Hospital</label><br>
                                <select name="hospital_id" id="name" class="form-control">
                                    <option value="">Select hospital</option>
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                                @error('hospital_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="name">Test name</label><br>
                                <select name="test_id" id="name" class="form-control">
                                    <option value="">Select test</option>
                                    @foreach($tests as $test)
                                        <option value="{{ $test->id }}">{{ $test->name }}</option>
                                    @endforeach
                                </select>
                                @error('test_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <br>
                                <label for="cost">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" placeholder="Test cost">
                                @error('cost')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="form-control" id="cf-submit" >Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
