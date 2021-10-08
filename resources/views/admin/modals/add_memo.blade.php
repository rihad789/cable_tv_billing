<div class="ui modal medium add">
    <div class="header">{{ __("নতুন হিসাব") }}
        <button id="addRow" class="ui btn btn-primary mini offsettop5  float-right"><i class="ui icon plus"></i>{{ __("নতুন সারী যোগ করুন") }}</button>
    </div>
    <div class="content">
        <form id="add_new_calculation" action="{{ url('admin/memo/store') }}" class="ui form add-user" method="post" accept-charset="utf-8" style="overflow-y:scroll;height:400px;">
            @csrf

            <div class="two fields">

                <div class="field">
                    <label>মেমো নং</label>
                    <input type="text" name="memo_no" class="form-control" id="memo_no" placeholder="মেমো নং" autocapitalize="off">
                </div>



                <div class="field">
                <div class="sixteen wide field role">
                    <label for="">ক্রেতার নাম</label>
                    <select id="buyer_id" class="ui dropdown uppercase required" name="buyer_id" required>
                        <option value="">ক্রেতার নাম পছন্দ করুন</option>

                        @foreach ($userData as $val)
                        <option value={{ $val->id }}>{{ $val->first_name }} , {{ $val->last_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>


            </div>

            <div id="inputFormRow">

                <div class="two fields">

                    <div class="field">
                        <label>পন্যের নাম</label>
                        <input type="text" name="title[]" class="form-control" id="title" placeholder="পন্যের নাম" autocapitalize="off" required>
                    </div>

                    <div class="field">
                        <label>একক ইউনিট মূল্য</label>
                        <input name="single_unit_price[]" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="single_unit_price" placeholder="একক ইউনিট মূল্য" autocapitalize="off" required>
                    </div>

                    <div class="field">
                        <label>পন্যের সংখ্যা</label>
                        <input name="quantity[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="quantity" placeholder="পন্যের সংখ্যা" autocapitalize="off" required>
                    </div>

                    <div class="field">
                        <label>মোট টাকা</label>
                        <input name="total_amount[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="total_amount" placeholder="0" autocapitalize="off" required>
                    </div>

                </div>

                <hr>

            </div>

            <!-- Add New Row Here -->

            <div id="newRow"></div>
            <!-- <button id="addRow" type="button" class="btn btn-info">Add Row</button> -->

            <div class="two fields">

                <div class="field">
                    <label>মোট পন্য সংখ্যা </label>
                    <input name="products_total" class="form-control text-right" id="products_total" placeholder="মোট পন্য সংখ্যা" readonly>
                </div>


                <div class="field">
                    <label>সর্বমোট মূল্য </label>
                    <input name="grand_amount" class="form-control text-right" id="grand_amount" placeholder="সর্বমোট মূল্য" readonly>
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
        <button class="ui primary small button" type="button" onclick="getvalues();"><i class="calculator icon"></i> {{ __("Calculate Total") }}</button>

    </div>
    </form>
</div>