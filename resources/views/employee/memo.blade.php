@extends('layouts.employee')

@section('meta')
<title>Account | Dingedah Network</title>
<meta name="description" content="Dingedah Network Memo">
@endsection

@section('content')
@include('manager.modals.add_memo')


<div class="container-fluid" id="printableArea">

    <div class="row">

        <div class="col-md-12">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;SHOPPING DIARY
                        <button onclick="printDiv('printableArea')" class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="print icon"></i>{{ __("Print") }}</button>
                        <button class="ui btn btn-info mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Shopping Memo") }}</button>

                    </p>
                    <hr>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Memo No") }}</th>
                                <th>{{ __("Buyer Name") }}</th>
                                <th>{{ __("Total Product") }}</th>
                                <th>{{ __("Total Value") }}</th>
                                <th>{{ __("Date") }}</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            @php($serial=1)
                            @isset($memoData)
                            @foreach ($memoData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
                                <td>{{ $val->memo_no }}</td>
                                <td>{{ $val->first_name }} , {{ $val->last_name }}</td>
                                <td>{{ $val->products_total }} </td>
                                <td>{{ $val->grand_amount }} ৳</td> 
                                <td>{{ $val->creation_date }} </td>


                                <td class="align-right">
                                    <a href="{{ url('/manager/memo/'.$val->memo_no) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
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
    function getvalues() {
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

            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="two fields">';

            html += '<div class="field">';
            html += '<label>Product Name</label>';
            html += '<input type="text" name="title[]" class="form-control" id="title" placeholder="Product Name" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="field">';
            html += '<label>Single Unit Price</label>';
            html += '<input type="number" name="single_unit_price[]" class="form-control" id="single_unit_price" placeholder="Single Unit Price" autocapitalize="off" required>';
            html += '</div>'

            html += '<div class="field">';
            html += '<label>Quantity</label>';
            html += '<input type="number" name="quantity[]" class="form-control" id="quantity" placeholder="Quantity" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="field">';
            html += '<label>Total</label>';
            html += '<input type="number" name="total_amount[]" class="form-control" id="total_amount" placeholder="0" autocapitalize="off" required>';
            html += '</div>';

            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger circular" ><i class="icon trash alternate outline"></i></button>';
            html += '</div>';

            html += '</div>';

            html += '<hr>';

            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });


        // $('input[id=quantity]').on('keyup', function() {

        //     //Get
        //     var single_unit_price = $('#single_unit_price').val();
        //     var quantity = $('#quantity').val();
        //     var total_amount = single_unit_price * quantity;

        //     //Set
        //     $('#total_amount').val(total_amount);

        // });


        $('#add_new_calculation').form({
            fields: {

                memo_no: {
                    identifier: 'memo_no',
                    rules: [{
                        type: 'empty',
                        prompt: 'মেমো নং আবষ্যক ।'
                    }]
                },
                buyer_name: {
                    identifier: 'buyer_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'ক্রেতার নাম আবষ্যক ।'
                    }]
                },
                products_total: {
                    identifier: 'products_total',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে মোট পন্য হিসাব করুন ।'
                    }]
                },
                grand_amount: {
                    identifier: 'grand_amount',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে সর্বমোট মূল্য হিসাব করুন ।'
                    }]
                }

            }
        });

    });
</script>

@endsection