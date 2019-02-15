<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropertyModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\Fpdf;

class AdminPDFController extends Controller
{


    public function BuildPDF(FPDF $fpdf, $id) {
        $data = PropertyModel::find($id);
       // dd($data);
        // We'll be outputting a PDF
        header("Cache-Control: no-cache, must-revalidate");    // HTTP/1.1
        header('Cache-Control: private, max-age=0, must-revalidate'); header('Pragma: public');
        header('Content-Type: application/pdf');

        $fpdf->AddPage();
        $fpdf->SetFont('helvetica','B',12);

        $fpdf->Cell(50, 25, ' Property Manager\'s Pre-Survey Information Questionnaire!');
        $fpdf->ln(20);

        $fpdf->SetFont('helvetica','',10);
        $pre = "The following questionnaire is prepared to assist our team in preparing for our upcoming security and ";
        $pre.= "environmental risk assessment at your property. The purpose of this questionnaire is to effectively familiarize";
        $pre.= "our team with your property and any unique concerns that may warrant special attention during our visit.  ";
        $fpdf->Write(5, $pre);

        $fpdf->ln(7);
        $pre2 = "Please answer each question completely. If you cannot complete this questionnaire in one session, please";
        $pre2.= "save before exiting your browser window. When you return and login again, your previously input informat";
        $pre2.= "ion will be saved and can be edited if necessary.";
        $fpdf->Write(5, $pre2);

        $fpdf->ln(7);
        $pre3 = "We also ask that you upload any additional information and documents as requested.";
        $fpdf->Write(5, $pre3);

        $fpdf->ln(7);
        $pre4 = "Please submit any questions regarding this questionnaire to: era@cisworldservices.org";
        $fpdf->Write(5, $pre4);

        $pre5 = "Thank you in advance for your cooperation.";
        $fpdf->Write(5, $pre5);

        $fpdf->ln(1);
        $fpdf->Cell(195, 10, ' ', 'B', 1, 'C', 0, '');
        $fpdf->SetTextColor(255,0,0);
        $fpdf->SetFont('helvetica','B',10);
        $fpdf->Cell(195, 10, 'CONFIDENTIALITY NOTICE', '', 1, 'C', 0, '');
        $fpdf->Cell(195, 5, 'This questionnaire is completed for use by legal counsel in preparation for potential future litigation.', '', 1, 'C', 0, '');
        $fpdf->Cell(195, 5, 'The information contained in this completed questionnaire is confidential and protected by the work-product rule.', '', 1, 'C', 0, '');
        $fpdf->ln(3);
        $fpdf->Cell(195, 5, ' ', 'T', 1, 'C', 0, '');

        /**********************************************************************
         * BACKGROUND SECTION
         */
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('helvetica','B',12);
        $fpdf->Cell(195, 10, 'Background Information', '', 1, 'L', 0, '');

        $fpdf->SetFont('helvetica','',10);

        $fpdf->Cell(50, 5, 'Property Name:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->property_name, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Street Address:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->address, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Address (Optional):', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->address2, '', 1, 'L', 0, '');

        $fpdf->Cell(10, 5, 'City:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->city, '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, 'State:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->state, '', 0, 'L', 0, '');
        $fpdf->Cell(30, 5, 'Zip/Postal Code:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->postal, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Property Manager:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->manager_name, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Property Manager Tel:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->manager_phone, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Property Manager Email:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->manager_email, '', 1, 'L', 0, '');
        $fpdf->ln(1);

        $fpdf->Cell(195, 4, ' ', 'T', 1, 'C', 0, '');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('helvetica','B',12);
        $fpdf->Cell(195, 10, 'Property Details', '', 1, 'L', 0, '');
        $fpdf->SetFont('helvetica','',10);


        $fpdf->Cell(40, 5, 'Total No. of Units:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, $data->num_of_units, 'B', 0, 'L', 0, '');
        $fpdf->Cell(40, 5, 'Est. No. of Residents:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, $data->num_of_residents, 'B', 1, 'L', 0, '');

        $fpdf->Cell(40, 5, 'HUD Section 8:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, ($data->excepts_hud == false ? 'No' : 'Yes'), 'B', 0, 'L', 0, '');
        $fpdf->Cell(40, 5, 'Tax Credit:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 7, ($data->tax_credit == false ? 'No' : 'Yes'), 'B', 1, 'L', 0, '');

        $fpdf->Cell(55, 5, 'Resident Turnover Rate (%):', '', 0, 'L', 0, '');
        $fpdf->Cell(30, 5, $data->turnover_rate . "%", 'B', 1, 'R', 0, '');

        $fpdf->Cell(60, 5, 'Rental Fee Range ($ per month):', '', 0, 'L', 0, '');
        $fpdf->Cell(20, 5, $data->rental_fee_start, 'B', 0, 'L', 0, '');
        $fpdf->Cell(5, 5, ' - ', ' ', 0, 'C', 0, '');
        $fpdf->Cell(20, 5, $data->rental_fee_end, 'B', 0, 'L', 0, '');

        $pdf5 = "Describe the general demographic composition of the resident community (e.g., average age range, ";
        $pdf5.= "ethnicity, economic status, families, etc.):";
        $fpdf->ln(8);
        $fpdf->Write(5, $pdf5);
        $fpdf->Cell(5, 5, '', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->demographic_composition, 'B', 1, 'L', 0, '');

        $pdf6 = "What is the general level of unemployment in the resident community (e.g., low, medium, high, etc.)?:";
        $fpdf->ln(1);
        $fpdf->Write(6, $pdf6);
        $fpdf->Cell(5, 5, '', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->level_of_unemployment, 'B', 1, 'L', 0, '');

        $fpdf->Cell(65, 6, 'Police Jurisdiction:', '', 0, 'L', 0, '');
        $fpdf->Cell(30, 6, $data->police_jurisdiction, 'B', 0, 'R', 0, '');
        $fpdf->Cell(60, 6, 'District Zone:', '', 0, 'L', 0, '');
        $fpdf->Cell(30, 6, $data->district_zone, 'B', 1, 'R', 0, '');

        $fpdf->Cell(165, 6, 'If you have established relations with a Police Crime Prevention Officer, please provide name:', '', 0, 'L', 0, '');
        $fpdf->Cell(30, 6, $data->police_crime_prevention_officers, 'B', 1, 'R', 0, '');

        $fpdf->Cell(195, 6, 'Please describe your property\'s status or intentions regarding Crime Free Housing certification:', '', 1, 'L', 0, '');
        $fpdf->Cell(3, 3, '', 1, 0, 'C', ($data->crime_free_housing_certification == "property_is_certified" ? 1 : 0), '');
        $fpdf->Cell(25, 4, 'Property is certified', 0, 1, 'L', 0, '');
        $fpdf->Cell(3, 3, '', 1, 0, 'C', ($data->crime_free_housing_certification == "intend_to_obtain_certification" ? 1 : 0), '');
        $fpdf->Cell(25, 4, 'We intend to obtain certification', 0, 1, 'L', 0, '');
        $fpdf->Cell(3, 3, '', 1, 0, 'C', ($data->crime_free_housing_certification == "no_present_intentions" ? 1 : 0), '');
        $fpdf->Cell(25, 4, 'No present intentions of certification', 0, 1, 'L', 0, '');


        /**********************************************************************
         * ENVIRONMENTAL SECTION
         */
        $fpdf->Cell(195, 2, ' ', 'B', 1, 'C', 0, '');
        $fpdf->ln(3);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('helvetica','B',12);
        $fpdf->Cell(195, 10, 'Environmental Risk Concerns', '', 1, 'L', 0, '');
        $fpdf->SetFont('helvetica','',10);


        $pdf7 = 'Have there been any recent incidents (180 days) of assault or burglary reported by residents that have not been reported to police?';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(6);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->incidents_not_reported == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->incidents_not_reported == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');
        $fpdf->AddPage();

        $pdf7 = 'Have there been any complaints by residents of violent sexual encounters or harassment of women in the environment? ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(2);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->violent_sexual_encounters == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->violent_sexual_encounters == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Do residents report the majority of crimes committed on-property to police or do they seem resistant about reporting directly to police (rather, preferring to complain to management or amongst themselves)?   ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_majority_of_crimes == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_majority_of_crimes == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Have residents complained about open use of drugs or alcohol on property?';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_drugs == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_drugs == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Have there been any complaints by residents or evidence of high volumes of male traffic in apartments occupied by single females?';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_high_male_traffic == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->reports_high_male_traffic == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Has there been a history of stolen cars being "dropped" on the property? ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->history_of_stolen_cars == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->history_of_stolen_cars == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Do pizza drivers deliver to the property at night?  ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->pizza_deliveries == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->pizza_deliveries == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Do taxi drivers take pick-ups on the property at night?  ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->taxi_services_nights == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->taxi_services_nights == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Do tow trucks come to property at night?';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->tow_trucks == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->tow_trucks == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');

        $fpdf->ln(7);
        $pdf7 = 'Are there any known gangs operating on-property or in the local neighborhood?';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(7);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->known_gangs_on_property == false ? 0 : 1), '');
        $fpdf->Cell(7, 4, 'Yes', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 0, 0, 'C', 0, '');
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->known_gangs_on_property == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, '', 0, 0, 'C', 0, '');
        $fpdf->Cell(35, 4, 'If YES, what gang(s)?  ', '', 0, 'L', 0, '');
        $fpdf->Cell(3, 3, '', 0, 0, 'C', 0, '');
        $fpdf->Cell(75, 4, $data->gangs_name, "B", 1, 'L', 0, '');


        $fpdf->ln(7);
        $pdf7 = 'Have there been any reports or observations of suspicious activity associated with specific apartments? Suspicious activity including:
    	
    	* High volume of traffic in and out of the apartment
    * Youth hanging out in front (often with cell phones or radios)
    * Darkened or blocked windows
    * Signs of reinforced doors and windows
    * Unusual smells
    * Changed locks (without management approval)
    * Persistently "burned-out" or broken light bulbs 
        ';
        $fpdf->Write(5, $pdf7);
        $fpdf->ln(4);
        $fpdf->Cell(3, 3, ' ', 1, 0, 'C', ($data->five_crime_concerns == true? 0 : 1), '');
        $fpdf->Cell(7, 4, 'No', '', 0, 'C', 0, '');
        $fpdf->Cell(3, 3, '', 0, 0, 'C', 0, '');
        $fpdf->Cell(35, 4, 'If YES, what unit(s)?  ', '', 0, 'L', 0, '');
        $fpdf->Cell(3, 3, '', 0, 0, 'C', 0, '');




        $fpdf->Output();exit();
    }
	
	


































	
}