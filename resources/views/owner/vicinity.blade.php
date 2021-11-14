@extends('layouts.owner')

@section('meta')

<title>Vicinity | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Add Vicinity</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" action="{{ url('owner/vicinity/add') }}" method="post" accept-charset="utf-8">

                            @csrf
                            <div class="col-12">
                                <label class="form-label">Area</label>
                                <select class="form-select" name="area_id" id="area_id">

                                    @foreach ($areasData as $val)
                                    <option value={{ $val->id }}>{{ $val->area_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Vicinity Name</label>
                                <input type="text" name="vicinity_name" id="vicinity_name" class="form-control" placeholder="Vicinity name">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add Vicinity</button>
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
                            <table class="table align-middle" id="example2" data-order='[[ 0, "asc" ]]'>
                                <thead class="table-light">
                                    <tr>
                                        <th>Serial</th>
                                        <th>Vicinity</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php($serial=1)
                                    @isset($vicinitiesData)
                                    @foreach ($vicinitiesData as $val)
                                    <tr>
                                        <td>{{ $serial++}}</td>
                                        <td>{{ $val->vicinity_name }}</td>
                                        <td>{{ $val->area_name }}</td>

                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ url('owner/vicinity/delete/'.$val->id) }}" onclick="return confirm('Are you sure,you want to delete vicintiy?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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

@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $('#add_area_form').form({
            fields: {
                area_name: {
                    identifier: 'area_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Area name required ।'
                    }]
                }
            }
        });

        $('#add_vicinity_form').form({
            fields: {
                area_id: {
                    identifier: 'area_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please select area name ।'
                    }]
                },
                vicinity_name: {
                    identifier: 'vicinity_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Vicinity name required ।'
                    }]
                }
            }
        });

    });
</script>

@endsection