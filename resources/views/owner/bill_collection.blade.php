@extends('layouts.owner')

@section('meta')
<title>Dashboard | Metro Bangla Rail</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')
@include('owner.modals.edit_bill')

<div class="container-fluid" id="printableArea">

        <div class="box box-success">

                <div class="box-content">


                        <div class="row">

                                <div class="col-md-12">

                                        <p class="lead">&nbsp;&nbsp;BILL COLLECTION

                                                <button onclick="printDiv('printableArea')" class="ui btn btn-primary float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                                                @if( $due_bill == 0)
                                                <button onclick="window.alert('NO more due bills this Month')" class="ui btn btn-info mini offsettop5 float-right"><i class="plus icon"></i>{{ __("Bill Collection") }}</button>
                                                @else
                                                <button class="ui btn btn-primary mini offsettop5 btn-edit float-right"><i class="plus icon"></i>{{ __("Bill Collection") }}</button>
                                                @endif
                                        </p>
                                        <hr>
                                </div>
                        </div>

                        <div class="row">

                                <div class="col-md-12">
                                        <!-- Card user Count Data -->
                                        <table width="100%" class="table" data-order='[[ 0, "asc" ]]'>
                                                <thead class="thead-light">
                                                        <tr>
                                                                <th>{{ __("Total Bill")}}</th>
                                                                <th>{{ __("Current Month") }}</th>
                                                                <th>{{ __("Bill Paid") }}</th>
                                                                <th>{{ __("Bill Due") }}</th>
                                                                <th>{{ __("Todays Collection") }}</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td>{{ $total_bill }} Taka</td>
                                                                <td> {{ $total_this_month }} Taka </td>
                                                                <td>{{ $paid_this_month }} Taka</td>
                                                                <td>{{ $due_this_month }} Taka</td>
                                                                <td> {{ $paid_today }} Taka </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>


                        <div class="row">

                                <div class="col-md-12">

                                        <p class="lead">&nbsp;&nbsp;TODAYS COLLECTION</p>

                                        <hr>

                                        <!-- Card user Count Data -->

                                        <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                                                <thead class="thead-light">

                                                        <tr>
                                                                <th>{{ __("Serial") }}</th>
                                                                <th>{{ __("Client Card No") }}</th>
                                                                <th>{{ __("Client Name") }}</th>
                                                                <th>{{ __("Bill Month") }}</th>
                                                                <th>{{ __("Bill Year") }}</th>
                                                                <th>{{ __("Bill Amount")}}</th>
                                                                <th>{{ __("Collected By")}}</th>
                                                        </tr>

                                                </thead>
                                                <tbody>
                                                        @php($serial=1)
                                                        @isset($billingData)
                                                        @foreach ($billingData as $val)
                                                        <tr>
                                                                <td>{{ $serial++}}</td>
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
                                                                <td>{{ $val->updated_by }}</td>

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