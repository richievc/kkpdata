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
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past
        header('Content-Type: application/pdf');
        $fpdf->AddPage();


        $fpdf->Output();
    }
	
	
	
	
}