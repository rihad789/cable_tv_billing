@extends('layouts.employee')

@section('meta')
<title>Subscriber | {{ $website_name }}</title>
<meta name="description" content="Dingedah Network Subscriber">
@endsection

@section('content')
@include('manager.modals.add_subscriber')

<div class="container-fluid" id="printableArea">

    <div class="box box-success"> 
        <div class="box-content">
            <div class="row">
                <div class="col-md-12">
                    <p class="lead">&nbsp;&nbsp;SUBSCRIBER LIST
                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button onclick="location.href='/employee/area_vicinity'" class="ui btn btn-secondary mini offsettop5 float-right"><i class="ui building icon"></i>{{ __("Area & Vicinity") }}</button>
                        <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Subscriber") }}</button>
                    </p>
                    <hr>
                </div>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('employee/subscriber') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="two fields">
                            <div class="field">
                                <div class="sixteen wide field role">
                                    <select id="filter_input_area" class="ui dropdown uppercase required" name="filter_input_area" required>
                                        <option value="">Select Area Name</option>
                                        @isset($areasData)
                                        @foreach ($areasData as $val)
                                        <option value={{ $val->id }}>{{ $val->area_name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <select id="filter_input_vicinity" class="ui dropdown uppercase required form-control" name="filter_input_vicinity" required>
                                    <option value="">Select Vicinity Name</option>
                                </select>
                            </div>


                            <div class="two fields">
                                <div class="field">
                                    <button type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon filter alternate"></i> {{ __("Filter") }}</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="row">

<div class="col-md-12">

    <!-- Card user Count Data -->

    <table width="100%" class="table" class="" data-order='[[ 0, "asc" ]]'>
        <thead class="thead-light">

            <tr>
                <th>{{ __("Total Subscriber") }}</th>
                <th>{{ __("New Connection") }}</th>
                <th>{{ __("Connection Running") }}</th>
                <th>{{ __("Connection Disconnected") }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $total_sub}}</td>
                <td>{{ $subMonth}}</td>
                <td>{{ $connected_sub }}</td>
                <td>{{ $disconnect_sub }}</td>

            </tr>
        </tbody>
    </table>
</div>
</div>
            <div class="row">

                <div class="col-md-12">

                    <!-- Card user Count Data -->

                    <table width="100%" id="dataTables-example" class="table" class="" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Subscriber Card No") }}</th>
                                <th>{{ __("Subscriber Name") }}</th>
                                <th>{{ __("Initilization Date") }}</th>
                                <th>{{ __("Phone")}}</th>
                                <th>{{ __("Connection Status")}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @php($serial=1)
                            @isset($subscriberData)
                            @foreach ($subscriberData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
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
                                    <a href="{{ url('/employee/subscriber/'.$val->client_id) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
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
            pageLength: 8,
            ordering: false,
            lengthChange: true,
            dom: 'Blfrtip',
            buttons: [

                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
            ],
            lengthMenu: [
                [08, 25, 50, -1],
                ['08 rows', '25 rows', '50 rows', 'Show all']
            ]
        });


        $("#filter_input_area").change(function() {

            var area = $(this).val();

            // clear all values 
            $('#filter_input_vicinity option:not(:first)').remove();
            $.ajax({
                url: '/employee/subscriber/getVicinity/' + area,
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

                            $("#filter_input_vicinity").append(option);
                        }
                    }
                },

            });
        });

        $("#area").change(function() {

            var area = $(this).val();
            // clear all values 
            $('#vicinity option:not(:first)').remove();

            $.ajax({
                url: '/employee/subscriber/getVicinity/' + area,
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
                        prompt: 'Subscriber card no requried.'
                    }]
                },
                initialization_date: {
                    identifier: 'initialization_date',
                    rules: [{
                        type: 'empty',
                        prompt: 'Initialization date required.'
                    }]
                },
                client_name: {
                    identifier: 'client_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber name required.'
                    }]
                },
                client_father: {
                    identifier: 'client_father',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber fathers name required',
                    }]
                },
                area: {
                    identifier: 'area',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber area required.'
                    }]
                },
                vicinity: {
                    identifier: 'vicinity',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber vicinity required.'
                    }]
                },
                address: {
                    identifier: 'address',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber address required.'
                    }]
                },
                mobile_no: {
                    identifier: 'mobile_no',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber contact no required.'
                    }]
                },
                locked_fund: {
                    identifier: 'locked_fund',
                    rules: [{
                        type: 'empty',
                        prompt: 'Subscriber locked fund required.'
                    }]
                },
                bill_amount: {
                    identifier: 'bill_amount',
                    rules: [{
                        type: 'empty',
                        prompt: 'Bill amount required.'
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