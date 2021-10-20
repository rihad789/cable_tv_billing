<div class="ui modal medium add">
    <div class="header">{{ __("New System User") }}</div>
    <div class="content">
        <form id="add_system_user_form" action="{{ url('admin/users/add') }}"  class="ui form add-user" autocomplete="off" method="post" accept-charset="utf-8">
            @csrf

            <div class="two fields">

                <div class="field">
                    <label>{{ __("First Name") }}</label>
                    <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" />
                </div>

                <div class="field">
                    <label>{{ __("Last Name") }}</label>
                    <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" />
                </div>

            </div>

            <div class="field">
                <label>{{ __("Phone No") }}</label>
                <input id="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="phone" class="block mt-1 w-full" autocomplete="off">
            </div>

            
            <div class="fields">
                <div class="sixteen wide field role">
                    <label for="">{{ __("User Role") }}</label>
                    <select id="role_id" class="ui dropdown uppercase required" name="role_id" required>
                    <option value="">Select User Role</option>
                    @foreach ($role_id as $val)
                        <option value={{ $val->name }}>{{ $val->display_name }}</option>
                        @endforeach


                    </select>
                </div>
            </div>


            <div class="field">
                <label for="">{{ __("Password") }}</label>
                <input id="password" type="password" name="password" class="block mt-1 w-full">
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
    <div class="actions">

        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Register") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Cancel") }}</button>
    </div>
    </form>
</div>