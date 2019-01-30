<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Environmental Risk Concerns</h4>

            <form action="{{ url('kkpdata/process_step3/' . $property['id']) }}"
                  method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <input id="property_id" name="user_id" type="hidden" value="{{ $property['id'] }}">

                <fieldset>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="incidents_not_reported">
                            Have there been any recent incidents (180 days) of assault or burglary reported by
                            residents that have not been reported to police?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="incidents_not_reported-0">
                                <input type="radio" name="public_address_system" id="incidents_not_reported-0" value="1"
                                    {{ ($property['incidents_not_reported'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="incidents_not_reported-1">
                                <input type="radio" name="incidents_not_reported" id="incidents_not_reported-1" value="0"
                                    {{ ($property['incidents_not_reported'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="violent_sexual_encounters">
                            Have there been any complaints by residents of violent sexual encounters
                            or harassment of women in the environment?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="violent_sexual_encounters-0">
                                <input type="radio" name="violent_sexual_encounters" id="violent_sexual_encounters-0" value="1"
                                    {{ ($property['violent_sexual_encounters'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="violent_sexual_encounters-1">
                                <input type="radio" name="violent_sexual_encounters" id="violent_sexual_encounters-1" value="0"
                                    {{($property['violent_sexual_encounters'] == '0' ? 'checked' : '')}}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="residents_report_majority_crimes">
                            Dose residents report the majority of crimes committed on-property to police or
                            do they seem resistant about reporting directly to police
                            (rather, preferring to complain to management or amongst themselves)?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="residents_report_majority_crimes-0">
                                <input type="radio"
                                       name="residents_report_majority_crimes"
                                       id="residents_report_majority_crimes-0"
                                       value="reported_to_police"
                                        {{ ($property['residents_report_majority_crimes'] == 'reported_to_police' ? 'checked' : '') }}>
                                Usually reported to police
                            </label><br>
                            <label class="checkbox-inline" for="residents_report_majority_crimes-1">
                                <input type="radio"
                                       name="residents_report_majority_crimes"
                                       id="residents_report_majority_crimes-1"
                                       value="reported_sometimes_police"
                                        {{ ($property['residents_report_majority_crimes'] == 'reported_sometimes_police' ? 'checked' : '') }}>
                                Sometimes not reported to police
                            </label><br>
                            <label class="checkbox-inline" for="residents_report_majority_crimes-2">
                                <input type="radio"
                                       name="residents_report_majority_crimes"
                                       id="residents_report_majority_crimes-2"
                                       value="reported_frequently_police"
                                        {{ ($property['residents_report_majority_crimes'] == 'reported_frequently_police' ? 'checked' : '') }}>
                                Frequently not reported to police
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="reports_suspicious_behavior">
                            Do residents report community rule violations and suspicious behavior to property
                            management?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="reports_suspicious_behavior-0">
                                <input type="radio" name="reports_suspicious_behavior"
                                       id="reports_suspicious_behavior-0"
                                       value="1"
                                    {{ ($property['reports_suspicious_behavior'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="reports_suspicious_behavior-1">
                                <input type="radio" name="reports_suspicious_behavior"
                                       id="reports_suspicious_behavior-1" value="0"
                                       {{ ($property['reports_suspicious_behavior'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="reports_drugs">
                            Have residents complained about open use of drugs or alcohol on property?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="reports_drugs-0">
                                <input type="radio" name="reports_drugs"
                                       id="reports_drugs-0"
                                       value="1"
                                        {{ ($property['reports_drugs'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="reports_drugs-1">
                                <input type="radio" name="reports_drugs"
                                       id="reports_drugs-1" value="0"
                                       {{ ($property['reports_drugs'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="reports_high_male_traffic">
                            Have there been any complaints by residents or evidence of high volumes of male traffic in '
                            apartments occupied by single females?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="reports_high_male_traffic-0">
                                <input type="radio" name="reports_high_male_traffic"
                                       id="reports_high_male_traffic-0"
                                       value="1"
                                       {{ ($property['reports_high_male_traffic'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="reports_high_male_traffic-1">
                                <input type="radio" name="reports_high_male_traffic"
                                       id="reports_high_male_traffic-1" value="0"
                                       {{ ($property['reports_high_male_traffic'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="history_of_stolen_cars">
                            Has there been a history of stolen cars being “dropped”
                            on the property?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="history_of_stolen_cars-0">
                                <input type="radio" name="history_of_stolen_cars"
                                       id="history_of_stolen_cars-0"
                                       value="1"
                                        {{ ($property['history_of_stolen_cars'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="history_of_stolen_cars-1">
                                <input type="radio" name="history_of_stolen_cars"
                                       id="history_of_stolen_cars-1" value="0"
                                        {{ ($property['reports_high_male_traffic'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pizza_deliveries">
                            Do pizza drivers deliver to the property at night?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="pizza_deliveries-0">
                                <input type="radio" name="pizza_deliveries"
                                       id="pizza_deliveries-0"
                                       value="1"
                                        {{ ($property['pizza_deliveries'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="pizza_deliveries-1">
                                <input type="radio" name="pizza_deliveries"
                                       id="pizza_deliveries-1" value="0"
                                       {{ ($property['pizza_deliveries'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="taxi_services_nights">
                            Do taxi drivers take pick-ups on the property at night?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="taxi_services_nights-0">
                                <input type="radio" name="taxi_services_nights"
                                       id="taxi_services_nights-0"
                                       value="1"
                                       {{ ($property['taxi_services_nights'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="taxi_services_nights-1">
                                <input type="radio" name="taxi_services_nights"
                                       id="taxi_services_nights-1" value="0"
                                       {{ ($property['taxi_services_nights'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tow_trucks">
                            Do tow trucks come to property at night?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="tow_trucks-0">
                                <input type="radio" name="tow_trucks"
                                       id="tow_trucks-0"
                                       value="1"
                                        {{ ($property['tow_trucks'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="tow_trucks-1">
                                <input type="radio" name="tow_trucks"
                                    id="tow_trucks-1" value="0"
                                    {{ ($property['tow_trucks'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="known_gangs_on_property">
                            Are there any known gangs operating on-property
                            or in the local neighborhood?
                        </label>
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="known_gangs_on_property-0">
                                <input type="radio" name="known_gangs_on_property"
                                       id="known_gangs_on_property-0"
                                       value="1"
                                        {{ ($property['known_gangs_on_property'] == '1' ? 'checked' : '') }}>
                                Yes
                            </label>
                            <label class="checkbox-inline" for="known_gangs_on_property-1">
                                <input type="radio" name="known_gangs_on_property"
                                       id="known_gangs_on_property-1" value="0"
                                        {{ ($property['known_gangs_on_property'] == '0' ? 'checked' : '') }}>
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gangs_name">Gang Name: </label>
                        <div class="col-md-4">
                            <input id="gangs_name" name="gangs_name"
                                   value="{{ @$property['gangs_name'] }}"
                                   type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="apartment_suspicious_activity">
                            Have there been any reports or observations of
                            suspicious activity associated with specific apartments?
                            Suspicious activity including
                        </label>
                        <div class="col-md-4">

                            <select id="apartment_suspicious_activity"
                                    name="apartment_suspicious_activity"
                                    class="form-control">

                                <option value="">--SELECT A OPTION--</option>
                                <option value="high_value_traffic">High volume of traffic in and out of the apartment</option>
                                <option value="youth_hanging_out">Youth hanging out in front (often with cell phones or radios)</option>
                                <option value="signs_of_reinforced">Signs of reinforced doors and windows</option>
                                <option value="unusual_smells">Unusual smells</option>
                                <option value="changed_locks">Changed locks (without management approval)</option>
                                <option value="broken_light_bulbs">Persistently "burned-out" or broken light bulbs </option>

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