@extends('layouts.default')

@section('meta')

<title>Update Bills | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Subscriber Bills</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <div class="row g-3">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead class="table-light">
                                    <tr>
                                        <th>Field Name</th>
                                        <th>Field Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Card NO</td>
                                        <td>@isset($subscriberData->client_id){{ $subscriberData->client_id }}@endisset</td>
                                    </tr>

                                    <tr>
                                        <td>Name</td>
                                        <td>@isset($subscriberData->client_name){{ $subscriberData->client_name }}@endisset</td>
                                    </tr>

                                    <tr>
                                        <td>Fathers Name</td>
                                        <td>@isset($subscriberData->client_father){{ $subscriberData->client_father }}@endisset</td>
                                    </tr>

                                    <tr>
                                        <td>Mobile No</td>
                                        <td> <a type="button" href="tel:@isset($subscriberData->mobile_no){{ $subscriberData->mobile_no }}@endisset">@isset($subscriberData->mobile_no){{ $subscriberData->mobile_no }}@endisset <i class="icon call"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td>Bill Amount</td>
                                        <td>@isset($subscriberData->bill_amount){{ $subscriberData->bill_amount }}@endisset টাকা</td>
                                    </tr>

                                    <tr>
                                        <td>Locked Fund</td>
                                        <td> @isset($subscriberData->locked_fund){{ $subscriberData->locked_fund }}@endisset টাকা</td>
                                    </tr>

                                    <tr>
                                        <td>Initialize Date</td>
                                        <td>@isset($subscriberData->initialization_date){{ $subscriberData->initialization_date }}@endisset</td>
                                    </tr>

                                    <tr>
                                        <td>Address</td>
                                        <td>@isset($subscriberData->address){{ $subscriberData->address }}@endisset</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="row g-3">

                            <div class="col-md-12">
                                <label class="form-label">Subscriber ID</label>
                                <input type="text" name="client_id" id="client_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" placeholder="Type Subscriber ID to search..">
                            </div>

                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button id="client_search_btn" onclick="search_subscriber()" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <form class="row g-3" id="add_subscriber_form" action="{{ url('billing/collect_bills') }}" method="post" accept-charset="utf-8">

                            @csrf
                            <div class="row g-3">

                                <div class="col-md-12">

                                    <label class="form-label">Collected By</label>
                                    <select id="collected_by" class="form-select" name="collected_by" required>
                                        <option selected disabled value="">Select Collected By</option>
                                        @isset($userData)
                                        @foreach ($userData as $val)
                                        <option value='{{ $val->id }}'>{{ $val->first_name }} , {{ $val->last_name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>

                                </div>

                            </div>

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <!-- Card user Count Data -->
                                    <table width="100%" class="table table-striped table-bordered" data-order='[[ 0, "asc" ]]'>
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Due Months</th>
                                                <th>Due Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @isset($billingData)
                                                <td>{{ $due_month }} Months</td>
                                                <td> {{ $due_bills }} Taka </td>
                                                @if($due_month==0)
                                                <td class="text-info">No due bills</td>
                                                @else
                                                <td>
                                                    <input type="text" name="client_id" id="client_id" value="@isset($subscriberData->client_id){{ $subscriberData->client_id }}@endisset" readonly hidden>
                                                    <input type="text" name="due_bills" id="due_bills" value="{{ $due_bills }}" readonly hidden>
                                                    <button class="btn btn-mini text-primary" onclick="return confirm('You are about to collect {{ $due_bills }} Taka from @isset($subscriberData->client_name){{ $subscriberData->client_name }}@endisset.Would you like to continue?')"><i class="icon plus"></i>Collect Bills</button>
                                                </td>
                                                @endif
                                                @endisset
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </form>

                        <div class="row g-3">

                            <div class="table-responsive">
                                <table id="dataTables" class="table table-striped table-bordered" style="width:100%">

                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __("Serial")}}</th>
                                            <th>{{ __("Month") }}</th>
                                            <th>{{ __("Year") }}</th>
                                            <th>{{ __("Amount")}}</th>
                                            <th>{{ __("Status")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @isset($billingData)
                                        @php($serial=1)
                                        @foreach ($billingData as $val)

                                        <tr>
                                            <td>{{$serial++}}</td>
                                            @if($val->bill_month=="1")
                                            <td>January</td>
                                            @elseif($val->bill_month=="2")
                                            <td>February</td>
                                            @elseif($val->bill_month=="3")
                                            <td>March</td>
                                            @elseif($val->bill_month=="4")
                                            <td>April</td>
                                            @elseif($val->bill_month=="5")
                                            <td>May</td>
                                            @elseif($val->bill_month=="6")
                                            <td>June</td>
                                            @elseif($val->bill_month=="7")
                                            <td>July</td>
                                            @elseif($val->bill_month=="8")
                                            <td>August</td>
                                            @elseif($val->bill_month=="9")
                                            <td>September</td>
                                            @elseif($val->bill_month=="10")
                                            <td>Octobor</td>
                                            @elseif($val->bill_month=="11")
                                            <td>November</td>
                                            @elseif($val->bill_month=="12")
                                            <td>December</td>
                                            @endif

                                            <td>{{ $val->bill_year }}</td>
                                            <td>{{ $val->bill_amount }}</td>

                                            @if($val->billing_status=="1")
                                            <td class="text-primary">Paid</td>
                                            @elseif($val->billing_status=="0")
                                            <td class="bg-danger text-white">Due</td>
                                        </tr>

                                        @endif
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

@section('scripts')

<script>
    function search_subscriber() {

        var client_id = $('#client_id').val();

        var url = '/subscriber/search/' + client_id;
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;

    }
</script>

@endsection