@extends('layouts.manager')

@section('meta')
<title>View Station | Metro Bangla</title>
<meta name="description" content="Workday users, view all users, add, edit, delete users">
@endsection

@section('content')
@include('manager.modals.add_subscriber')

<div class="container-fluid">


    <div class="row">

        <div class="col-md-6">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;CLIENT DETAILS
                    @isset($subscriberData->connection_status) 
                                    @if($subscriberData->connection_status==1)
                                    <button class="btn btn-secondary mini offsettop5 btn-add float-right" disabled>Issue New Card </button>
                                    @else
                                    <button  class="btn btn-secondary mini offsettop5 btn-add float-right">Issue New Card </button>
                                    @endif
                                    @endisset
                    </p> 
                    <hr>

                    @isset($subscriberData)
 
                    <table class="table">

                        <thead class="thead-light">

                            <tr>
                                <th>Field Name</th>
                                <th>Field Value</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Subscriber Card NO</td> 
                                <td>@isset($subscriberData->client_id){{ $subscriberData->client_id }}@endisset</td>
                            </tr>

                            <tr>
                                <td>Initialization Date</td>
                                <td>@isset($subscriberData->initialization_date){{ $subscriberData->initialization_date }}@endisset</td>
                            </tr>

                            <tr>
                                <td>Address</td>
                                <td>@isset($subscriberData->address){{ $subscriberData->address }}@endisset</td>
                            </tr>

                            <tr>
                                <td>Subscriber Name</td>
                                <td>@isset($subscriberData->client_name){{ $subscriberData->client_name }}@endisset</td>
                            </tr>

                            <tr>
                                <td>Subscriber Fathers Name</td>
                                <td>@isset($subscriberData->client_father){{ $subscriberData->client_father }}@endisset</td>
                            </tr>

                            <tr>
                                <td>Mobile No</td>
                                <td> <a type="button" href="tel:@isset($subscriberData->mobile_no){{ $subscriberData->mobile_no }}@endisset">@isset($subscriberData->mobile_no){{ $subscriberData->mobile_no }}@endisset <i class="icon call"></i></a></td>
                            </tr>

                            <tr>
                                <td>Bill Amount</td>
                                <td>@isset($subscriberData->bill_amount){{ $subscriberData->bill_amount }}@endisset টাকা</td>
                            </tr>

                            <tr>
                                <td>Locked Fund</td>
                                <td> @isset($subscriberData->locked_fund){{ $subscriberData->locked_fund }}@endisset টাকা</td>
                            </tr>

                            <tr>
                                <td>Connection Status</td>
                                <td> 
                                    @isset($subscriberData->connection_status) 
                                    @if($subscriberData->connection_status==1)
                                    Running
                                    @else
                                    Disconnected 
                                    @endif
                                    @endisset
                                </td>

                                
                            </tr>
                            <tr>
                                <td>Important Message</td>
                                <td>
                                    @isset($subscriberData->connection_status)
                                    @if($subscriberData->connection_status==0)
                                    এই গ্রাহকের কানেকশন কাট করা হয়েছে। পুনরায় ইনার বিল তৈরি করতে নতুন ভাবে গ্রাহক যুক্ত করুন।
                                    @endif
                                    @endisset
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    @endisset


                </div>

            </div>
        </div>

        <div class="col-md-6">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;BILLING DIARY

                    @if($connection_status==1 && $due_bill >=3 )
                        
                        <button onclick="location.href='/admin/subscriber/cut_lock_fund/@isset($val->client_id){{ $val->client_id }}@endisset'" class="btn btn-danger float-right"><i class="dollar sign icon"></i>Settle Due</button>
                        <button onclick="location.href='/admin/subscriber/billing/{{ $id }}'"  class="btn btn-info float-right"><i class="eye icon"></i>Complete Bills </button>     
                    </p>

                    @else
                    
                        <button  class="btn btn-danger float-right" disabled><i class="dollar sign icon"></i>Settle Due</button>
                        <button onclick="location.href='/admin/subscriber/billing/{{ $id }}'"  class="btn btn-info float-right"><i class="eye icon"></i>Complete Bills </button>
                        </p>
                    
                    @endif
                    
                    <hr>
                
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <td class="table-primary">Bill Due : {{ $total_bill }}</td>
                        </tr>
                    </table>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("Bill Month") }}</th>
                                <th>{{ __("BIll Year") }}</th>
                                <th>{{ __("Bill Amount")}}</th>
                                <th>{{ __("Billing Status")}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($billingData)
                            @foreach ($billingData as $val)
                            <tr>

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
                                <td class="text-primary">Due</td>
                                @elseif($val->billing_status=="0")
                                <td class="text-danger">Paid </td>
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