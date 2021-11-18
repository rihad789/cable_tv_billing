@extends('layouts.employee')

@section('meta')

<title>Subscriber | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Add Subscriber</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_subscriber_form" action="{{ url('employee/subscriber/add') }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Card no</label>
                                <input type="text" name="client_id" id="client_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Card No" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Initialization Date</label>
                                <input type="date" name="initialization_date" id="initialization_date" class="form-control" placeholder="Initialization Date" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control" placeholder="Name" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Father's Name</label>
                                <input type="text" name="client_father" id="client_father" class="form-control" placeholder="Father's Name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Area</label>
                                <select class="form-select" name="area" id="area" required>
                                    <option selected disabled value="">Select Area</option>
                                    @foreach ($areasData as $val)
                                    <option value={{ $val->id }}>{{ $val->area_name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Vicinity</label>
                                <select class="form-select" name="vicinity" id="vicinity" required>
                                    <option selected disabled value="">Select Vicinity</option>



                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Mobile</label>
                                <input type="text" name="mobile_no" id="mobile_no" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" pattern="[0-9]{11}" class="form-control" placeholder="Mobile No" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Locked Fund</label>
                                <input type="text" name="locked_fund" id="locked_fund" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Locked Fund" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Bill Amount</label>
                                <input type="text" name="bill_amount" id="bill_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Bill Amount" required>
                            </div>

                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add Subscriber</button>
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

                                <thead class="table-light">
                                    <tr>
                                        <th>Serial</th>
                                        <th>Card No</th>
                                        <th>Name</th>
                                        <th>Ini. Date</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                        <td class="text-primary">সংযোগ চালু আছে</td>
                                        @elseif($val->connection_status=="0")
                                        <td class="text-danger">সংযোগ বন্ধ আছে</td>
                                        @endif
                                        <td class="align-right">

                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ url('/employee/subscriber/search/'.$val->client_id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                            </div>

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
        <!--end row-->
    </div>
</div>

<!--fiuhfoiafj -->



<!--fgijafaf-->

@endsection

@section('scripts')

<script>
    $(document).ready(function() {

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


    });
</script>

@endsection