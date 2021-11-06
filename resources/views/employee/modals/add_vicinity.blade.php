<div class="ui modal medium edit">
    <div class="header">{{ __("New Vicinity Name") }}</div>
    <div class="content">
        <form id="add_vicinity_form" action="{{ url('employee/vicinity/add') }}" class="ui form edit-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="field">

                    <label for="">Area Name</label>
                    <select id="area_id" class="ui dropdown uppercase required" name="area_id" required>
                        <option value="">Select Area Name</option>

                        @foreach ($areasData as $val)
                        <option value={{ $val->id }}>{{ $val->area_name }}</option>
                        @endforeach

                    </select>

            </div>

            <div class="field">
                <label>Vicinity Name</label>
                <input type="text" name="vicinity_name" class="block mt-1 w-full" id="vicinity_name" placeholder="Vicinity Name">
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