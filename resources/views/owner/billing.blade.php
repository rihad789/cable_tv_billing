@extends('layouts.owner')

@section('meta')

<title>Billing | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Bill Process</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                    <div class="row g-3">

                    <div class="col-md-12">
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
                                <td> {{ $total_bill }} Taka </td>
                                <td>{{ $paid_this_month }} Taka</td>
                                <td>{{ $due_this_month }} Taka</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
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

                        <form class="row g-3" id="add_area_form" action="{{ url('owner/billing') }}" method="post" accept-charset="utf-8">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Billing Time</label>
                                   <select name="billing_time" id="billing_time" class="form-select">
                                    <option value="">{{ __("Billing Time") }}</option>
                                    <option value='1'>Current Month</option>
                                    <option value='2'>Past Month</option>
                                    <option value='3'>All of them</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Billing Status</label>

                                <select name="billing_status" id="billing_status" class="form-select">
                                    <option value="">{{ __("Billing Status") }}</option>
                                    <option value=1>{{ __("Paid") }}</option>
                                    <option value=0>{{ __("Due ") }}</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-flex">
                <div class="card border shadow-none w-100">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">

                                <thead class="table-light">
                                    <tr>
                                    <th>{{ __("Serial") }}</th>
                                <th>{{ __("Client Card No") }}</th>
                                <th>{{ __("Client Name") }}</th>
                                <th>{{ __("Bill Month") }}</th>
                                <th>{{ __("Bill Year") }}</th>
                                <th>{{ __("Bill Amount")}}</th>
                                <th>{{ __("Billing Status")}}</th>
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

                                @if($val->billing_status=="1")
                                <td class="text-primary">Paid</td>
                                @elseif($val->billing_status=="0")
                                <td class="text-danger">Due </td>
                                @endif

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
        <!--end row-->
    </div>
</div>

<!--fiuhfoiafj -->



<!--fgijafaf-->

@endsection

@section('scripts')

<script>
    $(document).ready(function() {


        $('#add_area_form').form({
            fields: {
                area_name: {
                    identifier: 'area_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Area name required ।'
                    }]
                }
            }
        });

        $('#add_vicinity_form').form({
            fields: {
                area_id: {
                    identifier: 'area_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please select area name ।'
                    }]
                },
                vicinity_name: {
                    identifier: 'vicinity_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Vicinity name required ।'
                    }]
                }
            }
        });

    });
</script>

@endsection