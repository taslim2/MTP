@extends('layout.user.logout.master')
@section('ptitle','About MTP')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="about-info">

            <div class="col-md-6 col-sm-6">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Available test for patients</h4>
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <table class="w3-table-all w3-hoverable">
                        <thead>
                        <tr class="w3-light-grey">
                            <th>Hospital</th>
                            <th>Test name</th>
                            <th>cost</th>
                        </tr>
                        </thead>
                        @foreach($availables as $available)

                            <tr>
                                <td>{{ $available->hospital->name }}</td>
                                <td>{{ $available->test->name }}</td>
                                <td>{{ $available->cost }}</td>
                            </tr>

                        @endforeach
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
