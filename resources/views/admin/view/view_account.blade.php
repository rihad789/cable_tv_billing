@extends('layouts.admin')

@section('meta')
<title>View Station | Metro Bangla</title>
<meta name="description" content="Workday users, view all users, add, edit, delete users">
@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;কোম্পানির খাতা</p>
                    <hr>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]' >
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("সিরিয়াল") }}</th>
                                <th>{{ __("পন্যের নাম") }}</th>
                                <th>{{ __("পন্যের পরিমান") }}</th>
                                <th>{{ __("একক ইউনিট মূল্য") }}</th>
                                <th>{{ __("সর্বমোট মূল্য") }}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php($serial=1)
                            @isset($accountData)
                            @foreach ($accountData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->quantity }} টি</td>
                                <td>{{ $val->single_unit_price }} টাকা</td>
                                <td>{{ $val->total_amount }} টাকা</td>

                            </tr>
                            @endforeach
                            @endisset

                            <tr>

                            <td>  </td>
                                @isset($memoData)

                                <td>মোট পন্যের সংখ্যা</td>
                                <td> {{ $memoData }} টি</td>

                                @endisset

                                @isset($total_amount)
                                <td>সর্বমোট মূল্য</td>
                                <td> {{ $total_amount }} টাকা</td>

                                @endisset

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection