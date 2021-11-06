@extends('layouts.manager')

@section('meta')

<title>Account | {{ $website_name }}</title>

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
                        <button onclick="location.href='/manager/account_diary/settlements'" class="ui btn btn-info mini offsettop5 float-right">{{ __("Settlment History") }}</button>
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


                            <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>

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

                            <table width="100%" class="table" id="dataTables-example1" data-order='[[ 0, "asc" ]]'>
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
                                        <td> <a href="{{ url('manager/billing') }}" class="ui circular basic icon button tiny">{{ __('View BIllings') }}</a> </td>
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
                                        <td> <a href="{{ url('manager/memo') }}" class="ui circular basic icon button tiny">{{ __('View Memos') }}</a> </td>

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
                    <table width="100%" class="table" id="dataTables-example2" data-order='[[ 0, "asc" ]]'>

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

                    <form id="add_subscriber_form" action="{{ url('manager/account_diary/settle_account') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                        @csrf

                        <input type="text" name="sallery_paid" class="form-control" id="sallery_paid" value="{{ $sallery_paid}}" hidden>
                        <input type="text" name="locked_fund" class="form-control" id="locked_fund" value="{{ $locked_fund}}" hidden>
                        <input type="text" name="bill_paid" class="form-control" id="bill_paid" value="{{ $bill_paid}}" hidden>
                        <input type="text" name="grand_total" class="form-control" id="grand_total" value="{{ $grand_total}}" hidden>
                        <input type="text" name="payable_balance" class="form-control" id="payable_balance" value="{{ $payable_balance}}" hidden>


                        @if($sallery_status == $totalEmployee)

                        <p class="lead">
                            <button class="ui positive approve small button float-right" onclick="return confirm('You are about to pay {{ $payable_balance}} Taka to the owner.Do you want to settle accounts?')" type="submit" name="submit"><i class="ui handshake icon"></i> {{ __("Settle Payments") }}</button>
                        </p>

                        @else

                        <p class="lead">
                            <a onclick="window.alert('Sorry! Please pay employee sallery first.')" class="ui black grey small button float-right"><i class="ui handshake icon"></i> {{ __("Settle Payments") }}</a>
                        </p>
                        @endif

                    </form>

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