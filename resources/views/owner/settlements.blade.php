@extends('layouts.owner')

@section('meta')
<title>Settlements | {{ $website_name }}</title>
<meta name="description" content="Dingedah Network Memo">
@endsection

@section('content')


<div class="container-fluid" id="printableArea">


    <div class="box box-success">

        <div class="box-content">

            <div class="row">

                <div class="col-md-12">

                    <p class="lead">&nbsp;&nbsp;SETTLEMENT HISTORY
                    </p>
                    <hr>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <!-- Card user Count Data -->

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Settled Month") }}</th>
                                <th>{{ __("Settled Year") }}</th>
                                <th>{{ __("Sallery Paid") }}</th>
                                <th>{{ __("Locked Fund") }}</th>
                                <th>{{ __("Collected Bills") }}</th>
                                <th>{{ __("Cost In Service") }}</th>
                                <th>{{ __("Balance Paid") }}</th>
                                <th>{{ __("Settled At") }}</th>
                                
                            </tr>
                        </thead>

                       
                        <tbody>
                            @php($serial=1)
                            @isset($settlementsData)
                            @foreach ($settlementsData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>

                                @if($val->settled_month=="1")
                                <td>January</td>
                                @elseif($val->settled_month=="2")
                                <td>February</td>
                                @elseif($val->settled_month=="3")
                                <td>March</td>
                                @elseif($val->settled_month=="4")
                                <td>April</td>
                                @elseif($val->settled_month=="5")
                                <td>May</td>
                                @elseif($val->settled_month=="6")
                                <td>June</td>
                                @elseif($val->settled_month=="7")
                                <td>July</td>
                                @elseif($val->settled_month=="8")
                                <td>August</td>
                                @elseif($val->settled_month=="9")
                                <td>September</td>
                                @elseif($val->settled_month=="10")
                                <td>Octobor</td>
                                @elseif($val->settled_month=="11")
                                <td>November</td>
                                @elseif($val->settled_month=="12")
                                <td>December</td>
                                @endif

                                <td>{{ $val->settled_year }}</td>
                                <td>{{ $val->sallery_paid }} Taka</td>
                                <td>{{ $val->locked_fund }} Taka</td>
                                <td>{{ $val->collected_bills }} Taka</td>
                                <td>{{ $val->cost_in_service }} Taka</td>
                                <td>{{ $val->balance_paid }} Taka</td>
                                <td>{{ $val->updated_at }}</td>
                                


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
            'pdfHtml5'

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

<script>
    $(document).ready(function() {

        $('#add_sallery').form({
            fields: {

                employee_id: {
                    identifier: 'employee_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'PLease Select Employee'
                    }]
                },
                sallery: {
                    identifier: 'sallery',
                    rules: [{
                        type: 'empty',
                        prompt: 'PLease Enter Sallery Amount'
                    }]
                }
            }
        });

    });
</script>

@endsection