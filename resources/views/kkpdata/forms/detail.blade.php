<div class="container">
    <div class=""row>
        <div class="col-md-12">

            <form action="{{ url('kkpdata/process_step2/' . $property['id']) }}"
                  method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <input id="property_id" name="user_id" type="hidden" value="{{ $property['id'] }}">

                <fieldset>

                    <!-- Form Name -->
                    <legend>Step 2 - (Property Detail)</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="num_of_units">Number of Units</label>
                        <div class="col-md-4">
                            <input id="num_of_units" name="num_of_units" type="number" value="{{@$property['num_of_units']}}" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="num_of_residents">Est. Number of Residents</label>
                        <div class="col-md-4">
                            <input id="num_of_residents" name="num_of_residents" type="number" value="{{@$property['num_of_residents']}}" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="excepts_hud">Hud/Section 8?</label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="excepts_hud-0">
                                <input type="radio" name="excepts_hud" id="excepts_hud-0" value="1"
                                        {{ (@$property['excepts_hud'] == 1 ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="excepts_hud-1">
                                <input type="radio" name="excepts_hud" id="excepts_hud-1" value="0"
                                        {{ (@$property['excepts_hud'] == 0 ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tax_credit">Tax Credit?  </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="tax_credit-0">
                                <input type="radio" name="tax_credit" id="tax_credit-0" value="1"
                                        {{ (@$property['tax_credit'] == 1 ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="tax_credit-1">
                                <input type="radio" name="tax_credit" id="tax_credit-1" value="0"
                                        {{ (@$property['tax_credit'] == 0 ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="turnover_rate">Resident Turnover Rate (%): </label>
                        <div class="col-md-4">
                            <input id="turnover_rate" name="turnover_rate" type="number" value="{{@$property['turnover_rate']}}" class="form-control input-md">
                        </div>
                    </div>



                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="rental_fee_start">Rental Fee Range ($ per month): </label>
                        <div class="col-md-2">
                            <input id="rental_fee_start"
                                   name="rental_fee_start"
                                   value="{{ @$property['rental_fee_start']}}"
                                   type="text"  class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input id="rental_fee_end"
                                   name="rental_fee_end"
                                   value="{{ @$property['rental_fee_end'] }}"
                                   type="text"  class="form-control">
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="demographic_composition">
                            Describe the general demographic composition of the resident community
                            (e.g., average age range, ethnicity, economic status, families, etc.):
                        </label>
                        <div class="col-md-4">
                            <textarea id="demographic_composition" name="demographic_composition"
                                      class="form-control">{{ @$property['demographic_composition'] }}</textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="num_of_residents">
                            What is the general level of unemployment in the resident community
                            (e.g., low, medium, high, etc.)?
                        </label>
                        <div class="col-md-4">
                            <input id="level_of_unemployment" name="level_of_unemployment"
                                   type="text" value="{{ @$property['level_of_unemployment'] }}"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="police_jurisdiction">
                            Police Jurisdiction
                        </label>
                        <div class="col-md-2">
                            <input id="police_jurisdiction" name="police_jurisdiction" type="text"
                                   value="{{ @$property['police_jurisdiction'] }}"
                                   class="form-control input-md">
                        </div>
                        <label class="col-md-2 control-label" for="district_zone">
                            District/Zone
                        </label>
                        <div class="col-md-2">
                            <input id="district_zone" name="district_zone" type="text"
                                   value="{{ @$property['district_zone'] }}"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="police_crime_prevention_officers">
                            If you have established relations with a Police Crime Prevention Officer, please provide name:
                            Separate each name with a comma (e.g.,  first officer, second officer)
                        </label>
                        <div class="col-md-4">
                            <textarea id="police_crime_prevention_officers" name="police_crime_prevention_officers"
                                      class="form-control">{{ @$property['police_crime_prevention_officers'] }}</textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="crime_free_housing_certification">
                            Please describe your property’s status or intentions regarding Crime Free
                            Housing certification.
                        </label>
                        <div class="col-md-4">
                            <select id="crime_free_housing_certification"
                                    name="crime_free_housing_certification"
                                    class="form-control">

                                <option value="">--SELECT AN OPTION--</option>
                                <option value="property_is_certified">Property is certified</option>
                                <option value="intend_to_obtain_certification">We intend to obtain certification </option>
                                <option value="no_present_intentions">No present intentions of certification</option>

                            </select>
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