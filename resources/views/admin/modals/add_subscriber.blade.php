<div class="ui modal medium add">
    <div class="header">{{ __("নতুন গ্রাহক") }}</div>
    <div class="content">
        <form id="add_subscriber_form" action="{{ url('admin/subscriber/store') }}" class="ui form add-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="two fields">

                <div class="field">
                    <label>গ্রাহকের কার্ড নং</label>
                    <input type="text" name="client_id" class="form-control" id="client_id" placeholder="গ্রাহকের কার্ড নং">
                </div>

                <div class="field">
                    <label>সংযোগের তারিখ</label>
                    <input type="date" name="initialization_date" class="form-control" id="initialization_date" placeholder="সংযোগের তারিখ">
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    <label>গ্রাহকের নাম</label>
                    <input type="text" name="client_name" class="form-control" id="client_name" placeholder="গ্রাহকের নাম">

                </div>

                <div class="field">
                    <label>গ্রাহকের পিতা</label>
                    <input type="text" name="client_father" class="form-control" id="client_father" placeholder="গ্রাহকের পিতার নাম">
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    <label>গ্রামের নাম</label>
                    <select id="area" class="ui dropdown uppercase required form-control" name="area" required>
                        <option value="">গ্রামের নাম পছন্দ করুন</option>

                        @foreach ($areasData as $val)
                        <option value={{ $val->id }}>{{ $val->area_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="field">
                    <label>পাড়ার নাম</label>
                    <select id="vicinity" class="ui dropdown uppercase required form-control" name="vicinity" required>
                        <option value="">পাড়ার নাম পছন্দ করুন</option>

                    </select>
                </div>

            </div>

            <div class="field">
                <label>ঠিকানা</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা">
            </div>

            <div class="two fields">

                <div class="field">
                    <label>মোবাইল নং( ইংরেজিতে )</label>
                    <input type="tel" pattern="[0-9]{11}" name="mobile_no" class="form-control" id="mobile_no" placeholder="01952-820194">
                </div>

                <div class="field">
                    <label>জামানত( ইংরেজিতে )</label>
                    <input type="number" name="locked_fund" class="form-control" id="locked_fund" placeholder="জামানত">
                </div>

                <div class="field">
                    <label>বিলের পরিমান ( ইংরেজিতে )</label>
                    <input type="number" name="bill_amount" class="form-control" id="bill_amount" placeholder="বিলের পরিমান">
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
    <div class="actions">

        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Save") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Close") }}</button>
    </div>
    </form>
</div>