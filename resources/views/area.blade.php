@extends('layouts.default')

@section('meta')

<title>Area | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Add Area</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_area_form" action="{{ url('area/add') }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Area Name</label>
                                <input type="text" name="area_name" id="area_name" class="form-control" placeholder="Area name">
                            </div>

                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add Area</button>
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
                            <table id="dataTables" class="table table-striped table-bordered" style="width:100%">

                                <thead class="table-light">
                                    <tr>
                                        <th>Serial</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php($serial=1)
                                    @isset($areasData)
                                    @foreach ($areasData as $val)
                                    <tr>
                                        <td>{{ $serial++}}</td>
                                        <td>{{ $val->area_name }}</td>
                                        <td>

                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ url('area/delete/'.$val->id) }}" onclick="return confirm('Are you sure,you want to delete area.This will delete all the vicinity related to it?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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