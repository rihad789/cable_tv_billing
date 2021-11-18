@extends('layouts.manager')

@section('meta')

<title>Bill Collection | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
        <div class="card-header py-3">
                <h6 class="mb-0">Bill Collection</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="col-12 col-lg-12 d-flex">
                                <div class="card border shadow-none w-100">
                                        <div class="card-body">

                                                <div class="row g-3">

                                                        <div class="col-md-6">
                                                                <!-- Card user Count Data -->
                                                                <table width="100%" class="table table-striped table-bordered" data-order='[[ 0, "asc" ]]'>
                                                                        <thead class="thead-light">
                                                                                <tr>
                                                                                        <th>{{ __("Bill Total") }}</th>
                                                                                        <th>{{ __("Bill Paid ") }}</th>
                                                                                        <th>{{ __("Bill Due") }}</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>{{ $total_bill }} Taka </td>
                                                                                        <td>{{ $paid_bills }} Taka</td>
                                                                                        <td>{{ $due_bill }} Taka</td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                        </div>

                                                        <div class="col-md-6">
                                                                <!-- Card user Count Data -->

                                                                <div class="table-responsive">

                                                                        <table width="100%" class="table table-striped table-bordered" data-order='[[ 0, "asc" ]]'>
                                                                                <thead class="thead-light">
                                                                                        <tr>
                                                                                                <th>{{ __("This Month Total") }}</th>
                                                                                                <th>{{ __("This Month Due") }}</th>
                                                                                                <th>{{ __("Todays Collection") }}</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <tr>
                                                                                                <td> {{ $total_this_month }} Taka </td>
                                                                                                <td>{{ $due_this_month }} Taka</td>
                                                                                                <td>{{ $paid_today }} Taka</td>
                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="row g-3">
                                                        <div class="col-12 col-lg-12 d-flex">
                                                                <div class="card border shadow-none w-100">
                                                                        <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                                                                                <thead class="table-light">
                                                                                                        <tr>
                                                                                                                <th>Serial</th>
                                                                                                                <th>Card No</th>
                                                                                                                <th>Client Name</th>
                                                                                                                <th>Bill Month</th>
                                                                                                                <th>Bill Year</th>
                                                                                                                <th>Bill Amount</th>
                                                                                                                <th>Collected By</th>

                                                                                                        </tr>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                        @php($serial=1)
                                                                                                        @isset($billingData)
                                                                                                        @foreach ($billingData as $val)
                                                                                                        <tr>
                                                                                                                <td>{{ $serial++}}</td>
                                                                                                                <td>{{ $val->client_id}}</td>
                                                                                                                <td>{{ $val->client_name}}</td>
                                                                                                                @if($val->bill_month=="1")
                                                                                                                <td>January</td>
                                                                                                                @elseif($val->bill_month=="2")
                                                                                                                <td>February</td>
                                                                                                                @elseif($val->bill_month=="3")
                                                                                                                <td>March</td>
                                                                                                                @elseif($val->bill_month=="4")
                                                                                                                <td>April</td>
                                                                                                                @elseif($val->bill_month=="5")
                                                                                                                <td>May</td>
                                                                                                                @elseif($val->bill_month=="6")
                                                                                                                <td>June</td>
                                                                                                                @elseif($val->bill_month=="7")
                                                                                                                <td>July</td>
                                                                                                                @elseif($val->bill_month=="8")
                                                                                                                <td>August</td>
                                                                                                                @elseif($val->bill_month=="9")
                                                                                                                <td>September</td>
                                                                                                                @elseif($val->bill_month=="10")
                                                                                                                <td>Octobor</td>
                                                                                                                @elseif($val->bill_month=="11")
                                                                                                                <td>November</td>
                                                                                                                @elseif($val->bill_month=="12")
                                                                                                                <td>December</td>
                                                                                                                @endif

                                                                                                                <td>{{ $val->bill_year }}</td>
                                                                                                                <td>{{ $val->bill_amount }}</td>
                                                                                                                <td>{{ $val->collected_by}}</td>

                                                                                                        </tr>
                                                                                                        @endforeach
                                                                                                        @endisset
                                                                                                </tbody>
                                                                                        </table>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <!--end row-->
        </div>
</div>

<!--fiuhfoiafj -->



<!--fgijafaf-->

@endsection
