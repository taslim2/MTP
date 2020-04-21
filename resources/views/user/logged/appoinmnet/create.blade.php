@extends('layout.user.logged.master')
@section('content')
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name" placeholder="Full Name">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="name">Address</label>
                                <input type="text" class="form-control" id="address" value="{{ $user->address }}" name="address" placeholder="Patient address">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="date" value="" class="form-control">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Hospital</label>
                                <select class="form-control" name="hospital">
                                    @foreach($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Test</label>
                                <select class="form-control" name="tets">
                                    <option>Square</option>
                                    <option>IBN sina</option>
                                    <option>Popular</option>
                                    <option>Medical Research</option>
                                </select>
                            </div>



                            <div class="col-md-6 col-sm-6">
                                <label for="select">Cost</label><br>
                                <input type="number" class="form-control" readonly name="cost">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="telephone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="{{ $user->phone }}" name="phone" placeholder="Phone">
                                <label for="prescription">Add prescription</label>
                                <input type="file" name="prescription">
                                <button type="submit" class="form-control" id="cf-submit">Submit request</button>
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
