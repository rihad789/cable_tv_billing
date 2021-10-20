<div class="ui modal medium add">
    <div class="header">{{ __("New Subscriber") }}</div> 
    <div class="content">
        <form id="add_subscriber_form" action="{{ url('admin/subscriber/store') }}" class="ui form add-user" method="post" accept-charset="utf-8">
            @csrf

            <div class="two fields">

                <div class="field">
                    <label>Subscriber Card No</label>
                    <input type="text" name="client_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="client_id" placeholder="Subscriber Card No">
                </div>

                <div class="field">
                    <label>Initialization Date</label>
                    <input type="date" name="initialization_date" class="form-control" id="initialization_date" placeholder="Initialization Date">
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    <label>Subscriber Name</label>
                    <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Subscriber Name">

                </div>

                <div class="field">
                    <label>Father's Name</label>
                    <input type="text" name="client_father" class="form-control" id="client_father" placeholder="Father's Name">
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    <label>Area Name</label>
                    <select id="area" class="ui dropdown uppercase required form-control" name="area" required>
                        <option value="">Select Area Nane</option>

                        @foreach ($areasData as $val)
                        <option value={{ $val->id }}>{{ $val->area_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="field">
                    <label>Vicinity Name</label>
                    <select id="vicinity" class="ui dropdown uppercase required form-control" name="vicinity" required>
                        <option value="">Select Vicinity Name</option>

                    </select>
                </div>

            </div>

            <div class="field">
                <label>Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Address">
            </div>

            <div class="two fields">

                <div class="field">
                    <label>Mobile No</label>
                    <input type="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" pattern="[0-9]{11}" name="mobile_no" class="form-control" id="mobile_no" placeholder="01952-820194">
                </div>

                <div class="field">
                    <label>Locked Fund</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  name="locked_fund" class="form-control" id="locked_fund" placeholder="Locked Fund">
                </div>

                <div class="field">
                    <label>Bill Amount</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  name="bill_amount" class="form-control" id="bill_amount" placeholder="Bill Amount">
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