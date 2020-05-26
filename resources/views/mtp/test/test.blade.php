@extends('layout.mtp.master')
@section('ptitle','Test List')
@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="about-info">

            <style type="text/css">
                a:link {
                    color: red;
                }
            </style>

            <div class="col-md-8 col-sm-6">
                <div class="footer-thumb">
                    <p><h2><a  style="color: #dd4b39" href="test/add" >Add new Test</a></h2></p> <!--target="_blank" for open in new tab-->
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Available Test List</h4>
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <table class="w3-table-all w3-hoverable">
                        <thead>
                        <tr class="w3-light-grey">
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        @foreach($tests as $test)
                        <tr>
                            <td>{{ $test->name }}</td>
                            <td>
                                <form action="{{ url('test/destroy',$test->id) }}" method="post">
                                    @csrf
                                    <button>Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('test/edit',$test->id) }}" method="post">
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


