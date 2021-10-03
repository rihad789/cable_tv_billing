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
                                <td>@isset($val->address){{ $val->address }}@endisset , @isset($val->vicinity_name){{ $val->vicinity_name }}@endisset , @isset($val->area_name){{ $val->area_name }}@endisset</td>
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

                        </tbody>

                    </table>

                    <form id="add_subscriber_form" action="{{ url('admin/subscriber/store') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                        @csrf

                        <div class="field">
                            <input id="id" class="block mt-1 w-full" type="text" value="@isset($val->id){{ $val->id }}@endisset" name="id" class="readonly" hidden />
                        </div>

                        <div class="two fields">

                            <div class="field">
                                <label>বিলের পরিমান</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="bill_amount" class="form-control" id="bill_amount" value="@isset($val->bill_amount){{ $val->bill_amount }}@endisset">
                            </div>

                            <div class="field">
                                <label>জামানত</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="locked_fund" class="form-control" id="locked_fund" value="@isset($val->locked_fund){{ $val->locked_fund }}@endisset">
                            </div>

                            <div class="field">
                                <label>কানেকশন স্ট্যাটাস</label>
                                <select id="connection_status" class="ui dropdown uppercase" name="connection_status">

                                    @isset($val->connection_status)

                                    @if($val->connection_status==1)
                                    <option selected value="1">সংযোগ চালু আছে</option>
                                    <option value="0">সংযোগ বন্ধ করুন</option>
                                    @else
                                    <option value="1">সংযোগ চালু আছে</option>
                                    <option selected value="0">সংযোগ বন্ধ আছে</option>
                                    @endif

                                    @endisset

                                </select>
                            </div>

                        </div>

                        @endforeach
                        @endisset

                </div>

                <div class="box-footer">

                    <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                    <button onclick="location.href='/'" class="btn btn-primary"><i class="dollar sign icon"></i>বাকী জামানত থেকে কাটুন</button>
                    <a href="{{ url('admin/stations') }}" class="ui black grey small button"><i class="ui times icon"></i> {{ __("Cancel") }}</a>

                </div>

                </form>

            </div>
        </div>

        <div class="col-md-6">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;বিলিং খাতা</p>
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