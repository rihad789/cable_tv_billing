@extends('layouts.employee')

@section('meta')
<title>Memo Details | {{ $website_name }}</title>
<meta name="description" content="Dingedah Network Memo Details">
@endsection

@section('content')

<div class="container-fluid" id="printableArea">

    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;MEMO DETAILS
                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button onclick="history.back()" class="ui btn btn-secondary mini offsettop5 float-right"><i class="arrow left icon"></i>{{ __("Go Back") }}</button>
                    
                    </p>
                    <hr>

                    <table width="100%" class="table" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                @isset($memoData)
                                <th class="font-weight-bold">Total Product</th>
                                <th class="font-weight-bold"> {{ $memoData }} </th>
                                @endisset

                                @isset($total_amount)
                                <th class="font-weight-bold">Grand Total Value</th>
                                <th class="font-weight-bold"> {{ $total_amount }} Taka</th>
                                @endisset

                            </tr>
                        </thead>


                    </table>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Product Name") }}</th>
                                <th>{{ __("Quantity") }}</th>
                                <th>{{ __("Product Unit Price") }}</th>
                                <th>{{ __("Total Value") }}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php($serial=1)
                            @isset($memoDetails)
                            @foreach ($memoDetails as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->quantity }} </td>
                                <td>{{ $val->single_unit_price }} Taka</td>
                                <td>{{ $val->total_amount }} Taka</td>

                            </tr>
                            @endforeach
                            @endisset

                            <tr>

                                @isset($memoData)
                                <td> </td>
                                <td class="font-weight-bold">Total Product</td>
                                <td class="font-weight-bold"> {{ $memoData }} </td>
                                @endisset

                                @isset($total_amount)
                                <td class="font-weight-bold">Grand Total Value</td>
                                <td class="font-weight-bold"> {{ $total_amount }} Taka</td>
                                @endisset


                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $('#dataTables-example').DataTable({
        responsive: true,
        pageLength: 10,
        ordering: false,
        lengthChange: true,
        dom: 'Blfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
        ],

        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ]
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