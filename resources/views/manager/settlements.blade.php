@extends('layouts.manager')

@section('meta')

<title>Settlement History | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Settlement History</h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">

                            <thead class="thead-light">
                            <tr>
                                <th>{{ __("Serial") }}</th>
                                <th>{{ __("Settled Year") }}</th>
                                <th>{{ __("Settled Month") }}</th>
                                <th>{{ __("Sallery Paid") }}</th>
                                <th>{{ __("Locked Fund") }}</th>
                                <th>{{ __("Collected Bills") }}</th>
                                <th>{{ __("Cost In Service") }}</th>
                                <th>{{ __("Balance Paid") }}</th>
                                <th>{{ __("Settled At") }}</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @php($serial=1)
                            @isset($settlementsData)
                            @foreach ($settlementsData as $val)
                            <tr>
                                <td>{{ $serial++}}</td>
                                <td>{{ $val->settled_year }}</td>
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

                                <td>{{ $val->sallery_paid }} Taka</td>
                                <td>{{ $val->locked_fund }} Taka</td>
                                <td>{{ $val->collected_bills }} Taka</td>
                                <td>{{ $val->cost_in_service }} Taka</td>
                                <td>{{ $val->balance_paid }} Taka</td>
                                <td>{{ $val->updated_at }}</td>
                                <td class="text-primary">Print</td>
                                


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

