@extends('layouts.manager')

@section('meta')

<title>Dashboard | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
        <div class="card-header py-3">
                <h6 class="mb-0">Dashboard</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="col-12 col-lg-6 d-flex">
                                <div class="card border shadow-none w-100">
                                        <div class="card-body">
                                                <div class="row g-3">
                                                        <h6 class="mb-0">Subscriber Summery</h6>
                                                        <hr>
                                                </div>

                                                <div class="row g-3">


                                                        <div class="table-responsive">

                                                                <table class="table table-striped table-bordered" style="width:100%">

                                                                        <thead class="thead-light">
                                                                                <tr>
                                                                                        <th>Total Subs.</th>
                                                                                        <th>Conn. This Year</th>
                                                                                        <th>Conn. This Month</th>
                                                                                        <th>New Connection</th>
                                                                                </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>{{$subTotal}} টি</td>
                                                                                        <td>{{$subYear}} টি</td>
                                                                                        <td>{{$subMonth}} টি</td>
                                                                                        <td>{{$subToday}} টি</td>
                                                                                </tr>
                                                                        </tbody>

                                                                </table>
                                                        </div>

                                                </div>

                                                <div class="row g-3">
                                                        <h6 class="mb-0">Sallery Summery</h6>
                                                        <hr>
                                                </div>

                                                <div class="row g-3">

                                                        <div class="table-responsive">

                                                                <table class="table table-striped table-bordered" style="width:100%">

                                                                        <thead class="thead-light">
                                                                                <tr>
                                                                                        <th>{{ __("Total Employee") }}</th>
                                                                                        <th>{{ __("Total Sallery") }}</th>
                                                                                        <th>{{ __("Sallery Paid") }}</th>
                                                                                        <th>{{ __("Sallery Due") }}</th>
                                                                                </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                                <tr>
                                                                                        <td> {{ $totalEmployee }} Employee </td>
                                                                                        <td>{{ $totalSallery }} Taka</td>
                                                                                        <td>{{ $sallery_paid }} Taka</td>
                                                                                        <td>{{ $sallery_due }} Taka</td>
                                                                                </tr>
                                                                        </tbody>

                                                                </table>
                                                        </div>

                                                </div>
                                        </div>


                                </div>
                        </div>

                        <div class="col-12 col-lg-6 d-flex">
                                <div class="card border shadow-none w-100">
                                        <div class="card-body">

                                                <div class="row g-3">
                                                        <h6 class="mb-0">Billing Summery</h6>
                                                        <hr>
                                                </div>

                                                <div class="row g-3">


                                                        <div class="table-responsive">
                                                                <table class="table table-striped table-bordered" style="width:100%">

                                                                        <thead class="thead-light">
                                                                                <tr>
                                                                                        <th>{{ __("Bill Total") }}</th>
                                                                                        <th>{{ __("Bill Due") }}</th>
                                                                                        <th>{{ __("Bill Collected") }}</th>
                                                                                        <th>{{ __("Action") }}</th>
                                                                                </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                                <tr>
                                                                                        <td> {{ $total_bill }} Taka </td>
                                                                                        <td>{{ $bill_due }} Taka</td>
                                                                                        <td>{{ $bill_paid }} Taka</td>
                                                                                        <td> <a href="{{ url('owner/billing') }}" class="ui circular basic icon button tiny">{{ __('View BIllings') }}</a> </td>
                                                                                </tr>
                                                                        </tbody>

                                                                </table>
                                                        </div>

                                                </div>


                                                <div class="row g-3">
                                                        <h6 class="mb-0">Service Cost Summery</h6>
                                                        <hr>
                                                </div>

                                                <div class="row g-3">


                                                        <div class="table-responsive">
                                                                <table class="table table-striped table-bordered" style="width:100%">

                                                                        <thead class="thead-light">
                                                                                <tr>
                                                                                        <th>{{ __("Total Memo")}}</th>
                                                                                        <th>{{ __("Products Quantity") }}</th>
                                                                                        <th>{{ __("Grand Total") }}</th>
                                                                                        <th>{{ __("Action") }}</th>
                                                                                </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>{{ $totalMemo}}</td>
                                                                                        <td> {{ $total_products }}</td>
                                                                                        <td>{{ $grand_total }} Taka</td>
                                                                                        <td> <a href="{{ url('owner/memo') }}" class="ui circular basic icon button tiny">{{ __('View Memos') }}</a> </td>

                                                                                </tr>
                                                                        </tbody>

                                                                </table>
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