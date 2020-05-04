@extends('layout.mtp.master')
@section('ptitle','Hospitals Information')
@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="about-info">


            <div class="col-md-8 col-sm-6">
                <div class="footer-thumb">
                    <p><h2><a  style="color: #dd4b39" href="hospital/add" >Add new Hospital</a></h2></p> <!--target="_blank" for open in new tab-->
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Hospital List</h4>
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <table class="w3-table-all w3-hoverable">
                        <thead>
                        <tr class="w3-light-grey">
                            <th>Hosptial</th>
                            <th>Address</th>
                            <th>Phone no.</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        @foreach($hospitals as $hospital)
                        <tr>
                            <td><a  style="color: #dd4b39" href="{{ url('hospital/test',$hospital->id) }}">{{ $hospital->name }}</a></td>
                            <td>{{ $hospital->address }}</td>
                            <td>{{ $hospital->phoneno }}</td>
                            <td>
                                <form action="{{ url('hospital/destroy',$hospital->id) }}" method="post">
                                    @csrf
                                    <button>Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('hospital/edit',$hospital->id) }}" method="post">
                                    @csrf
                                    <button>Edit</button>
                                </form>
                            </td>
                        </tr>
                         @endforeach
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection


