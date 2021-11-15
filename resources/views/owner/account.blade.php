@extends('layouts.owner')

@section('meta')

<title>Account Diary | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Settle Account</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

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

                        <div class="row g-3">
                            <h6 class="mb-0">Settle Account</h6>
                            <hr>
                        </div>

                        <div class="row g-3">

                        
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __("Sallery Amount")}}</th>
                                        <th>{{ __("Locked Fund")}}</th>
                                        <th>{{ __("Bill Collection") }}</th>
                                        <th>{{ __("Cost in Service") }}</th>
                                        <th>{{__("Payable Balance")}}

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
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



                        </div>

                        <form id="add_subscriber_form" action="{{ url('owner/account_diary/settle_account') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                            @csrf

                            <input type="text" name="sallery_paid" class="form-control" id="sallery_paid" value="{{ $sallery_paid}}" hidden>
                            <input type="text" name="locked_fund" class="form-control" id="locked_fund" value="{{ $locked_fund}}" hidden>
                            <input type="text" name="bill_paid" class="form-control" id="bill_paid" value="{{ $bill_paid}}" hidden>
                            <input type="text" name="grand_total" class="form-control" id="grand_total" value="{{ $grand_total}}" hidden>
                            <input type="text" name="payable_balance" class="form-control" id="payable_balance" value="{{ $payable_balance}}" hidden>


                            @if($sallery_status == $totalEmployee)

                            <div class="row g-3">
                                <hr>
                                <button class="btn btn-primary" onclick="return confirm('You are about to pay {{ $payable_balance}} Taka to the owner.Do you want to settle accounts?')" type="submit" name="submit"><i class="ui handshake icon"></i> {{ __("Settle Payments") }}</button>
                            </div>
                            @else

                            <div class="row g-3">
                                <hr>
                                <a onclick="window.alert('Sorry! Please pay employee sallery first.')" class="btn btn-danger"><i class="ui handshake icon"></i> {{ __("Settle Payments") }}</a>
                            </div>

                            @endif

                        </form>


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

                        </div>


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

