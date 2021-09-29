<div class="ui modal medium add">
    <div class="header">{{ __("নতুন এরিয়া যোগ করুন") }}</div>
    <div class="content">
        <form id="add_area_form" action="{{ url('admin/area/store') }}" class="ui form add-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="field">
                <label>এরিয়ার নাম</label>
                <input type="text" name="area_name" class="block mt-1 w-full" id="area_name" placeholder="এরিয়ার নাম">
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