@extends('layouts.manager')

@section('meta')
<title>Profile | {{ $website_name }}</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="container-fluid">

<div class="row">

    <div class="col-md-8">

        <div class="row">
            <div class="box box-success">
                <div class="box-body">

                    <form id="edit_system_user_form" action="{{ url('manager/my_profile/update_profile') }}" class="ui form add-user" method="post" accept-charset="utf-8">

                        @csrf
                        <div class="field">
                            <input id="id" class="block mt-1 w-full" type="text" value="@isset($userData->id){{ $userData->id }}@endisset" name="id" class="readonly" hidden />
                        </div>

                        <p class="lead">&nbsp;&nbsp;Contact Information</p>
                        <hr>


                        <div class="two fields">

                            <div class="field">
                                <label>{{ __("Email") }}</label>
                                <input id="email" class="block mt-1 w-full" type="email" value="@isset($userData->email){{ $userData->email }}@endisset" name="email" readonly/>
                            </div>

                            <div class="field">
                                <label>{{ __("Phone") }}</label>
                                <input id="phone" class="block mt-1 w-full" type="text" placeholder="01000-000000" maxlength="12" value="@isset($userData->phone){{ $userData->phone }}@endisset" name="phone" />
                            </div>

                        </div>


                        <p class="lead">&nbsp;&nbsp;Personal Information</p>
                        <hr>

                        <div class="two fields">

                            <div class="field">
                                <label>{{ __("First Name") }}</label>
                                <input id="first_name" class="block mt-1 w-full" type="text" value="@isset($userData->first_name){{ $userData->first_name }}@endisset" name="first_name" />
                            </div>

                            <div class="field">
                                <label>{{ __("Last Name") }}</label>
                                <input id="last_name" class="block mt-1 w-full" type="text" value="@isset($userData->last_name){{ $userData->last_name }}@endisset" name="last_name" />
                            </div>

                        </div>

                        <div class="two fields">

                            <div class="field">

                                <label>{{ __("Gender") }}</label>
                                <select id="gender" class="ui dropdown uppercase" name="gender">

                                    @if($userData->gender=="MALE")
                                    <option selected value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                    @elseif($userData->gender=="FEMALE")
                                    <option value="MALE">MALE</option>
                                    <option selected value="FEMALE">FEMALE</option>
                                    @else
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                    @endif

                                </select>
                            </div>

                            <div class="field">

                                <label>{{ __("Civil Status") }}</label>
                                <select id="civilstatus" class="ui dropdown uppercase" name="civilstatus">

                                    @if($userData->civilstatus=="SINGLE")
                                    <option selected value="SINGLE">SINGLE</option>
                                    <option value="MARRIED">MARRIED</option>
                                    <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    @elseif($userData->civilstatus=="MARRIED")
                                    <option value="SINGLE">SINGLE</option>
                                    <option selected value="MARRIED">MARRIED</option>
                                    <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    @elseif($userData->civilstatus=="LEGALLY SEPARATED")
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="MARRIED">MARRIED</option>
                                    <option selected value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    @else
                                    <option value="" disabled selected>Choose...</option>
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="MARRIED">MARRIED</option>
                                    <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    @endif

                                </select>

                            </div>

                        
                        </div>

                        <p class="lead">&nbsp;&nbsp;Address</p>
                        <hr>

                        <div class="two fields">

                            <div class="field">
                                <label>{{ __("Division") }}</label>
                                <input id="division" class="block mt-1 w-full" type="text" value="@isset($userData->division){{ $userData->division }}@endisset" name="division" />
                            
                                <!-- <select id="division" class="ui dropdown uppercase required" name="division" required>
                        <option value="">Select Division Name</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Barisal">Barisal</option>

 
                    </select> -->
                 </div>

                            <div class="field">
                                <label>{{ __("District") }}</label>
                                <input id="district" class="block mt-1 w-full" type="text" value="@isset($userData->district){{ $userData->district }}@endisset" name="district" />
                            </div>


                            <div class="field">
                            <label>{{ __("Thana") }}</label>
                            <input id="thana" class="block mt-1 w-full" type="text" value="@isset($userData->thana){{ $userData->thana }}@endisset" name="thana" />
                        </div>

                        </div>

                        <div class="two fields">

                        <div class="field">
                            <label>{{ __("Postal Code") }}</label>
                            <input id="postal_code" class="block mt-1 w-full" type="tel" placeholder="0100" pattern="[0-9]{4}" value="@isset($userData->postal_code){{ $userData->postal_code }}@endisset" name="postal_code" />
                        </div>

                        <div class="field">
                            <label>{{ __("Street") }}</label>
                            <input id="street" class="block mt-1 w-full" type="text" value="@isset($userData->street){{ $userData->street }}@endisset" name="street" />
                        </div>

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

                    <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                    <a href="{{ url('admin/users') }}" class="ui black grey small button"><i class="ui times icon"></i> {{ __("Cancel") }}</a>

                </div>
                </form>


            </div>
        </div>
    </div>

    <div class="col-md-4">



        <div class="row">

        <div class="col-md-2">


        </div>

        <div class="col-md-10">
            <div class="box box-success">

                <div class="box-body">

                <img src="/images/img/{{ $image }}" alt="Profile picture" class="rounded mx-auto d-block" style="width: 300px;height: 300px;">
            
                    <form id="edit_system_user_form" action="{{ url('manager/my_profile/upload_image') }}" class="ui form add-user" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                        @csrf
                        <div class="field">
                            <input id="id" class="block mt-1 w-full" type="text" value="@isset($userData->id){{ $userData->id }}@endisset" name="id" class="readonly" hidden />
                        </div>

                        <div class="field">
                            <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*"/>
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
                    <button class="ui positive approve small button" type="submit" name="submit"><i class="cloud upload icon"></i> {{ __("Upload") }}</button>
                </div>
                </form>

            </div>
        
</div>



        </div>






    </div>

</div>




</div>


@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        $('#edit_system_user_form').form({
            fields: {
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
                        prompt: 'Please Enter Division'
                    }]
                },
                district: {
                    identifier: 'district',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter District'
                    }]
                },
                thana: {
                    identifier: 'thana',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Thana'
                    }]
                },
                postal_code: {
                    identifier: 'postal_code',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Postal Code'
                    }]
                },
                street: {
                    identifier: 'street',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please Enter Street'
                    }]
                }
            }
        });

    });
</script>

@endsection