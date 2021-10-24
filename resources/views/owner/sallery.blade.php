@extends('layouts.owner')

@section('meta')
<title>Account | Dingedah Network</title>
<meta name="description" content="Dingedah Network Memo">
@endsection

@section('content')
@include('owner.modals.add_Sallery')



<div class="container-fluid" id="printableArea">


    <div class="box box-success">

        <div class="box-content">

            <div class="row">

                <div class="col-md-12">

                    <p class="lead">&nbsp;&nbsp;EMPLOYEE SALLERY
                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary mini offsettop5 float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="plus icon"></i>{{ __("Add Sallery") }}</button>

                    </p>
                    <hr>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <form action="{{ url('owner/sallery/filter') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="two fields">

                            <div class="field">
                                <select name="sallery_time" id="billing_time" class="ui  dropdown getid">
                                    <option value="">{{ __("Sallery Time") }}</option>
                                    <option value='1'>Current Month</option>
                                    <option value='2'>Past Month</option>
                                    <option value='3'>All of them</option>
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

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Employee Name") }}</th>
                                <th>{{ __("Sallery Month") }}</th>
                                <th>{{ __("Sallery Year") }}</th>
                                <th>{{ __("Sallery Amount") }}</th>
                                <th>{{ __("Payment Status") }}</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @php($serial=1)
                            @isset($salleryData)
                            @foreach ($salleryData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
                                <td>{{ $val->first_name }} , {{ $val->last_name }}</td>

                                @if($val->sallery_month=="1")
                                <td>January</td>
                                @elseif($val->sallery_month=="2")
                                <td>February</td>
                                @elseif($val->sallery_month=="3")
                                <td>March</td>
                                @elseif($val->sallery_month=="4")
                                <td>April</td>
                                @elseif($val->sallery_month=="5")
                                <td>May</td>
                                @elseif($val->sallery_month=="6")
                                <td>June</td>
                                @elseif($val->sallery_month=="7")
                                <td>July</td>
                                @elseif($val->sallery_month=="8")
                                <td>August</td>
                                @elseif($val->sallery_month=="9")
                                <td>September</td>
                                @elseif($val->sallery_month=="10")
                                <td>Octobor</td>
                                @elseif($val->sallery_month=="11")
                                <td>November</td>
                                @elseif($val->sallery_month=="12")
                                <td>December</td>
                                @endif

                                <td>{{ $val->sallery_year }}</td>
                                <td>{{ $val->sallery_amount }} Taka</td>

                                @if($val->payment_status=="1")
                                <td class="text-primary">Paid</td>
                                @elseif($val->payment_status=="0")
                                <td class="text-danger">Due</td>
                                @endif


                                @if($val->payment_status=="1")
                                <td class="align-right">
                                <a onclick="window.alert('Sallery Already settled')" class="ui circular basic icon button tiny">Settlled</a>
                            
                                </td>
                                @elseif($val->payment_status=="0")
                                <td class="align-right">
                                <a href="{{ url('/owner/sallery/settle/'.$val->id) }}" onclick="return confirm('You are about to pay {{ $val->sallery_amount }} Taka to {{ $val->first_name }} , {{ $val->last_name }}.Are you sure?')" class="ui circular basic icon button tiny">Settle Payment</a>
                            
                                </td>
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