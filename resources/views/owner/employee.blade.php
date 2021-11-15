@extends('layouts.owner')

@section('meta')

<title>Sallery | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">Add Sallery</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">
                        <form class="row g-3" id="add_subscriber_form" action="{{ url('owner/subscriber/add') }}" method="post" accept-charset="utf-8">
                            @csrf


                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">Employee Role</label>
                                <select class="form-select" name="role_id" id="role_id" required>
                                    <option selected disabled value="">Select Role</option>
                                    <option value="manager">Manager</option>
                                    <option value="employee">Employee</option>

                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Add Employee</button>
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

                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __("Serial") }}</th>
                                        <th>{{ __("Name") }}</th>
                                        <th>{{ __("Email") }}</th>
                                        <th>{{ __("Role") }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($serial=1)
                                    @isset($user)
                                    @foreach ($user as $val)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $val->first_name.",".$val->last_name }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->display_name }}</td>

                                        <td>

                                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ url('/owner/employee/'.$val->id) }}" class="text-primary" title="Views"><i class="bi bi-eye-fill"></i></a>
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

@section('scripts')

<script>
    $(document).ready(function() {


        $("#area").change(function() {

            var area = $(this).val();

            // clear all values 
            $('#vicinity option:not(:first)').remove();

            $.ajax({
                url: '/owner/subscriber/getVicinity/' + area,
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