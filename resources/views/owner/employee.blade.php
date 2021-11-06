@extends('layouts.owner')

@section('meta')
<title>Employee | {{ $website_name }}</title>
<meta name="description" content="Workday users, view all users, add, edit, delete users">
@endsection

@section('content')
@include('owner.modals.add_employee')


<div class="container-fluid">

    <div class="row">
        <div class="box box-success">
            <div class="box-content">
 

                <p class="lead">&nbsp;&nbsp;EMPLOYEE 
                    <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Employee") }}</button>
                    </p>

                <hr>
                <table width="100%" class="table" id="dataTables-example1" data-order='[[ 0, "asc" ]]'>
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

                            <td class="align-right">
                                <a href="{{ url('/owner/employee/'.$val->id) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
                                <a href="{{ url('/owner/employee/delete/'.$val->id) }}" onclick="return confirm('Are you sure you want to delete the user? It will revoke the user access')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
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

@endsection

@section('scripts')
<script type="text/javascript">
    $('#dataTables-example').DataTable({
        responsive: true,
        lengthChange: false,
    });

    $('#dataTables-example1').DataTable({
        responsive: true,
        pageLength: 10,
        ordering: false,
        lengthChange: false,
    });
</script>


<script>
    $(document).ready(function() {

        $('#add_system_user_form').form({
            fields: {
                phone: {
                    identifier: 'phone',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে ব্যবহারকারীর ফোন নং দিন'
                    }]
                },
                first_name: {
                    identifier: 'first_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে নামের প্রথম অংশ লিখুন'
                    }]
                },
                last_name: {
                    identifier: 'last_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে নামের শেষাংশ লিখুন'
                    }]
                },
                role_id: {
                    identifier: 'role_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে ব্যবহারকারীর ধরন পছন্দ করুন'
                    }]
                },
                password: {
                    identifier: 'password',
                    rules: [{
                        type: 'empty',
                        prompt: 'অনুগ্রহ করে পাসওয়ার্ড লিখুন'
                    }]
                }
            }
        });

    });
</script>


@endsection