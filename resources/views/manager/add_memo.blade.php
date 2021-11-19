@extends('layouts.manager')

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
            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_subscriber_form" action="{{ url('manager/memo/add') }}" method="post" accept-charset="utf-8">
                            @csrf

                            <div class="col-md-12 table-responsive">

                                <div class="row g-3" id="inputFormRow">

                                    <div class="col-md-5">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="memo_no" class="form-control" id="memo_no" placeholder="Memo No" required >
                                    </div>

                                    <div class="col-md-5">
                                        <select id="buyer_id" class="form-select" name="buyer_id" required>
                                            <option selected disabled value="">Select Buyer Name</option>

                                            @foreach ($userData as $val)
                                            <option value={{ $val->id }}>{{ $val->first_name }} , {{ $val->last_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <button id="addRow" class="form-control"><i class="bi bi-plus"></i>{{ __("Add Row") }}</button>
                                    </div>

                                </div>

                                

                                <div class="row g-3" style="margin-top: 10px;">

                                    <div class="col-md-3">
                                        <input type="text" name="title[]" class="form-control" id="title" placeholder="Product name" autocapitalize="off" required>
                                    </div>

                                    <div class="col-md-3">
                                        <input name="single_unit_price[]" type="number" class="form-control" id="single_unit_price" placeholder="Single Unit Price" autocapitalize="off" required>
                                    </div>

                                    <div class="col-md-2">
                                        <input name="quantity[]" class="form-control" type="number" id="quantity" placeholder="Quantity" autocapitalize="off" required>
                                    </div>

                                    <div class="col-md-3">
                                        <input name="total_amount[]" class="form-control" type="number" id="total_amount" placeholder="0" autocapitalize="off" required>
                                    </div>

                                    <div class="col-md-1">
                                        <button id="removeRow" type="button" class="btn btn-secondary">Remove</button>
                                    </div>

                                </div>

                                <!-- Add New Row Here -->
                                <div id="newRow"></div>

                            </div>

                            <div class="row g-3">

                                <div class="col-md-12">                                 
                                        <button type="submit" class="btn btn-primary">Add Memo</button>                                 
                                </div>

                            </div>

                        </form>
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

function getValues() {
        var amount_total = document.getElementsByName('total_amount[]');
        var grand_total = 0;
        for (var i = 0; i < amount_total.length; i++) {
            grand_total = grand_total + parseInt(amount_total[i].value);
        }

        var quantity = document.getElementsByName('quantity[]');
        var quantity_total = 0;
        for (var i = 0; i < quantity.length; i++) {
            quantity_total = quantity_total + parseInt(quantity[i].value);
        }

        $('#products_total').val(quantity_total);
        $('#grand_amount').val(grand_total);
    }

    $(document).ready(function() {

        // add row
        $("#addRow").click(function() {

            //fgajfahfajfjafjo

            var html = '';

            html += '<div class="row g-3" style="margin-top: 10px;" id="inputFormRow">';

            html += '<div class="col-md-3">';
            html += '<input type="text" name="title[]" class="form-control" id="title" placeholder="Product name" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="col-md-3">';
            html += '<input name="single_unit_price[]" type="number" class="form-control" id="single_unit_price" placeholder="Single Unit Price" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="col-md-2">';
            html += '<input name="quantity[]" class="form-control" type="number" id="quantity" placeholder="Quantity" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="col-md-3">';
            html += '<input name="total_amount[]" class="form-control" type="number" id="total_amount" placeholder="0" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="col-md-1">';
            html += '<button id="removeRow" type="button" class="btn btn-secondary">Remove</button>';
            html += '</div>';

            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });


    });
</script>

@endsection