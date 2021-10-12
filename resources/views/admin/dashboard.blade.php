@extends('layouts.admin')

@section('meta')
<title>Dashboard | Metro Bangla Rail</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="container-fluid">

        <div class="row">

                <div class="col-md-6">

                        <!-- Card user Count Data -->

                        <div class="box box-success">

                                <div class="box-content">

                                        <p class="lead">&nbsp;&nbsp;গ্রাহক সংখ্যা</p>
                                        <hr>

                                        <table width="100%" class="table table-bordered" id="dataTables-example" data-order='[[ 0, "asc" ]]'>

                                                <thead class="thead-light">
                                                        <tr>
                                                                <th>{{ __("নাম") }}</th>
                                                                <th>{{ __("সংখ্যা") }}</th>
                                                        </tr>
                                                </thead>

                                                <tbody>
                                                        <tr>
                                                                <td>মোট</td>
                                                                <td>{{$subTotal}} টি</td>
                                                        </tr>
                                                        <tr>
                                                                <td>এইবছর</td>
                                                                <td>{{$subYear}} টি</td>
                                                        </tr>
                                                        <tr>
                                                                <td>এই মাসে</td>
                                                                <td>{{$subMonth}} টি</td>
                                                        </tr>
                                                        <tr>
                                                                <td>নতুন কানেকশন</td>
                                                                <td>{{$subToday}} টি</td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>

                <div class="col-md-6">

                        <!-- Card user Count Data -->

                        <div class="box box-success">

                                <div class="box-content">

                                        <p class="lead">&nbsp;&nbsp;বিলের পরিমান</p>
                                        <hr>

                                        <table width="100%" class="table table-bordered" id="dataTables-example" data-order='[[ 0, "asc" ]]'>

                                                <thead class="thead-light">
                                                        <tr>
                                                                <th>{{ __("নাম") }}</th>
                                                                <th>{{ __("পরিমান") }}</th>

                                                        </tr>
                                                </thead>

                                                <tbody>

                                                        <tr>
                                                                <td>মোট বিল</td>
                                                                <td>{{$total_bill}} টাকা</td>
                                                        </tr>

                                                        <tr>
                                                                <td>চলতি মাসে মোট বিল</td>
                                                                <td>{{$total_this_month}} টাকা</td>
                                                        </tr>
                                                        <tr>
                                                                <td>চলতি মাসে জমা বিল</td>
                                                                <td>{{$paid_this_month}} টাকা</td>
                                                        </tr>

                                                        <tr>
                                                                <td>চলতি মাসে বাকী বিল</td>
                                                                <td>{{$due_this_month}} টাকা</td>
                                                        </tr>


                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>


</div>

@endsection