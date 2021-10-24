<div class="ui modal medium add">
    <div class="header">{{ __("New Employee") }}</div>
    <div class="content">
        <form id="add_sallery" action="{{ url('owner/sallery/add') }}"  class="ui form add-user" autocomplete="off" method="post" accept-charset="utf-8">
            @csrf


            <div class="field">

                    <label for="">Employee Name</label>
                    <select id="employee_id" class="ui dropdown uppercase required" name="employee_id" required>
                        <option value="">Select Employee Name</option>

                        @foreach ($userData as $val)
                        <option value={{ $val->id }}>{{ $val->first_name }} , {{ $val->last_name }} , {{ $val->display_name }}</option>
                        @endforeach

                    </select>

            </div>

            <div class="field">
                <label>{{ __("Sallery Amount") }}</label>
                <input id="sallery" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="sallery" placeholder="Sallery Amount" class="block mt-1 w-full" autocomplete="off">
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

        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Add") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Close") }}</button>
    </div>
    </form>
</div>