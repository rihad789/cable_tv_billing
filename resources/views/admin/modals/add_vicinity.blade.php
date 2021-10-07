<div class="ui modal medium edit">
    <div class="header">{{ __("নতুন পাড়া যোগ করুন") }}</div>
    <div class="content">
        <form id="add_vicinity_form" action="{{ url('admin/vicinity/store') }}" class="ui form edit-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="field">
                <div class="sixteen wide field role">
                    <label for="">গ্রামের নাম</label>
                    <select id="area_id" class="ui dropdown uppercase required" name="area_id" required>
                        <option value="">গ্রামের নাম পছন্দ করুন</option>

                        @foreach ($areasData as $val)
                        <option value={{ $val->id }}>{{ $val->area_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="field">
                <label>পাড়ার নাম</label>
                <input type="text" name="vicinity_name" class="block mt-1 w-full" id="vicinity_name" placeholder="পাড়ার নাম">
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

        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Save") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Close") }}</button>
    </div>
    </form>
</div>