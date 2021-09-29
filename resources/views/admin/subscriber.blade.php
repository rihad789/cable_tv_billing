@extends('layouts.admin')

@section('meta')
<title>গ্রাহক | ডিঙ্গেদহ নেটওয়ার্ক</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')
@include('admin.modals.add_subscriber')


<div class="container-fluid">



    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                <p class="lead">&nbsp;&nbsp;গ্রাহক লিষ্ট
                <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("নতুন গ্রাহক") }}</button>
                </p>
                    <hr>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("গ্রাহকের কার্ড নং") }}</th>
                                <th>{{ __("গ্রাহকের নাম") }}</th>
                                <th>{{ __("সংযোগের তারিখ") }}</th>
                                <th>{{ __("মোবাইল নং")}}</th>
                                <th>{{ __("কানেকশন স্ট্যাটাস")}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($subscriberData)
                            @foreach ($subscriberData as $val)
                            <tr>
                                <td>{{ $val->client_id}}</td>
                                <td>{{ $val->client_name }}</td>
                                <td>{{ $val->initialization_date }}</td>
                                <td>{{ $val->mobile_no }}</td>
                                @if($val->connection_status=="1")
                                <td class="text-primary">Active</td>
                                @elseif($val->connection_status=="0")
                                <td class="text-danger">Disabled</td>
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

                $("#area").change(function() {

                        var area = $(this).val();

                        // clear all values 
                        $('#vicinity option:not(:first)').remove();

                        $.ajax({
                                url: '/admin/subscriber/getVicinity/' + area,
                                type: 'get',
                                dataType: 'json',
                                success: function(response) {

                                        var len = 0;
                                        if (response.data != null) {
                                                len = response.data.length;
                                        }

                                        if (len > 0) {


                                                for (var i = 0; i < len; i++) {
                                                        var id = response.data[i].id;
                                                        var name = response.data[i].vicinity_name;

                                                        var option = "<option value='" + id + "'>" + name + "</option>";

                                                        $("#vicinity").append(option);

                                                }
                                        }
                                },

                        });
                });

        $('#add_subscriber_form').form({
            fields: {  

                client_id: {
                    identifier: 'client_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের কার্ড নং আবষ্যক ।'
                    }]
                },
                initialization_date: {
                    identifier: 'initialization_date',
                    rules: [{
                        type: 'empty',
                        prompt: 'সংযোগের তারিখ আবষ্যক ।'
                    }]
                },
                client_name: {
                    identifier: 'client_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের নাম আবষ্যক ।'
                    }]
                },
                client_father: {
                    identifier: 'client_father',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের পিতার নাম আবষ্যক'
                    }]
                },
                area: {
                    identifier: 'area',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রামের নাম আবষ্যক ।'
                    }]
                },
                vicinity: {
                    identifier: 'vicinity',
                    rules: [{
                        type: 'empty',
                        prompt: 'পাড়ার নাম আবষ্যক ।'
                    }]
                },
                address: {
                    identifier: 'address',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের ঠিকানা আবষ্যক ।'
                    }]
                },
                mobile_no: {
                    identifier: 'mobile_no',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের মোবাইল নং আবষ্যক ।'
                    }]
                },
                locked_fund: {
                    identifier: 'locked_fund',
                    rules: [{
                        type: 'empty',
                        prompt: 'গ্রাহকের জামানত আবষ্যক ।'
                    }]
                },
                bill_amount: {
                    identifier: 'bill_amount',
                    rules: [{
                        type: 'empty',
                        prompt: 'বিলের পরিমান আবষ্যক ।'
                    }]
                }

            }
        });

    });
</script>

@endsection

