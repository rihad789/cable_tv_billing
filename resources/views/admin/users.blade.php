@extends('layouts.admin')

@section('meta')
<title>Users | Metro Bangla</title>
<meta name="description" content="Workday users, view all users, add, edit, delete users">
@endsection

@section('content')
@include('admin.modals.add_user')


<div class="container-fluid">

       <div class="row">
                <div class="box box-success">
                        <div class="box-body">
                                @if ($errors->any())
                                <div class="ui error message">
                                        <i class="close icon"></i>
                                        <div class="header">{{ __("There were some errors with your submission") }}</div>
                                        <ul class="list">
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                        </ul>
                                </div>
                                @endif

                                <p class="lead">&nbsp;&nbsp;অপারেটর
                <button class="ui btn btn-primary mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("নতুন অপারেটর") }}</button>
                </p>
                                <table width="100%" class="table table-striped" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                                        <thead>
                                                <tr>
                                                        <th>{{ __("সিরিয়াল") }}</th>
                                                        <th>{{ __("নাম") }}</th>
                                                        <th>{{ __("ফোন নং") }}</th>
                                                        <th>{{ __("ব্যবহারকারীর ধরন") }}</th>
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
                                                        <td>{{ $val->phone }}</td>
                                                        <td>{{ $val->display_name }}</td>

                                                        <td class="align-right">
                                                                <a href="{{ url('/admin/users/view/'.$val->id) }}" class="ui circular basic icon button tiny"><i class="icon eye"></i></a>
                                                                <a href="{{ url('/admin/users/delete/'.$val->id) }}" onclick="return confirm('Are you sure you want to delete the user? It will revoke the user access')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
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
            pageLength: 10,
            ordering:false,
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