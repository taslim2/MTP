@extends('layout.user.logged.master')
@section('content')

    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('images/appointment-image.jpg') }}" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="{{ url('appoinment/store') }}">
                        @csrf
                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Make a service request</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="name">Name (* Changeable)</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name" placeholder="Full Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="name">Address (* Changeable)</label>
                                <input type="text" class="form-control" id="address" value="{{ $user->address }}" name="address" placeholder="Patient address">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="date" value="" class="form-control">
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select" class="control-label">Select Hospital</label>
                                <select class="form-control"  name="hospital_id" id="hospital_id">
                                    <option value="">Select Hospital</option>
                                    @foreach($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach

                                </select>
                                @error('hospital_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="telephone">Phone Number (* Changeable)</label>
                                <input type="tel" class="form-control" id="phone" value="{{ $user->phone }}" name="phone" placeholder="Phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="form-control" id="cf-submit">Next</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('title','Medical Test Partner')
@section('ptitle','Service request')
