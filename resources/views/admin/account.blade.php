@extends('layouts.admin')

@section('meta')
<title>ACCOUNT | DINGEDSH NETWORK</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')


@endsection

@section('scripts')

<div class="container-fluid" id="printableArea">

    <div class="box box-success">

        <div class="box-content">


            <div class="row">

                <div class="col-md-12">

                    <p class="lead">&nbsp;&nbsp;BILLING DIARY

                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button class="ui btn btn-primary mini offsettop5 btn-edit float-right"><i class="arrow up icon"></i>{{ __("Update Bill") }}</button>
                        <button onclick="location.href='/admin/billing/generate'" class="ui btn btn-info mini offsettop5 float-right"><i class="dollar sign icon"></i>{{ __("Process This Month Bill") }}</button>

                    </p>

                </div>

                <hr>

            </div>



            <div class="row">

                <div class="col-md-12">

                    <!-- Card user Count Data -->

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>

                            <tr>
                                <th colspan="6"></th>
                            </tr>

                            <tr class="text-center">
                                <!-- <th colspan="2" class="table-primary">Total Bill : {{ $total_bill }} Taka </th>
                                <th colspan="2" class="table-danger">Current Month Total: {{ $total_this_month }} Taka</th>
                                <th colspan="3" class="table-info">Bill Due : {{ $paid_this_month }} Taka</th> -->

                            </tr>

                            <tr>
                                <th colspan="6"></th>
                            </tr>

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


@endsection