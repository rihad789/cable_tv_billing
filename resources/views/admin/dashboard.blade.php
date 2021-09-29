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
                                                                <td>100 টি</td>

                                                        </tr>
                                                        <tr>
                                                                <td>এইবছর</td>
                                                                <td>53 টি</td>

                                                        </tr>
                                                        <tr>
                                                                <td>এই মাসে</td>
                                                                <td>07 টি</td>

                                                        </tr>
                                                        <tr>
                                                                <td>নতুন কানেকশন</td>
                                                                <td>03 টি</td>

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

                                <p class="lead">&nbsp;&nbsp;কোম্পানির খাতা</p>
<hr>

                                        <table width="100%" class="table table-bordered" id="dataTables-example" data-order='[[ 0, "asc" ]]'>

                                                <thead class="thead-light">
                                                        <tr>

                                                                <th>{{ __("নাম") }}</th>
                                                                <th>{{ __("টাকার পরিমান") }}</th>

                                                        </tr>
                                                </thead>

                                                <tbody>

                                                        <tr>

                                                                <td>জমা</td>
                                                                <td>১৫২০ টাকা</td>

                                                        </tr>

                                                        <tr>
                                                                <td>খরচ</td>
                                                                <td>১৬০ টাকা</td>

                                                        </tr>

                                                        <tr>

                                                                <td>ঘাটতি</td>
                                                                <td>১৪০০ টাকা</td>

                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>

        <div class="row">

                <div class="col-md-6">

                        <!-- Card user Count Data -->
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

                                                                <td>মোট</td>
                                                                <td>১০০০ টাকা</td>

                                                        </tr>
                                                        <tr>
                                                                <td>এই মাসে বাকী</td>
                                                                <td>53 টাকা</td>

                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>


        </div>
</div>

@endsection