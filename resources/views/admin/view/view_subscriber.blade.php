@extends('layouts.admin')

@section('meta')
<title>View Station | Metro Bangla</title>
<meta name="description" content="Workday users, view all users, add, edit, delete users">
@endsection

@section('content')

<div class="container-fluid">


    <div class="row">

        <div class="col-md-6">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;গ্রাহক বিস্তারিত</p>
                    <hr>

                    @isset($subscriberData)
                    @foreach ($subscriberData as $val)

                    <table class="table">

                        <thead class="thead-light">

                            <tr>
                                <th>ফিল্ডের নাম</th>
                                <th>ফিল্ডের ভ্যালূ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>গ্রাহকের কার্ড নং</td>
                                <td>@isset($val->client_id){{ $val->client_id }}@endisset</td>
                            </tr>

                            <tr>
                                <td>সংযোগের তারিখ</td>
                                <td>@isset($val->initialization_date){{ $val->initialization_date }}@endisset</td>
                            </tr>

                            <tr>
                                <td>ঠিকানা</td>
                                <td>@isset($val->address){{ $val->address }}@endisset</td>
                            </tr>

                            <tr>
                                <td>গ্রাহকের নাম</td>
                                <td>@isset($val->client_name){{ $val->client_name }}@endisset</td>
                            </tr>

                            <tr>
                                <td>গ্রাহকের পিতা</td>
                                <td>@isset($val->client_father){{ $val->client_father }}@endisset</td>
                            </tr>

                            <tr>
                                <td>মোবাইল নং</td>
                                <td> <a type="button" href="tel:@isset($val->mobile_no){{ $val->mobile_no }}@endisset">@isset($val->mobile_no){{ $val->mobile_no }}@endisset <i class="icon call"></i></a></td>
                            </tr>

                            <tr>
                                <td>বিলের পরিমান</td>
                                <td>@isset($val->bill_amount){{ $val->bill_amount }}@endisset টাকা</td>
                            </tr>

                            <tr>
                                <td>জামানত</td>
                                <td> @isset($val->locked_fund){{ $val->locked_fund }}@endisset টাকা</td>
                            </tr>

                            <tr>
                                <td>কানেকশন স্ট্যাটাস</td>
                                <td>@isset($val->connection_status)

                                    @if($val->connection_status==1)
                                    সংযোগ চালু আছে
                                    @else
                                    সংযোগ বন্ধ আছে
                                    @endif
                                    @endisset</td>
                            </tr>

                            <tr>
                                <td>গুরুত্বপুর্ন বার্তা</td>
                                <td>@isset($val->connection_status)

                                    @if($val->connection_status==0)
                                    এই গ্রাহকের কানেকশন কাট করা হয়েছে। পুনরায় ইনার বিল তৈরি করতে নতুন ভাবে গ্রাহক যুক্ত করুন।
                                    @endif
                                    @endisset</td>
                            </tr>

                        </tbody>

                    </table>

                    @endforeach
                    @endisset


                </div>

            </div>
        </div>

        <div class="col-md-6">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;বিলিং খাতা


                    @if($connection_status==1 && $due_bill >=3 )
                        
                        <button onclick="location.href='/admin/subscriber/cut_lock_fund/@isset($val->client_id){{ $val->client_id }}@endisset'" class="btn btn-primary float-right"><i class="dollar sign icon"></i>বাকী জামানত থেকে কাটুন</button>
                        <button onclick="location.href='/admin/subscriber/billing/{{ $id }}'"  class="btn btn-primary float-right"><i class="eye icon"></i>গ্রাহকের সম্পুর্ন বিল দেখুন </button>    
                    </p>

                    @else
                    
                        <button  class="btn btn-primary float-right" disabled><i class="dollar sign icon"></i>বাকী জামানত থেকে কাটুন</button>
                        <button onclick="location.href='/admin/subscriber/billing/{{ $id }}'"  class="btn btn-primary float-right"><i class="eye icon"></i>গ্রাহকের সম্পুর্ন বিল দেখুন </button>
                        </p>
                    
                    @endif
                    
                    <hr>

                
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <td class="table-primary">বিল বাকী আছে : {{ $total_bill }}</td>
                        </tr>
                    </table>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>


                                <th>{{ __("বিল মাস") }}</th>
                                <th>{{ __("বিল বছর") }}</th>
                                <th>{{ __("বিলের পরিমান")}}</th>
                                <th>{{ __("বিলিং স্ট্যাটাস")}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($billingData)
                            @foreach ($billingData as $val)
                            <tr>

                                @if($val->bill_month=="1")
                                <td>জানুয়ারী</td>
                                @elseif($val->bill_month=="2")
                                <td>ফেব্রুয়ারী</td>
                                @elseif($val->bill_month=="3")
                                <td>মার্চ</td>
                                @elseif($val->bill_month=="4")
                                <td>এপ্রিল</td>
                                @elseif($val->bill_month=="5")
                                <td>মে</td>
                                @elseif($val->bill_month=="6")
                                <td>জুন</td>
                                @elseif($val->bill_month=="7")
                                <td>জুলায়</td>
                                @elseif($val->bill_month=="8")
                                <td>আগষ্ট</td>
                                @elseif($val->bill_month=="9")
                                <td>সেপ্টেম্বর</td>
                                @elseif($val->bill_month=="10")
                                <td>অক্টোবর</td>
                                @elseif($val->bill_month=="11")
                                <td>নভেমম্বর</td>
                                @elseif($val->bill_month=="12")
                                <td>ডিসেম্বর</td>
                                @endif

                                <td>{{ $val->bill_year }}</td>
                                <td>{{ $val->bill_amount }}</td>

                                @if($val->billing_status=="1")
                                <td class="text-primary">পরিশোধিত</td>
                                @elseif($val->billing_status=="0")
                                <td class="text-danger">বাকী </td>
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