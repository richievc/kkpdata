<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KKPDataModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\FPDF;

class PDFController extends Controller
{

	
	public function BuildPDF(FPDF $fpdf, $id) {
		$data = KKPDataModel::find($id);
		
		// We'll be outputting a PDF
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past
		header('Content-Type: application/pdf');
		$fpdf->AddPage();
		
		$fpdf->Image('images/flbluelogo.png', 75, 10, 70);
		
		// TITLE
		$fpdf->ln(25);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 4, "PRE-SURVEY SECURITY QUESTIONNAIRE", '', 1, 'C', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		// END TITLE
		
		$fpdf->SetTextColor(0,0,0);
		$fpdf->SetFont('helvetica','',10);
		
		$pre = "The following questionnaire is prepared to assist our security team in preparing for our upcoming security and emergency";
		$pre.= "readiness assessment at your facility. The purpose of this questionnaire is to effectively familiarize our team with the assets";
		$pre.= "and operations at your facility and any unique concerns you may have that may warrant special attention during our visit.";
		$fpdf->Write(4, $pre);
		
		$fpdf->ln(7);
		$pre = "Please answer each question completely. If you cannot complete this questionnaire in one session, please save before";
		$pre.= "exiting your browser window. When you return and login again, your previously input information will be saved and can";
		$pre.= "be edited if necessary";
		$fpdf->Write(4, $pre);
		
		$fpdf->ln(7);
		$pre = "We also encourage you to upload any additional information as described you believe would be helpful to our team in best";
		$pre.= "understanding the operations and infrastructure at your location. Please submit all questions or addendum information to:";
		$pre.= "cgundry@cisworldervices.org.";
		$fpdf->Write(4, $pre);
		
		$fpdf->ln(7);
		$pre = "Thank you in advance for your cooperation.";
		$fpdf->Cell(195, 4, $pre, '', 1, 'L', 0, '');
		$fpdf->Cell(195, 4, '', 'B', 1, 'L', 0, '');
		
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Background Information", '', 1, 'L', 0, '');
		
		$fpdf->SetFont('helvetica','',10);
		$fpdf->ln(3);		
		$fpdf->Cell(45, 6, "Name of Facility", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, $data->facility, 'B', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, "Main Phone", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, $data->main_phone, 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(45, 6, "Your Name", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, $data->your_name, 'B', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, "Your Title", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, $data->your_titke, 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(45, 6, "Your Tel. No: Desk: ", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, $data->your_phone, 'B', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, "Cell ", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, '', 'B', 1, 'L', 0, '');
		
		$fpdf->ln(3);		
		$fpdf->Cell(195, 6, 'Will you be our Point of Contact and on-site facilitator during our visit? ' . ($data->is_point_of_contact === true ? 'Yes' : 'No'), '', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If NO, who will be the assigned as our on-site contact? " . $data->point_of_contact_name, '', 1, 'L', 0, '');
		
		
		$fpdf->AddPage();
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Staff Information", '', 1, '', 0, '');
		
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		$fpdf->Cell(195, 4, 'Who has primary responsibility for security planning and management at the facility?', '', 1, '', 0, '');
		$fpdf->Write(4, $data->manager);
		
		$fpdf->ln(8);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Facility Staff", '', 1, '', 0, '');
		
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		
		$fpdf->Cell(50, 6, "Facility Director: ", '', 0, 'L', 0, '');
		$fpdf->Cell(135, 6, $data->director, 'B', 1, 'L', 0, '');
		$fpdf->Cell(50, 6, "Building Operations Manager: ", '', 0, 'L', 0, '');
		$fpdf->Cell(135, 6, $data->operation_manager, 'B', 1, 'L', 0, '');
		$fpdf->Cell(50, 6, "HR Director/Manager: ", '', 0, 'L', 0, '');
		$fpdf->Cell(145, 6, $data->hr_manager, 'B', 1, 'L', 0, '');
		
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Facility Information", '', 1, '', 0, '');
		
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		
		$fpdf->Cell(145, 6, "What type of operations are conducted at this facility? : ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->type_of_operation, 'B', 1, 'L', 0, '');
		$fpdf->Cell(135, 6, "Please describe your business hours and any shift activity: ", '', 0, 'L', 0, '');
		$fpdf->Cell(60, 6, $data->business_hrs, 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(145, 6, "Describe the assets of greatest concern at the facility from your perspective: ", '', 1, 'L', 0, '');
		$fpdf->Write(4, $data->assets_of_greatest_concern);
		
		$fpdf->ln(8);
		$fpdf->Cell(145, 6, "How many employees are in the facility (and at what times of the day)?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->employee_schedules, 'B', 1, 'L', 0, '');
		$fpdf->Cell(145, 6, "Is there a pharmacy located on-site?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, ($data->pharmacy_onsite === true ? "Yes" : "No"), 'B', 1, 'L', 0, '');

		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Security Threat Concerns", '', 1, '', 0, '');
		
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		
		$fpdf->Cell(145, 6, "Describe any recent history of the following problems: ", '', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(20, 6, "Trespass: ", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, $data->trespass_concerns, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(20, 6, "Vandalism: ", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, $data->vandalism_concerns, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(20, 6, "Theft: ", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, $data->theft_concerns, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(55, 6, "Threats and Threatening Employee/Patron Behavior: ", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, $data->threatening_employee, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(20, 6, "Violence: ", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, $data->violence, 'B', 1, 'L', 0, '');
		
		$fpdf->ln(4);
		$fpdf->Cell(195, 6, "Please describe any special concerns you may have related to security or emergency readiness at your facility: ", '', 1, 'L', 0, '');
		$fpdf->Cell(4, $data->special_concerns);
		$fpdf->ln(5);
		$fpdf->Cell(195, 1, "", 'B', 1, '', 0, '');
		
		$fpdf->ln(8);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 6, "Local Emergency Responders and Jurisdictions", '', 1, '', 0, '');
		
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		
		$fpdf->Cell(90, 6, "What police jurisdiction is the facility located?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(95, 6, $data->police_jurisdiction, 'B', 1, 'L', 0, '');
		$fpdf->Cell(120, 6, "What has been the local police response time in previous emergencies?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(65, 6, $data->local_police_response_time, 'B', 1, 'L', 0, '');
		$fpdf->Cell(100, 6, "What is the local ambulance/EMS service in the jurisdiction?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(95, 6, $data->local_ambulance_jurisdiction, 'B', 1, 'L', 0, '');
		
		// LINE
		$fpdf->Cell(195, 4, '', 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 4, "Infrastructure", '', 1, '', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		// END TITLE
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 4, "PA System", '', 1, '', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		// END TITLE
		
		$fpdf->Cell(100, 6, "What type of Public Address system does the facility employ?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(95, 6, $data->public_address_system, 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B',12);
		$fpdf->Cell(195, 4, "Access Control", '', 1, '', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','',10);
		// END TITLE
		
		$fpdf->Cell(100, 6, "Does the facility employ electronic access control?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(95, 6, ($data->employ_electronic_access_control == 0 ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(100, 6, "If YES, what type of system: ", '', 0, 'L', 0, '');
		$fpdf->Cell(85, 6, $data->type_of_system, 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->SetFont('helvetica','',9);
		$fpdf->Cell(185, 6, "If YES, how is system enrollment (card issue, biometric enrollment) managed and who is responsible for administration?: ", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','',10);
		$fpdf->Cell(10, 6, " ", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, $data->system_enrollment, 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Alarm System", '', 1, '', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->Cell(195, 6, "How are alarm systems used at the facility?: ", '', 1, 'L', 0, '');
		$fpdf->Write(4, $data->alarm_systems);
		$fpdf->ln(6);
		
		$fpdf->Cell(195, 6, "How is the alarm system monitored and how are intrusions assessed and responded?: ", '', 1, 'L', 0, '');
		$fpdf->Write(4, $data->alarm_system_monitored);
		
		$fpdf->ln(6);
		$fpdf->Cell(145, 6, "If Police respond, have there been any previous penalties owing to false alarms?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->penalties_to_false_alarms, 'B', 1, 'L', 0, '');
		$fpdf->Cell(145, 6, "What has been the history of false/nuisance alarms?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->history_of_nuisance, 'B', 1, 'L', 0, '');
		$fpdf->Cell(145, 6, "Does the facility have any panic alarms?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->has_panic_alarms, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(135, 6, "If YES, who exactly is contacted and what happens when a panic alarm is activated?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, $data->panic_alarm_activated, 'B', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, how are panic alarms investigated and responded?: ", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Write(4, $data->panic_alarm_investigated);
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "CCTV", '', 1, '', 0, '');
		$fpdf->ln(3);
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->Cell(195, 6, "How is the on-site CCTV system monitored?: ", '', 1, 'L', 0, '');
		$fpdf->Write(4, $data->onsite_cctv);
		$fpdf->ln(7);
		$fpdf->Cell(195, 6, "Where is the DVR system and monitors located? : ", '', 1, 'L', 0, '');
		$fpdf->Write(4, $data->where_monitors_located);
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Medical", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->Cell(155, 6, "Does the facility have a medical clinic or staff on-site?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(40, 6, ($data->has_medical_clinic === false ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(145, 6, "If YES, what type of facilities, equipment, and staff are on-site?: ", '', 1, '', 0, '');
		$fpdf->write(4, $data->medical_clinic_description);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(145, 6, "If YES, do medical staff possess training/qualifications in emergency trauma response?: ", '', 1, '', 0, '');
		$fpdf->write(4, $data->medical_staff_trained);
		
		$fpdf->ln(5);
		$fpdf->Cell(145, 6, "Where are the facility's emergency medical kits located?: ", '', 1, '', 0, '');
		$fpdf->write(4, $data->emergency_medical_kits_located);
		
		$fpdf->ln(5);
		$fpdf->Cell(145, 6, "Where are the facility's AEDs located? : ", '', 1, '', 0, '');
		$fpdf->write(4, $data->aeds_located);
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "HVAC System", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(4);
		$fpdf->Cell(195, 4, "Who is trained/capable of shutting-down the HVAC system in buildings during shelter-in-place emergencies? ", '', 1, '', 0, '');
		$fpdf->write(4, $data->trained_hvac_system_employees);
		
		$fpdf->ln(4);
		$fpdf->Cell(195, 4, "How is the system HVAC system shut down during shelter-in-place emergencies?: ", '', 1, '', 0, '');
		$fpdf->write(4, $data->hvac_system_shutdown);
		
		$fpdf->ln(4);
		$fpdf->Cell(195, 4, "Where are the HVAC controls located in facility buildings?: ", '', 1, '', 0, '');
		$fpdf->write(4, $data->hvac_controls_located);
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Emergency Power", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(5);
		$fpdf->Cell(155, 6, "Does the facility have an emergency power generator?: ", '', 0, '', 0, '');
		$fpdf->Cell(40, 6, ($data->facility_emergency_power_generator === FALSE ? "No" : "Yes"), 'B', 1, '', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(125, 6, "If YES, what systems are powered by the emergency power generator?: ", '', 0, '', 0, '');
		$fpdf->Cell(60, 6, $data->facility_emergency_power_by_generator, 'B', 1, 'B', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(125, 6, "If YES, how is the emergency power generator fueled?: ", '', 0, '', 0, '');
		$fpdf->Cell(60, 6, $data->power_generator_fueled, 'B', 1, 'B', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(125, 6, "If YES, how/when are backup power systems tested under load: ", '', 0, '', 0, '');
		$fpdf->Cell(60, 6, $data->backup_power_systems_tested, 'B', 1, 'B', 0, '');
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Janitorial", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->Cell(145, 6, "What type of janitorial service is used?", '', 0, '', 0, '');
		$fpdf->Cell(50, 6, $data->janitorial_service, 'B', 1, 'B', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(125, 6, "If contract, what company is used?: ", '', 0, '', 0, '');
		$fpdf->Cell(60, 6, $data->contracted_janitorial_service, 'B', 1, 'B', 0, '');
		
		// TITLE
		$fpdf->ln(10);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Security Policies and Documentation", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Pre-Employment Screening and HR Practices", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(5);
		$fpdf->Cell(155, 6, "Are employees subjected to background checks as part of the employment process?: ", '', 0, 'L', 0, '');
		$fpdf->Cell(40, 6, ($data->employees_subjected_to_background_checks === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(5);
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If SOME, please describe any employees that are not subjected to background checks?", '', 1, 'L', 0, '');
		$fpdf->ln(3);
		$fpdf->write(4, $data->describe_estbc);
		$fpdf->ln(3);
		$fpdf->Cell(195, 2, "", 'B', 1, 'L', 0, '');
		
		$fpdf->ln(5);
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(155, 6, "If YES, do background checks include criminal history? ", '', 0, 'L', 0, '');
		$fpdf->Cell(30, 6, ($data->employees_criminal_history === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(155, 6, "If YES, do background checks include previous employer verifications?", '', 0, 'L', 0, '');
		$fpdf->Cell(30, 6, ($data->previous_employer_verifications === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(3);
		$fpdf->write(4, "Does the facility have written guidelines for terminating employees who have demonstrated aggressive behavior or indicators of potential violence?");
		$fpdf->Cell(5, 4, "", '', 0, 'L', 0, '');
		$fpdf->Cell(30, 4, ($data->guidelines_for_termination === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(3);
		$fpdf->Cell(155, 6, "If YES, Is a copy uploaded for our review?", '', 0, 'L', 0, '');
		$fpdf->Cell(40, 4, (!empty($data->guidelines_for_termination_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Access Control and Visitors", '', 1, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->Cell(155, 6, "Does the facility have a written access control and visitor policy addressing the following:", '', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(45, 6, "Visitor Procedures?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_visitor_procedures === FALSE ? "No" : "Yes"), 'B', 1, '', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(45, 6, "Employee Access?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_employee_access === FALSE ? "No" : "Yes"), 'B', 0, '', 0, '');
		$fpdf->Cell(5, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(75, 6, "If YES, Is a copy uploaded for our review?", '', 0, 'L', 0, '');
		$fpdf->Cell(50, 6, (!empty($data->employee_access_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(3);
		$fpdf->Cell(10, 6, "", '', 0, '', 0, '');
		$fpdf->Cell(55, 6, "Contractor Access and Control?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_contractor_access === FALSE ? "No" : "Yes"), 'B', 0, '', 0, '');
		$fpdf->Cell(75, 6, "If YES, Is a copy uploaded for our review?", '', 0, 'L', 0, '');
		$fpdf->Cell(45, 6, (!empty($data->contractor_access_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(5);
		$fpdf->write(5, "Is there a written policy defining access control system administration, user enrollment, and user restrictions for electronic access control systems?");
		$fpdf->Cell(5, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, ($data->has_electronic_access_control_systems === FALSE ? "No" : "Yes"), 'B', 0, 'L', 0, '');
		$fpdf->Cell(75, 6, "If YES, Is a copy uploaded for our review?", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, (!empty($data->electronic_access_control_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		$fpdf->ln(3);
		$fpdf->Cell(60, 6, "Is there a written key control policy? ", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_written_key_control_policy === FALSE ? "No" : "Yes"), 'B', 0, 'L', 0, '');
		$fpdf->Cell(75, 6, "If YES, Is a copy uploaded for our review?", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, (!empty($data->written_key_control_policy_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(95, 6, "Who is designated as the facility key control manager?", '', 0, '', 0, '');
		$fpdf->Cell(90, 6, $data->facility_key_control_manager, 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Security and Safety Reporting", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(4);
		$fpdf->Cell(185, 6, "Does the facility have a system for formally documenting security and safety incidents?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_formally_documenting_security === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(175, 6, "If YES, how is the information documented and stored?", '', 0, '', 0, '');
		$fpdf->Cell(20, 6, $data->formally_documented_stored, 'B', 1, 'L', 0, '');
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Workplace Violence Policy", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(4);
		$fpdf->Cell(185, 6, "Does the facility have a written policy regarding reporting of threatening behavior?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_threatening_behavior_policy === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, how is the information documented and stored?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, (!empty($data->threatening_behavior_policy_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(185, 6, "Does the facility have a written threat assessment and management plan?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_assessment_and_management_plan === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, how is the information documented and stored?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, (!empty($data->assessment_and_management_plan_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		$fpdf->Cell(195, 3, "", 'B', 1, '', 0, '');
		
		$fpdf->AddPage();
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Security Operations", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		$fpdf->ln(5);
		$fpdf->Cell(185, 6, "Does the facility have an on-site security force?  ", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_on_site_security_force === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, how many and what are the shift hours?  ", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->on_site_security_force_shift);
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, what are the functions/duties of officers?", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->duties_of_officers);
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, how are officers notified and dispatched during emergencies", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->dispatched_during_emergencies);
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, "If YES, rate the level of confidence management has in officers on a scale of 1-10 (High): ", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, $data->level_of_confidence_management, 'B', 1, 'L', 0, '');
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(165, 6, "If YES, rate the level of confidence employees have in officers on a scale of 1-10 (High):", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(10, 6, $data->level_of_confidence_employees, 'B', 1, 'L', 0, '');
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "Please describe any specific concerns you have about your current security officer force:", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->specific_concerns_security_force);
		$fpdf->ln(3);
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, who is in direct charge of the officer deployment? ", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->in_charge_officer_deployment);
		$fpdf->ln(3);

		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Emergency Preparations", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		
		$fpdf->ln(5);
		$fpdf->Cell(185, 6, "Does the facility have an Emergency Response/Management Plan? ", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, ($data->has_emergency_response_management_plan === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->Cell(185, 6, "If YES, who is responsible for authoring and updating the EMP?", '', 1, 'L', 0, '');
		$fpdf->Cell(10, 6, "", '', 0, 'L', 0, '');
		$fpdf->write(5, $data->responsible_for_authoring_employees);
		$fpdf->ln(3);
		$fpdf->Cell(185, 6, "If YES, how is the information documented and stored?", '', 0, '', 0, '');
		$fpdf->Cell(10, 6, (!empty($data->responsible_for_authoring_employees_file) ? "Yes" : "No"), 'B', 1, 'L', 0, '');
		
		
		$fpdf->SetFont('helvetica','', 9);
		$fpdf->Cell(185, 6, "Does the facility have a Floor Captain/Warden system for providing employee and visitor actions during emergencies?", '', 0, '', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		$fpdf->Cell(10, 6, ($data->has_floor_captain_warden_system === FALSE ? "No" : "Yes"), 'B', 1, 'L', 0, '');
		
		$fpdf->Cell(195, 6, "What types of emergency drills are conducted and according to what schedule?", '', 1, 'L', 0, '');
		$fpdf->write(5, $data->types_of_emergency_drills);
		
		// TITLE
		$fpdf->ln(5);
		$fpdf->SetFont('helvetica','B', 12);
		$fpdf->Cell(195, 4, "Floor Plans", '', 1, 'L', 0, '');
		$fpdf->SetFont('helvetica','', 10);
		// END TITLE
		
		for($x=1;$x<=10;$x++) {
			$fpdf->Cell(5, 6, $x, '', 0, 'C', 0, '');
			$fpdf->Cell(30, 6, "Building_name:", '', 0, 'L', 0, '');
			$fpdf->Cell(35, 6, $data->building_name.$x, 'B', 0, 'L', 0, '');
			$fpdf->Cell(30, 6, "No of floor plans:", '', 0, 'L', 0, '');
			$fpdf->Cell(35, 6, $data->no_of_floor_plans.$x, 'B', 0, 'L', 0, '');
			$fpdf->Cell(30, 6, "Uploaded?:", '', 0, 'L', 0, '');
			$floorplans = 'floor_plans'.$x.'_file';
			$fpdf->Cell(35, 6, (!empty($data->{$floorplans}) ? "Yes" : "No"), 'B', 0, 'L', 0, '');
		}
		
		
		
		
		$fpdf->Output();
	}
	
	
	
	
}