@extends('layouts.owner')

@section('meta')

<title>Sallery | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Add Sallery</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_subscriber_form" action="{{ url('owner/sallery/add') }}" method="post" accept-charset="utf-8">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Employee</label>
                                <select id="employee_id" class="form-select" name="employee_id" required>
                                    <option selected disabled value="">Select Employee Name</option>

                                    @foreach ($userData as $val)
                                    <option value={{ $val->id }}>{{ $val->first_name }} , {{ $val->last_name }} , {{ $val->display_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Sallery Amount</label>
                                <input type="text" name="sallery" id="sallery" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Bill Amount" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add Sallery</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">

                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __("Serial") }}</th>
                                        <th>{{ __("Employee Name") }}</th>
                                        <th>{{ __("Sallery Month") }}</th>
                                        <th>{{ __("Sallery Year") }}</th>
                                        <th>{{ __("Sallery Amount") }}</th>
                                        <th>{{ __("Payment Status") }}</th>

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
                                        <td class="align-right">
                                            <a onclick="window.alert('Sallery Already settled')" class="ui circular basic icon button tiny">Paid</a>
                                        </td>
                                        @elseif($val->payment_status=="0")
                                        <td class="align-right">
                                            <a href="{{ url('/owner/sallery/settle/'.$val->id) }}" onclick="return confirm('You are about to pay {{ $val->sallery_amount }} Taka to {{ $val->first_name }} , {{ $val->last_name }}.Are you sure?')" class="ui circular basic icon button tiny">Pay Sallery</a>
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
        <!--end row-->
    </div>
</div>

<!--fiuhfoiafj -->



<!--fgijafaf-->

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
            'csvHtml5',
            'pdfHtml5',
        ],

        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ]
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


    });
</script>

@endsection