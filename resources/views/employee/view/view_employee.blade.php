@extends('layouts.manager')

@section('meta')

<title>My Profile | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')

<div class="card">
    <div class="card-header py-3">
        <h6 class="mb-0">My Profile</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card border shadow-none w-100">
                    <div class="card-body">

                        <div class="row g-3">
                            <h6 class="mb-0">Profile Info</h6>
                            <hr>
                        </div>


                        <form class="row g-3" id="add_subscriber_form" action="{{ url('manager/employee/update') }}" method="post" accept-charset="utf-8">
                            @csrf

                            <input id="id" class="form-control" type="text" value="@isset($userData->id){{ $userData->id }}@endisset" name="id" class="readonly" required hidden />

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" value="@isset($userData->email){{ $userData->email }}@endisset" name="email" required  />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input id="phone" class="form-control" type="text" placeholder="01000-000000" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" pattern="[0-9]{11}" value="@isset($userData->phone){{ $userData->phone }}@endisset" name="phone" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input id="first_name" class="form-control" type="text" value="@isset($userData->first_name){{ $userData->first_name }}@endisset" name="first_name" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input id="last_name" class="form-control" type="text" value="@isset($userData->last_name){{ $userData->last_name }}@endisset" name="last_name" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select id="gender" class="form-select" name="gender" required>

                                    @isset($userData->gender)
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
                                    @endisset

                                </select>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Civil Status</label>
                                <select id="civilstatus" class="form-select" name="civilstatus" required>
                                    
                                @isset($userData->civilstatus)
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
                                    @endisset

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Division</label>
                                <input id="division" class="form-control" type="text" value="@isset($userData->division){{ $userData->division }}@endisset" name="division" required />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">District</label>
                                <input id="district" class="form-control" type="text" value="@isset($userData->district){{ $userData->district }}@endisset" name="district" required />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Thana</label>
                                <input id="thana" class="form-control" type="text" value="@isset($userData->thana){{ $userData->thana }}@endisset" name="thana" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input id="postal_code" class="form-control" type="tel" placeholder="0100" pattern="[0-9]{4}" value="@isset($userData->postal_code){{ $userData->postal_code }}@endisset" name="postal_code" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input id="street" class="form-control" type="text" value="@isset($userData->street){{ $userData->street }}@endisset" name="street" required />
                            </div>


                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update Profile Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>

@endsection
