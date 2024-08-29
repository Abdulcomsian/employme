<div class="row">
        <input type="hidden" name="id" value="{{$plan->id}}">
        <div class="col-12">
            <div class="dash-input-wrapper mb-30">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Enter Your Name" value="{{$plan->name}}">
            </div>
        </div>
        <div class="col-12">
            <div class="dash-input-wrapper mb-30">
                <label for="">Amount</label>
                <input type="text" name="amount" placeholder="Enter Amount" value="{{$plan->price}}">
            </div>
        </div>
    </div>
</div>