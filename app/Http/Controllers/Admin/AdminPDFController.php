<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropertyModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\FPDF;

class AdminPDFController extends Controller
{


    public function BuildPDF(FPDF $fpdf, $id) {
        $data = PropertyModel::find($id);

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
        $pre.= "vironmental risk assessment at your property. The purpose of this questionnaire is to effectively familiarize";
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

        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('helvetica','B',12);
        $fpdf->Cell(195, 10, 'Background Information', '', 1, 'L', 0, '');

        $fpdf->SetFont('helvetica','',10);

        $fpdf->Cell(50, 5, 'Property Name:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->property_name, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Street Address:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->address, '', 1, 'L', 0, '');

        $fpdf->Cell(50, 5, 'Street Address:', '', 0, 'L', 0, '');
        $fpdf->Cell(145, 5, $data->address, '', 1, 'L', 0, '');

        $fpdf->Cell(10, 5, 'City:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->city, '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, 'State:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->state, '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, 'Zip/Postal Code:', '', 0, 'L', 0, '');
        $fpdf->Cell(25, 5, $data->zip, '', 1, 'L', 0, '');

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
        $fpdf->Cell(10, 5, $data->num_of_units, B'', 0, 'L', 0, '');
        $fpdf->Cell(40, 5, 'Est. No. of Residents:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, $data->num_of_residents, 'B', 1, 'L', 0, '');

        $fpdf->Cell(40, 5, 'HUD Section 8:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 5, $data->excepts_hud, 'B', 0, 'L', 0, '');
        $fpdf->Cell(40, 5, 'Tax Credit:', '', 0, 'L', 0, '');
        $fpdf->Cell(10, 7, $data->tax_credit, 'B', 1, 'L', 0, '');

        $fpdf->Cell(165, 5, 'Resident Turnover Rate (%):', '', 0, 'L', 0, '');
        $fpdf->Cell(30, 5, $data->turnover_rate, 'B', 1, 'R', 0, '');

        $fpdf->Cell(60, 5, 'Rental Fee Range ($ per month):', '', 0, 'L', 0, '');
        $fpdf->Cell(20, 5, $data->rental_fee_start, 'B', 0, 'L', 0, '');
        $fpdf->Cell(5, 5, ' - ', ' ', 0, 'C', 0, '');
        $fpdf->Cell(20, 5, $data->rental_fee_end, 'B', 0, 'L', 0, '');






        $fpdf->Output();exit();
    }
	
	
	
	
}