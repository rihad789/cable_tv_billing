@extends('layouts.admin')

@section('meta')
<title>বিলিং | ডিঙ্গেদহ নেটওয়ার্ক</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')
@include('admin.modals.edit_bill')


<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">
                    <p class="lead">&nbsp;&nbsp;বিলিং খাতা
                        <button class="ui btn btn-primary mini offsettop5 btn-edit float-right"><i class="ui icon plus"></i>{{ __("বিল আপডেট করুন") }}</button>
                        <button onclick="location.href='/admin/billing/generate'" class="ui btn btn-secondary mini offsettop5 float-right">{{ __("এই মাসের বিল তৈরি করুন") }}</button>
                    </p>
                    <hr>

                    <div class="row">

                        <div class="col-md-12">

                    <form action="{{ url('admin/billing') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="two fields">
                            <div class="field">
                                <select name="billing_time" id="billing_time" class="ui search dropdown getid">
                                    <option value="">{{ __("বিলিং সময়সীমা") }}</option>
                                    <option value="1">{{ __("চলতি মাস") }}</option>
                                    <option value="2">{{ __("আগের মাস") }}</option>
                                    <option value="3">{{ __("শুরু থেকে") }}</option>
                                </select>
                            </div>

                            <div class="field">
                                <select name="billing_status" id="billing_status" class="ui search dropdown getid">
                                    <option value="">{{ __("বিলিং স্ট্যাটাস") }}</option>
                                    <option value="1">{{ __("বিল পরিশোধিত।") }}</option>
                                    <option value="0">{{ __("বিল বাকী রয়েছে। ") }}</option>
                                </select>
                            </div>

                            <div class="field">
                                <input type="hidden" name="emp_id" value="">
                                <button type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon filter alternate"></i> {{ __("ফিল্টার") }}</button>
                            </div>

                        </div>
                    </form>

                        </div>

                    </div>



                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>

                            <tr>
                                <th colspan="6"></th>
                            </tr>

                            <tr class="text-center">
                                <th colspan="2" class="table-primary">মোট বিল : {{ $total_bill }} টাকা </th>
                                <th colspan="2" class="table-danger">চলতি মাসে মোট বিল: {{ $total_this_month }} টাকা</th>
                                <th colspan="2" class="table-info">বিল বাকী আছে : {{ $paid_this_month }} টাকা</th>

                            </tr>

                            <tr>
                                <th colspan="6"></th>
                            </tr>

                            <tr>
                                <th>{{ __("গ্রাহকের কার্ড নং") }}</th>
                                <th>{{ __("গ্রাহকের নাম") }}</th>
                                <th>{{ __("বিল মাস") }}</th>
                                <th>{{ __("বিল বছর") }}</th>
                                <th>{{ __("বিলের পরিমান")}}</th>
                                <th>{{ __("বিলিং স্ট্যাটাস")}}</th>

                            </tr>

                        </thead>
                        <tbody>
                            @isset($billingData)
                            @foreach ($billingData as $val)
                            <tr>
                                <td>{{ $val->client_id}}</td>
                                <td>{{ $val->client_name}}</td>
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

@section('scripts')


<script>
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: false,
            lengthChange: false,
            dom: 'Blfrtip',
            buttons: [

                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'


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
</script>

@endsection