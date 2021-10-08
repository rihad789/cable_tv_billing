<div class="ui modal medium add">
    <div class="header">{{ __("নতুন সিস্টেম ব্যবহারকারী যোগ করুন") }}</div>
    <div class="content">
        <form id="add_system_user_form" action="{{ url('admin/users/add') }}"  class="ui form add-user" autocomplete="off" method="post" accept-charset="utf-8">
            @csrf

            <div class="two fields">

                <div class="field">
                    <label>{{ __("নামের প্রথম অংশ") }}</label>
                    <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" />
                </div>

                <div class="field">
                    <label>{{ __("নামের শেষাংশ") }}</label>
                    <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" />
                </div>

            </div>

            <div class="field">
                <label>{{ __("ফোন নং") }}</label>
                <input id="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="phone" class="block mt-1 w-full" autocomplete="off">
            </div>

            
            <div class="fields">
                <div class="sixteen wide field role">
                    <label for="">{{ __("ব্যবহারকারীর ধরন") }}</label>
                    <select id="role_id" class="ui dropdown uppercase required" name="role_id" required>
                    <option value="">ব্যবহারকারীর ধরন পছন্দ করুন</option>
                    @foreach ($role_id as $val)
                        <option value={{ $val->name }}>{{ $val->display_name }}</option>
                        @endforeach


                    </select>
                </div>
            </div>


            <div class="field">
                <label for="">{{ __("পাসওয়ার্ড") }}</label>
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