@extends('layouts.manager')

@section('meta')
<title>Billing | Dingedah Network</title>
<meta name="description" content="Dingedah Network Billing">
@endsection

@section('content')
@include('manager.modals.edit_bill')


<div class="container-fluid" id="printableArea">

    <div class="box box-success">

        <div class="box-content">


            <div class="row">

                <div class="col-md-12">

                    <p class="lead">&nbsp;&nbsp;BILLING DIARY

                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button onclick="location.href='/manager/billing/generate'" class="ui btn btn-info mini offsettop5 float-right"><i class="dollar sign icon"></i>{{ __("Process Bill") }}</button>

                    </p>

                    <hr>

                </div>

                <hr>

            </div>


            <div class="row">

                <div class="col-md-12">

                    <form action="{{ url('manager/billing') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="two fields">

                            <div class="field">
                                <select name="billing_time" id="billing_time" class="ui search dropdown getid">
                                    <option value="">{{ __("Billing Time") }}</option>
                                    <option value='1'>Current Month</option>
                                    <option value='2'>Past Month</option>
                                    <option value='3'>All of them</option>
                                </select>
                            </div>

                            <div class="field">
                                <select name="billing_status" id="billing_status" class="ui search dropdown getid">
                                    <option value="">{{ __("Billing Status") }}</option>
                                    <option value=1>{{ __("Paid") }}</option>
                                    <option value=0>{{ __("Due ") }}</option>
                                </select>
                            </div>


                            <div class="two fields">

                                <div class="field">

                                    <button type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon filter alternate"></i> {{ __("Filter") }}</button>
                                </div>


                            </div>



                        </div>
                    </form>


                </div>


            </div>

            <div class="row">

                <div class="col-md-6">
                    <!-- Card user Count Data -->
                    <table width="100%" class="table text-center" data-order='[[ 0, "asc" ]]'>
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

                <div class="col-md-6">
                    <!-- Card user Count Data -->
                    <table width="100%" class="table text-center" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("Corrent Month Total") }}</th>
                                <th>{{ __("Corrent Month Due") }}</th>
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

                <hr>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <hr>

                </div>

            </div>


            <div class="row">

                <div class="col-md-12">

                    <!-- Card user Count Data -->

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
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

@section('scripts')


<script>
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: false,
            lengthChange: true,
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'

            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ]
        });



        $('#edit_biil_form').form({
            fields: {
                client_id: {
                    identifier: 'client_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের আইডি পছন্দ করুন ।'
                    }]
                },
                billing_status: {
                    identifier: 'billing_status',
                    rules: [{
                        type: 'empty',
                        prompt: 'বিলিং স্ট্যাটাস পরিবর্তন করুন ।'
                    }]
                }
            }
        });

    });


    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection