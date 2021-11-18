@extends('layouts.owner')

@section('meta')

<title>Memo Details | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Memo Details</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <div class="row g-3">


                            <table width="100%" class="table table-striped table-bordered" id="example2" data-order='[[ 0, "asc" ]]'>
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

                                    <tr class="bg-secondary text-white">
                                        <td>{{ $serial++}}</td>
                                        <td> Buyer Name</td>
                                        <td> Total</td>
                                        <td> Grand Total</td>
                                        <td> Buying Date</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $serial++}}</td>
                                        <td> @isset($memoProducts->first_name){{ $memoProducts->first_name }}@endisset , @isset($memoProducts->last_name){{ $memoProducts->last_name }}@endisset</td>
                                        <td> @isset($memoProducts->products_total){{ $memoProducts->products_total }}@endisset</td>
                                        <td> @isset($memoProducts->grand_amount){{ $memoProducts->grand_amount }}@endisset Taka</td>
                                        <td> @isset($memoProducts->creation_date){{ $memoProducts->creation_date }}@endisset</td>
                                    </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>

@endsection