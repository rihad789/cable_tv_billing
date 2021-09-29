<div class="ui modal medium edit">
    <div class="header">{{ __("নতুন পাড়া যোগ করুন") }}</div>
    <div class="content">
        <form id="edit_biil_form" action="{{ url('admin/billing/update') }}" class="ui form edit-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="field">
                    <label for="">গ্রাহকের আইডি</label>
                    <input name="client_id" id="client_id" list="clients" autocomplete="off" placeholder="গ্রাহকের আইডি">
                    <div list="clients">
                        @foreach ($subscribersData as $val)
                        <span>{{ $val->client_id }}</span>
                        @endforeach
                    </div>
            </div>

            <div class="field">
                <label>বিলিং স্ট্যাটাস</label>
                <select id="billing_status" class="ui dropdown uppercase required" name="billing_status" required>
                    <option value="">স্ট্যাটাস পরিবর্তন করুন</option>
                    <option value="1">Paid</option>
                    <option value="0">Unpaid</option>
                </select>
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