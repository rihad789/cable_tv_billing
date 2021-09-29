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
                    </p><hr>

                <table class="table table-bordered">

                <tr class="text-center">

                <td class="table-primary">মোট বিল : {{ $total_bill }}</td>
                <td class="table-secondary">চলতি মাসে বিল জমা হবে : {{ $total_this_month }}</td>
                <td class="table-info">এই পর্যন্ত জমা বিল : {{ $paid_this_month }}</td> 

                </tr>
                </table>



                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("গ্রাহকের কার্ড নং") }}</th>
                                <th>{{ __("গ্রাহকের নাম") }}</th>
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
                                <td class="align-right">
                                    <a href="{{ url('/admin/subscriber/view'.$val->client_id) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
                                    <a href="{{ url('admin/subscriber/delete/'.$val->client_id) }}" onclick="return confirm('Are you sure you want to delete the user? It will revoke the user access')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
                                    <a href="{{ url('admin/subscriber/delete/'.$val->client_id) }}" onclick="return confirm('আপনি কি সত্যিই কল করতে চাচ্ছেন?')" class="ui circular basic icon button tiny"><i class="phone icon"></i></a>
                                </td>

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
        lengthChange: false,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
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