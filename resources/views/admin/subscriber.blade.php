@extends('layouts.admin')

@section('meta')
<title>Subscriber | Dingedah Network</title>
<meta name="description" content="Dingedah Network Subscriber">
@endsection

@section('content')
@include('admin.modals.add_subscriber')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <!-- Card user Count Data -->
            <div class="box box-success">
                <div class="box-content">

                <p class="lead">&nbsp;&nbsp;SUBSCRIBER LIST
                <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("New Subscriber") }}</button>
                </p>
                    <hr>


                    <table width="100%"  id="dataTables-example" class="table table-striped" class="" data-order='[[ 0, "asc" ]]'>
                        <thead>

                        <tr><td colspan="6"></td></tr>

<tr class="text-center">
    <th colspan="2" class="table-primary">Total Subscriber : {{ $total_sub }}  </th>
    <th colspan="2" class="table-danger">Connection Running: {{ $connected_sub }} </th>
    <th colspan="2" class="table-info">Connection Disconnected : {{ $disconnect_sub }} </th>

</tr>

<tr><td colspan="6"></td></tr>

                            <tr>
                                <th>{{ __("Subscriber Card No") }}</th>
                                <th>{{ __("Subscriber Name") }}</th>
                                <th>{{ __("Initilization Date") }}</th>
                                <th>{{ __("Phone")}}</th>
                                <th>{{ __("Connection Status")}}</th>
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
                                <td class="text-primary">Running</td>
                                @elseif($val->connection_status=="0")
                                <td class="text-danger">Disconnected</td>
                                @endif
                                <td class="align-right">
                                    <a href="{{ url('/admin/subscriber/'.$val->client_id) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
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
            ordering:false,
            lengthChange: false,
            dom: 'Blfrtip',
    buttons: [
        
            'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'

        
    ]});


        // $('#dataTables-example').DataTable( {    buttons: [        'copy', 'excel', 'pdf'    ]} );  table.buttons().container()    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

        

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


$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );

</script>

@endsection

