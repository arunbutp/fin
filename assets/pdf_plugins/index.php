<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size:8px;
  margin:2px 0px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<table >
<tr><td width="40%"><img width="200px" height="50px" src="logo.png"></td><td width="60%">RURAL CONSUMER FINANCE APPLICATION FORM</td></tr>
</table>
<table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Sourcing Details</td>
   
  </tr>
  <tr>
    <td>Location Name </td>
    <td></td>
    <td>Login Date</td>
    <td></td>
  </tr>
  <tr>
    <td>Disburse To</td>
    <td></td>
    <td>Disburse Code</td>
    <td></td>
  </tr>
   <tr>
    <td>BC Name</td>
    <td></td>
    <td>BC Code</td>
    <td></td>
  </tr>
   <tr>
    <td>SE Name </td>
    <td></td>
    <td>SE Code</td>
    <td></td>
  </tr>
   <tr>
    <td>TM Name</td>
    <td></td>
    <td>TM Code</td>
    <td></td>
  </tr>
  <tr>
    <td>Program Name</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Scheme Name</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Documents Provided</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Type of ID Proof</td>
    <td>Aadhar</td>
    <td>ID No.</td>
    <td>273735383737</td>
  </tr>
</table>
<table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Applicant Details</td>
   
  </tr>
  <tr>
    <td>Applicant Name </td>
    <td>hxhxx yxyd cv</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Father/Husbands</td>
    <td></td>
    <td>Mothers Name</td>
    <td></td>
  </tr>
   <tr>
    <td>Date of Birth </td>
    <td></td>
    <td>Gender Male </td>
    <td></td>
  </tr>
   <tr>
    <td>Marital Status </td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>Education</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Residence Status</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Contact Details</td>
   
  </tr>
  <tr>
    <td>Mobile Phone </td>
    <td>hxhxx yxyd cv</td>
    <td>E-mail ID</td>
    <td></td>
  </tr>
  <tr>
    <td>Landline (Home) </td>
    <td></td>
    <td>Landline (Office)</td>
    <td></td>
  </tr>
   <tr>
    <td>Direct Line </td>
    <td></td>
    <td>Extn </td>
    <td></td>
  </tr>
  
</table>
<table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Present Address</td>
   
  </tr>
  <tr>
    <td>Address Line 1  </td>
    <td>hxhxx yxyd cv</td>
    <td>Address Line 2</td>
    <td></td>
  </tr>
  <tr>
    <td>Nearest Landmark </td>
    <td></td>
    <td>Pincode </td>
    <td></td>
  </tr>
   <tr>
    <td>City/Village </td>
    <td></td>
    <td>District </td>
    <td></td>
  </tr>
  <tr>
    <td>Years at Current
Address  </td>
    <td></td>
    <td>Years at Current City  </td>
    <td></td>
  </tr>
  
</table>
<table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Permanent Address
</td>
   
  </tr>
  <tr>
    <td>Address Line 1  </td>
    <td>hxhxx yxyd cv</td>
    <td>Address Line 2</td>
    <td></td>
  </tr>
  <tr>
    <td>Nearest Landmark </td>
    <td></td>
    <td>Pincode </td>
    <td></td>
  </tr>
   <tr>
    <td>City/Village </td>
    <td></td>
    <td>District </td>
    <td></td>
  </tr>
</table>
<table border="1">
  <tr >
    <td colspan="8" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Proposed Loan Details
</td>
   
  </tr>
  <tr>
    <td colspan="6">Manufactureer Name</td>
    
  </tr>
  <tr>
    <td>Asset Make </td>
    <td></td>
    <td>Processing Fee </td>
    <td></td>
	<td>EMI Amount </td>
    <td></td>
  </tr>
  <tr>
    <td>Asset Model </td>
    <td></td>
    <td>Document Charges  </td>
    <td></td>
	<td>Gross Tenure</td>
    <td></td>
  </tr>
  <tr>
    <td>Item Number </td>
    <td></td>
    <td>Other Charges   </td>
    <td></td>
	<td>ROI </td>
    <td></td>
  </tr>
  
   <tr>
    <td>Loan Amount  </td>
    <td></td>
    <td>Total Down Payment</td>
    <td></td>
	<td>Bharti Axa</td>
    <td></td>
  </tr>
  
  <tr>
    <td>Margin Money  </td>
    <td></td>
    <td>No. of Advance EMI</td>
    <td></td>
	<td>Bharti Axa</td>
    <td></td>
  </tr>
  
  
  
</table><table border="1">
  <tr >
    <td colspan="4" style="text-align: center; vertical-align: middle;font-weight:bold;background-color:#a9a3a3;color:#fff">Bank Details
</td>
   
  </tr>
  <tr>
    <td>Name of Bank  </td>
    <td></td>
    <td>Bank Branch</td>
    <td></td>
  </tr>
  <tr>
    <td>Account Number</td>
    <td></td>
    <td>Account Opening</td>
    <td></td>
  </tr>
  
</table>');
$mpdf->Output();