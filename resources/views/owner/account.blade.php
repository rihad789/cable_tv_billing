@extends('layouts.owner')

@section('meta')
<title>Account | Dingedah Network</title>
<meta name="description" content="Dingedah Network Billing">
@endsection

@section('content')



<div class="container-fluid" id="printableArea">

    <div class="box box-success">

        <div class="box-content">


            <div class="row">

                <div class="col-md-12">

                    <p class="lead">&nbsp;&nbsp;ACCOUNT
                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button class="ui btn btn-info mini offsettop5 btn-edit float-right">{{ __("Settlment History") }}</button>
                    </p>

                    <hr>

                </div>

                <hr>

            </div>

            <!-- ffffffffffffffffffffffffff -->

            <div class="row">

                <div class="col-md-6">

                    <!-- Card user Count Data -->

                    <div class="box box-success">

                        <div class="box-content">


                            <table width="100%" class="table" data-order='[[ 0, "asc" ]]'>

                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>{{ __("Total Employee") }}</th>
                                        <th>{{ __("Total Sallery") }}</th>
                                        <th>{{ __("Sallery Paid") }}</th>
                                        <th>{{ __("Sallery Due") }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-info">Sallery Summery</td>
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

                <div class="col-md-6">

                    <!-- Card user Count Data -->

                    <div class="box box-success">

                        <div class="box-content">

                            <table width="100%" class="table" data-order='[[ 0, "asc" ]]'>
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>{{ __("Bill Total") }}</th>
                                        <th>{{ __("Bill Due") }}</th>
                                        <th>{{ __("Bill Collected") }}</th>
                                        <th>{{ __("Action") }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-info">BIlling Summery</td>
                                        <td> {{ $total_bill }} Taka </td>
                                        <td>{{ $bill_due }} Taka</td>
                                        <td>{{ $bill_paid }} Taka</td>
                                        <td> <a href="{{ url('owner/billing') }}" class="ui circular basic icon button tiny">{{ __('View BIllings') }}</a> </td>
                                    </tr>
                                </tbody>


                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>{{ __("Total Memo")}}</th>
                                        <th>{{ __("Products Quantity") }}</th>
                                        <th>{{ __("Grand Total") }}</th>
                                        <th>{{ __("Action") }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-info"> Memo Summery</td>
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

            <hr>


            <div class="row">

                <div class="col-md-12">
                    <!-- Card user Count Data -->
                    <table width="100%" class="table" data-order='[[ 0, "asc" ]]'>

                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>{{ __("Sallery Amount")}}</th>
                                <th>{{ __("Locked Fund")}}</th>
                                <th>{{ __("Total Bill Collection") }}</th>
                                <th>{{ __("Total Cost in Service") }}</th>
                                <th>{{__("Payable Balance")}}

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="text-info">Acount Summery</td>

                                @if($sallery_status == $totalEmployee)
                                <td>{{ $sallery_paid}} Taka </td>
                                @else
                                <td class="text-danger"> {{ $sallery_due }} Taka Due</td>
                                @endif
                                <td>{{ $locked_fund }} Taka</td>
                                <td> {{ $bill_paid }} Taka</td>
                                <td>{{ $grand_total }} Taka</td>
                                <td>{{ $payable_balance}} Taka</td>

                            </tr>
                        </tbody>



                    </table>
                </div>


                <hr>

            </div>

            <div class="row">

                <div class="col-md-12">
                    <hr>

                 <p class="lead">
                        <button class="ui btn btn-primary mini offsettop5 btn-edit float-right"><i class="handshake icon"></i>{{ __("Settle Payments") }}
                        </button>
                    </p>
                </div>
                <hr>

            </div>



            <!-- fhgfojaifjafaoijfaopfjaoif -->

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