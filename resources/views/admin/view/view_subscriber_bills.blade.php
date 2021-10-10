@extends('layouts.admin')

@section('meta')
<title>Billing | Dingedah Network</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')


<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">
                    <p class="lead">&nbsp;&nbsp;বিলিং খাতা </p>
                        <!-- <button class="ui btn btn-primary mini offsettop5 btn-edit float-right"><i class="ui icon plus"></i>{{ __("বিল আপডেট করুন") }}</button>
                        <button onclick="location.href='/admin/billing/generate'" class="ui btn btn-secondary mini offsettop5 float-right">{{ __("এই মাসের বিল তৈরি করুন") }}</button>
                     -->
<hr>

                <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                    <thead>
                        
                        <tr>
                            <th>{{ __("Client Card No") }}</th>
                            <th>{{ __("Client Name") }}</th>
                            <th>{{ __("Bill Month") }}</th>
                            <th>{{ __("Bill Year") }}</th>
                            <th>{{ __("Bill Amount")}}</th>
                            <th>{{ __("Billing Status")}}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @isset($billingData)
                        @foreach ($billingData as $val)
                        <tr>
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
            lengthChange: false,
            dom: 'Blfrtip',
            buttons: [

                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
            ],

            exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
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