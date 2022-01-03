@extends('layouts.default')

@section('meta')

<title>Memo List | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Memo List</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="table-responsive">


                                <table class="table table-striped table-bordered" id="dataTables" style="width:100%">

                                    <thead class="thead-light">
                                        <tr>

                                            <th>{{ __("Serial") }}</th>
                                            <th>{{ __("Memo No") }}</th>
                                            <th>{{ __("Buyer Name") }}</th>
                                            <th>{{ __("Total Product") }}</th>
                                            <th>{{ __("Total Value") }}</th>
                                            <th>{{ __("Date") }}</th>
                                            <th>Action</th>

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
                                                <a href="{{ url('memo/'.$val->memo_no) }}" class="text-primary" title="Views"><i class="bi bi-eye-fill"></i></a>
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

        </div>

        <!--end row-->
    </div>
</div>

<!--fiuhfoiafj -->



<!--fgijafaf-->

@endsection