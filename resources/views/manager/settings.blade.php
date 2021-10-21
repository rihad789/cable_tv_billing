@extends('layouts.manager')

@section('meta')
<title>Profile | Metro Bangla</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="box box-success">
            <div class="box-body">

                <form id="edit_system_user_form" action="{{ url('manager/profile/update') }}" class="ui form add-user" method="post" accept-charset="utf-8">

                    @csrf

                    <p class="lead">&nbsp;&nbsp;সিস্টেম সেটিং</p>
                    <hr>

                    <div class="field">
                        <label>{{ __("ওয়েবসাইটের নাম") }}</label>
                        <input id="website_name" class="block mt-1 w-full" type="text" placeholder="ওয়েবসাইটের নাম" value="@isset($settingsData->website_name){{ $settingsData->website_name }}@endisset" name="website_name" />
                    </div>

                    <div class="field">
                        <label>{{ __("ওয়েবসাইটের লগো লিংক") }}</label>
                        <input id="logo_url" class="block mt-1 w-full" type="file" value="@isset($settingsData->logo_url){{ $settingsData->logo_url }}@endisset" name="logo_url" />
                    </div>

                    <div class="field">
                        <label>{{ __("গ্রাহক প্রতি ডিস বিল") }}</label>
                        <input id="dish_bill" class="block mt-1 w-full" type="number" placeholder="150" value="@isset($settingsData->dish_bill){{ $settingsData->dish_bill }}@endisset" name="dish_bill" />
                    </div>

                    <div class="field">
                        <div class="ui error message">
                            <i class="close icon"></i>
                            <div class="header"></div>
                            <ul class="list">
                                <li class=""></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="box-footer">

                <button class="btn btn-primary" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                <a href="{{ url('admin') }}" class="btn btn-secondary"><i class="ui times icon"></i> {{ __("Cancel") }}</a>

            </div>
            </form>


        </div>
    </div>
</div>
</div>

@endsection


@section('scripts')


<script>
    $(document).ready(function() {

        $('#edit_system_user_form').form({
            fields: {
                contact_email: {
                    identifier: 'contact_email',
                    rules: [{
                        type: 'email',
                        prompt: 'Please Enter Contact Email'
                    }]
                },
                phone: {
                    identifier: 'phone',
                    rules: [{
                        type: 'integer',
                        prompt: 'Please Enter Contact phone'
                    }]
                },
                altphone: {
                    identifier: 'altphone',
                    rules: [{
                        type: 'integer',
                        prompt: 'Please Enter Alternate Contact Phone'
                    }]
                },
                first_name: {
                    identifier: 'first_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter First Name'
                    }]
                },
                last_name: {
                    identifier: 'last_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Last Name'
                    }]
                },
                gender: {
                    identifier: 'gender',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Select a Gender'
                    }]
                },
                civilstatus: {
                    identifier: 'civilstatus',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Select a Civil Status'
                    }]
                },
                division: {
                    identifier: 'division',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Division For Permanent Address'
                    }]
                },
                district: {
                    identifier: 'district',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter District For Permanent Address'
                    }]
                },
                thana: {
                    identifier: 'thana',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Thana For Permanent Address'
                    }]
                },
                postal_code: {
                    identifier: 'postal_code',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Postal Code For Permanent Address'
                    }]
                },
                street: {
                    identifier: 'street',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Street For Permanent Address'
                    }]
                }

            }
        });


    });
</script>

@endsection