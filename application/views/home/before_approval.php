

<?php

$details = $data[0];


/* echo "<pre>";
print_r($details);
exit; */

//echo $_SERVER['DOCUMENT_ROOT'].'/fin/assets/pdf_plugins/vendor/autoload.php';


include($_SERVER['DOCUMENT_ROOT'].'/fin/assets/pdf_plugins/vendor/autoload.php');

$base_url = base_url();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<style>
.table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size:8px;
  margin:2px 0px;
}
.head {
  font-family: arial, sans-serif;
  border: none;
  width: 100%;
  font-size:12px;
  margin:2px 0px;
  font-weight:bold;
}
.table td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<table class="head" broder="0" style="border:none !important;">
<tr><td width="30%"><img src="'.$base_url.'assets/dist/img/logo.png" width="180px" height="50px"></td><td width="60%">RURAL CONSUMER FINANCE APPLICATION FORM</td></tr>
</table>
<table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Sourcing Details</td>
   
  </tr>
  <tr>
    <td width="23%">Location Name </td>
    <td width="27%">'.$details['location_name'].'</td>
    <td width="23%">Login Date</td>
    <td width="27%">'.date('d-m-Y',$details['created_at']).'</td>
  </tr>
  <tr>
    <td width="23%">Disburse To</td>
    <td width="27%">'.$details['disburse_to'].'</td>
    <td width="23%">Disburse Code</td>
    <td width="27%">'.$details['disburse_code'].'</td>
  </tr>
   <tr>
    <td width="23%">BC Name</td>
    <td width="27%">'.$details['bc_name'].'</td>
    <td width="23%">BC Code</td>
    <td width="27%">'.$details['bc_code'].'</td>
  </tr>
   <tr>
    <td width="23%">SE Name </td>
    <td width="27%">'.$details['se_name'].'</td>
    <td width="23%">SE Code</td>
    <td width="27%">'.$details['se_code'].'</td>
  </tr>
   <tr>
    <td width="23%">TM Name</td>
    <td width="27%">'.$details['tm_name'].'</td>
    <td width="23%">TM Code</td>
    <td width="27%">'.$details['tm_code'].'</td>
  </tr>
  <tr>
    <td width="23%">Program Name</td>
    <td width="27%">'.$details['program_name'].' <span style=" font-size: 14px;">&#10004;</span></td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Scheme Name</td>
    <td width="27%">'.$details['scheme_name'].' - No Advance Scheme</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Documents Provided</td>
    <td width="27%">'.$details['id_proof'].'</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Type of ID Proof</td>
    <td width="27%">'.$details['id_proof'].'</td>
    <td width="23%">ID No.</td>
    <td width="27%">'.$details['proof_number'].'</td>
  </tr>
</table>
<table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Applicant Details</td>
   
  </tr>
  <tr>
    <td width="23%">Applicant Name </td>
    <td colspan="3">'.$details['applicant_name'].'</td>
   
  </tr>
  <tr>
    <td width="23%">Father/Husbands</td>
    <td width="27%">'.$details['father_name'].'</td>
    <td width="23%">Mothers Name</td>
    <td width="27%">'.$details['mother_name'].'</td>
  </tr>
   <tr>
    <td width="23%">Date of Birth </td>
    <td width="27%">'.date("d/m/Y", strtotime($details['date_of_birth'])).'</td>
    <td width="23%">Gender Male </td>
    <td width="27%">'.$details['gender'].'</td>
  </tr>
   <tr>
    <td width="23%">Marital Status </td>
    <td width="27%">'.$details['marital_status'].'</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
   <tr>
    <td width="23%">Education</td>
    <td width="27%">'.$details['education'].'</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Residence Status</td>
    <td width="27%">'.$details['residence'].'</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
</table>
<table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Contact Details</td>
   
  </tr>
  <tr>
    <td width="23%">Mobile Phone </td>
    <td width="27%">'.$details['mobile_number'].'</td>
    <td width="23%">E-mail ID</td>
    <td width="27%">'.$details['email_id'].'</td>
  </tr>
  <tr>
    <td width="23%">Landline (Home) </td>
    <td width="27%"></td>
    <td width="23%">Landline (Office)</td>
    <td width="27%"></td>
  </tr>
   <tr>
    <td width="23%">Direct Line </td>
    <td width="27%"></td>
    <td width="23%">Extn </td>
    <td width="27%"></td>
  </tr>
  
</table>
<table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Present Address</td>
   
  </tr>
  <tr>
    <td width="23%">Address Line 1  </td>
    <td width="27%">'.$details['address_line1'].'</td>
    <td width="23%">Address Line 2</td>
    <td width="27%">'.$details['address_line2'].'</td>
  </tr>
  <tr>
    <td width="23%">Nearest Landmark </td>
    <td width="27%">'.$details['landmark'].'</td>
    <td width="23%">Pincode </td>
    <td width="27%">'.$details['pincode'].'</td>
  </tr>
   <tr>
    <td width="23%">City/Village </td>
    <td width="27%">'.$details['city'].'</td>
    <td width="23%">District </td>
    <td width="27%">'.$details['district'].'</td>
  </tr>
  <tr>
    <td width="23%">Years at Current
Address  </td>
    <td width="27%">'.$details['year_at_currentaddress'].'</td>
    <td width="23%">Years at Current City  </td>
    <td width="27%">'.$details['year_in_currentcity'].'</td>
  </tr>
  
</table>
<table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Permanent Address
</td>
   
  </tr>
  <tr>
    <td width="23%">Address Line 1  </td>
    <td width="27%">'.$details['perm_addressline1'].'</td>
    <td width="23%">Address Line 2</td>
    <td width="27%">'.$details['perm_addressline2'].'</td>
  </tr>
  <tr>
    <td width="23%">Nearest Landmark </td>
    <td width="27%">'.$details['perm_landmark'].'</td>
    <td width="23%">Pincode </td>
    <td width="27%">'.$details['perm_pincode'].'</td>
  </tr>
   <tr>
    <td width="23%">City/Village </td>
    <td width="27%">'.$details['perm_city'].'</td>
    <td width="23%">District </td>
    <td width="27%">'.$details['perm_district'].'</td>
  </tr>
</table>
<table class="table" border="1">
  <tr >
    <td colspan="6" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Proposed Loan Details
</td>
   
  </tr>
  <tr>
    <td colspan="6">Manufactureer Name</td>
    
  </tr>
  <tr>
    <td width="17%">Asset Make </td>
    <td width="16%">'.$details['asset_make'].'</td>
    <td width="17%">Processing Fee </td>
    <td width="16%">'.$details['processing_fee'].'</td>
	<td width="17%">EMI Amount </td>
    <td width="17%">'.$details['emi_amount'].'</td>
  </tr>
  <tr>
    <td width="17%">Asset Model </td>
    <td width="16%">'.$details['asset_model'].'</td>
    <td width="17%">Document Charges  </td>
    <td width="16%"></td>
	<td width="17%">Gross Tenure</td>
    <td width="17%">'.$details['gross_tenure'].'</td>
  </tr>
  <tr>
    <td width="17%">Item Number </td>
    <td width="16%">'.$details['item_number'].'</td>
    <td width="17%">Other Charges   </td>
    <td width="16%">'.$details['item_number'].'</td>
	<td width="17%">ROI </td>
    <td width="17%">'.$details['roi'].'</td>
  </tr>
  
   <tr>
    <td width="17%">Loan Amount  </td>
    <td width="16%">'.$details['loan_amount'].'</td>
    <td width="17%">Total Down Payment</td>
    <td width="16%">'.$details['loan_amount'].'</td>
	<td width="17%">Bharti Axa</td>
    <td width="17%"></td>
  </tr>
  
  <tr>
    <td width="17%">Margin Money  </td>
    <td width="16%"></td>
    <td width="17%">No. of Advance EMI</td>
    <td width="16%">'.$details['advance_emi_amount'].'</td>
	<td width="17%">Bharti Axa</td>
    <td width="17%"></td>
  </tr>
  
  
  
</table><table class="table" width="100%" class="table" border="1">
  <tr >
    <td colspan="6" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Employement Details
</td>
   
  </tr>
 
  <tr>
    <td width="20%">Occupation Type </td>
    <td width="20%">Salaried</td>
    <td width="20%">Salaried Daily wages</td>
    <td width="20%">Self Employed</td>
	<td colspan="2" width="20%">Self Employed Agriculture <span style=" font-size: 14px;">&#10004;</span> </td>
   
  </tr>
  <tr>
    <td  width="20%">Name of organization </td>
   <td colspan="6" width="80%"></td>
  </tr>
  <tr>
    <td  width="20%">Office/ Business Address </td>
   <td colspan="6" width="80%"></td>
  </tr>
  
    <tr>
    <td  >Nearest Landmark</td>
   <td ></td>
   <td  >City/Village</td>
   <td ></td>
    <td  colspan="2">District</td>
  </tr>
    <tr>
    <td  >State</td>
   <td colspan="2"></td>
   <td  >Pincode</td>
   <td colspan="2"></td>

  </tr>
  
  <tr>
  <td>Company Type</td>
  <td>Govt.    &nbsp;&nbsp;&nbsp;&nbsp;       /  &nbsp;&nbsp;&nbsp;&nbsp;   Pvt.Ltd. </td>

  <td>Public.</td>
  <td>Proprietorship.</td>
  <td>Partnership.</td>
  <td>Agriculture.</td>
  
  </tr>
  
  <tr>
  
  <td>Designation (Salaried)</td>
  <td colspan= "2"></td>
   <td>Designation (Self Employed)</td>
  <td colspan= "2"></td>
  
  </tr>
   <tr>
  
  <td>Nature of Business</td>
  <td colspan= "2"></td>
   <td>Nature of Business</td>
  <td colspan= "2">Agriculture</td>
  
  </tr>
  
  
    <tr>
  
  <td>Years in Current Job</td>
  <td colspan= "2"></td>
   <td>Years in previous Job</td>
  <td colspan= "2"></td>
  
  </tr>
  
  
 
  
  
</table><table class="table" border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Bank Details
</td>
   
  </tr>
  <tr>
    <td width="23%">Name of Bank  </td>
    <td width="27%"></td>
    <td width="23%">Bank Branch</td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Account Number</td>
    <td width="27%"></td>
    <td width="23%">Account Opening</td>
    <td width="27%"></td>
  </tr>
  
</table>');


//$mpdf->AddPage();
$mpdf->WriteHTML('<table border="1" class="table"  style="width:100%">
<tr> <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Nominee Details
</td></tr>
  <tr>
    <td>Nominee Name</td>
    <td>'.$details['nominee_name'].'</td> 
    <td>Nominee Mobile</td>
    <td>'.$details['nominee_mobile'].'</td>
  </tr>
  
   <tr>
    <td>Nominee DOB</td>
    <td>'.$details['nominee_dob'].'</td> 
    <td>Nominee Gender</td>
    <td>'.$details['nominee_gender'].'</td>
  </tr>
  
   <tr>
    <td>Nominee Address Type</td>
    <td>'.$details['nominee_add_type'].'</td> 
    <td>Nominee Address </td>
    <td>'.$details['nominee_address'].'</td>
  </tr>
  
</table>');

if(!empty($details['aadhar_front'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">ID Proof Front</h2>
<img src="'.$details['aadhar_front'].'" width= "100%" height="100%">');
}
if(!empty($details['aadhar_back'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">ID Proof Back</h2>
<img src="'.$details['aadhar_back'].'" width= "100%" height="100%">');
}



if(!empty($details['address_proof_front'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Address Proof Front</h2>
<img src="'.$details['address_proof_front'].'" width= "100%" height="100%">');
}
if(!empty($details['address_proof_back'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Address Proof Back</h2>
<img src="'.$details['address_proof_back'].'" width= "100%" height="100%">');
}
if(!empty($details['ship_proof_front'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Ship Proof Front</h2>
<img src="'.$details['ship_proof_front'].'" width= "100%" height="100%">');
}

if(!empty($details['ship_proof_back'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Ship Proof Back</h2>
<img src="'.$details['ship_proof_back'].'" width= "100%" height="100%">');
}

if(!empty($details['form60_proof'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Form 60</h2>
<img src="'.$details['form60_proof'].'" width= "100%" height="100%">');
}
if(!empty($details['declaration_proof'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Declaration proof</h2>
<img src="'.$details['declaration_proof'].'" width= "100%" height="100%">');
}
/* if(!empty($details['dpn_proof'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">DPN Proof</h2>
<img src="'.$details['dpn_proof'].'" width= "100%" height="100%">');
}
if(!empty($details['schdule_proof'])){
$mpdf->AddPage();
$mpdf->WriteHTML('<h2 style="text-align: center;">Schdule Proof</h2>
<img src="'.$details['schdule_proof'].'" width= "100%" height="100%">');
} */



$mpdf->Output('Before Approval.pdf', 'D');