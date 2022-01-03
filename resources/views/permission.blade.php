@extends('layouts.default')

@section('meta')

<title>Area | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">PErmission</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_area_form" action="{{ url('owner/permission/add') }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Permission Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Permission name" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Display Name</label>
                                <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Display name">
                            </div>

                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add</button>
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php($serial=1)
                                    @isset($permission)
                                    @foreach ($permission as $val)
                                    <tr>
                                        <td>{{ $serial++}}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->description }}</td>
<td>

<div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ url('/owner/employee/delete/'.$val->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete the user? It will revoke the user access')" class="ui circular basic icon button tiny" title="Delete"><i class="bi bi-trash-fill"></i></a>

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
