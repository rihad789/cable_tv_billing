@extends('layouts.owner')

@section('meta')
<title>Subscriber | {{ $website_name }}</title>
<meta name="description" content="Dingedah Network Subscriber">
@endsection

@section('content')
@include('owner.modals.add_subscriber')

<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<div class="container-fluid" id="printableArea">

    <div class="box box-success">
        <div class="box-content">

            <div class="row">

                <div class="col-md-12">


                    <p class="lead">&nbsp;&nbsp;

                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button class="ui btn btn-info mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Subscriber") }}</button>

                    </p>
                    <hr>

                </div>


            </div>


            <div class="row">

                <div class="col-md-4">

                    <div class="row">

                        <div class="col-md-12">
                            <p class="lead text-center">&nbsp;&nbsp;SUBSCRIBER INFO</p>
                            <hr>
                        </div>


                    </div>

                    <div class="row">

                        <table width="100%" class="table table-bordered"  data-order='[[ 0, "asc" ]]'>

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

                            </tbody>

                        </table>


                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <hr>
                            <form action="{{ url('owner/subscriber') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                                @csrf
                                <div class="two fields">

                                    <div class="field">
                                        <select name="client_id" id="client_id" class="ui search dropdown getid">
                                            <option value="">{{ __("Select Subscriber ID") }}</option>
                                            @foreach ($sub_client_id as $val)
                                            <option value="{{ $val->client_id }}">{{ $val->client_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    <div class="field">
                                        <button  type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon search alternate"></i> {{ __("Search") }}</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">


                    <div class="row">

                        <div class="col-md-12">

                            <p class="lead">&nbsp;&nbsp;COMPLETE BILLS
                            
                            </p>
                            <hr>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <table width="100%" class="table table-bordered" id="dataTables-example" data-order='[[ 0, "asc" ]]'>

                            <thead class="thead-light">
                                    <tr>
                                        <th>{{ __("Serial")}}</th>
                                        <th>{{ __("Month") }}</th>
                                        <th>{{ __("Year") }}</th>
                                        <th>{{ __("Amount")}}</th>
                                        <th>{{ __("Status")}}</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>

                                    @isset($billingData)
                                    @php($serial=1)
                                    @foreach ($billingData as $val)

                                    
                                    @if($val->billing_status=="1")
                                        <tr class="text-white bg-primary">

                                        <td> {{$serial++}}</td>

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

                                        <td>Paid</td>

                                        

                                        </tr>

                                        @elseif($val->billing_status=="0")

                                        <tr class="text-white bg-danger">

                                        <td> {{$serial++}}</td>
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

                                        <td>
                                            <a class="text-white" href="{{ url('/owner/sallery/settle/'.$val->id) }}" onclick="return confirm('You are about to collect {{ $val->bill_amount }} Taka from {{ $val->client_name }}.Are you sure?')"><i class="icon plus"></i>Collect</a>
                                        </td>

                                        </tr>

                                        @endif

                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>

                        </div>


                    </div>



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
        lengthChange: true,
        dom: 'Blfrtip',
        buttons: [

            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'

        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ]
    });


    $('#dataTables-example1').DataTable({
        responsive: true,
        pageLength: 10,
        ordering: false,
        lengthChange: true,
        dom: 'Blfrtip',
        buttons: [

            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'

        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ]
    });


        $("#client_id").change(function() {

            var area = $(this).val();

            $id= area;

        });

        $("#area").change(function() {

            var area = $(this).val();
            // clear all values 
            $('#vicinity option:not(:first)').remove();

            $.ajax({
                url: '/owner/subscriber/getVicinity/' + area,
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