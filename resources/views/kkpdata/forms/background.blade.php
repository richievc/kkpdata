<div class="container">
    <div class=""row>
        <div class="col-md-12">

            <form action="{{ url('kkpdata/process_' .
                          (!empty($property['id']) ? 'edit_' : '') . 'step1/' .
                          (!empty($property['id']) ? $property['id'] : '')) }}"
                  method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <input id="user_id" name="user_id" type="hidden" value="{{ $account['user_id'] }}">
                <input id="property_id" name="property_id" type="hidden" value="{{ $property['id'] }}">

                <fieldset>

                    <!-- Form Name -->
                    <legend>Step 1 - (Property Information)</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="property_name">Name of Property</label>
                        <div class="col-md-4">
                            <input id="property_name" name="property_name" type="text" value="{{@$property['property_name']}}" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">Address</label>
                        <div class="col-md-4">
                            <input id="address" name="address" type="text" value="{{ @$property['address'] }}"  class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address2">A2 (Optional)</label>
                        <div class="col-md-4">
                            <input id="address2" name="address2" type="text" value="{{ @$property['address2'] }}" class="form-control input-md ">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="city">City</label>
                        <div class="col-md-4">
                            <input id="city" name="city" type="text" value="{{ @$property['city'] }}"  class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="state">State</label>
                        <div class="col-md-4">
                            <input id="state" name="state" type="text" value="{{ @$property['state'] }}" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="postal">Postal/Zip Code</label>
                        <div class="col-md-4">
                            <input id="postal" name="postal" type="text" value="{{ @$property['postal'] }}" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">Phone</label>
                        <div class="col-md-4">
                            <input id="phone" name="phone" type="text" value="{{ @$property['phone'] }}" class="form-control input-md phone" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="website">Website</label>
                        <div class="col-md-4">
                            <input id="website" name="website" type="text" value="{{ @$property['website'] }}" class="form-control input-md">
                        </div>
                    </div>

                    <hr>
                    <h3>Manager Detail</h3>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="manager_name">Manager Name</label>
                        <div class="col-md-4">
                            <input id="manager_name" name="manager_name" type="text" value="{{ @$property['manager_name'] }}" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="manager_phone">Manager Phone</label>
                        <div class="col-md-4">
                            <input id="manager_phone" name="manager_phone" type="text" value="{{ @$property['manager_phone'] }}" class="form-control input-md phone" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="manager_email">Manager Email</label>
                        <div class="col-md-4">
                            <input id="manager_email" name="manager_email" type="text" value="{{ @$property['manager_email'] }}" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>

