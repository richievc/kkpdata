<div class="col-md-4">
    <div class="list-group">
        <?php
            $sections = [
                'edit' => 'Background Information',
                'step2' => 'Staff Information',
                'step3' => 'Facility Information',
                'step4' => 'Security Threat Concerns',
                'step5' => 'Responders &amp; Jurisdictions',
                'step6' => 'Infrastructure',
                'step7' => 'Medical',
                'step8' => 'H.V.A.C System',
                'step9' => 'Emergency Power',
                'step10' => 'Janitorial',
                'step11' => 'Security Policies and Documentation',
                'step12' => 'Access Control and Visitors',
                'step13' => 'Security and Safety Reporting',
                'step14' => 'Workplace Violence Policy',
                'step15' => 'Security Operations',
                'step16' => 'Emergency Preparations',
                'step17' => 'Campus Geography'
            ];

            foreach($sections as $key => $name) {
               echo '<a href="' .url('kkpdata/' . $key . '/' . Request::segment(3)) . '" class="list-group-item">' . $name . '</a>';
            }

        ?>




    </div>
</div>