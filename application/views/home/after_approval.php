<?php

$details = $data[0];

$total_array = array();
$_count =1;

$monthly_income =unserialize($details['monthly_income']);
$monthly_expenditure =unserialize($details['monthly_expenditure']);
$total_array[0]['earning_member'] = 'Earning Members';
$total_array[0]['income_amount'] = '';
$total_array[0]['expenditure_type'] = 'Expenses';
$total_array[0]['exp_amount'] = '';
$total_income = 0;
$total_exp = 0;
$repay ="";
 foreach($monthly_income as $key_inc => $val_inc)
{
   // $total_array[$_count]['earning_member'] = $key_inc.' ........................';
    // $total_array[$_count]['income_amount'] = $val_inc;
    $total_income += $monthly_income[$key_inc]['amount'];
    $_count +=1;
}
$_count =1;
foreach($monthly_expenditure as $key_exp => $val_exp)
{
    $total_array[$_count]['expenditure_type'] = $key_exp;
    $total_array[$_count]['exp_amount'] = $val_exp;
    $_count +=1;
    $total_exp += $val_exp;
}
$repay = round($total_income - $total_exp);
$string_table= '
<style>
    .t1{width:270px}
    .t2{width:10px}
</style> 
<h1 style="font-size:18" align="center">HERO FINCORP LTD.</h1>
<div  align="center">Family Income and Expediture Statement</div>
<hr>
<br>
<table style="border-collapse: collapse;font-size:11px;" width="100%" border="1">
    <tr>
        <th>Income</th>    
        <th width="130px">Amount Rs.</th>
        <th width="130px">Expenditure</th>
        <th width="130px">Amounts Rs.</th>    
    </tr>
    <tr>
        <td height="500px" valign="top">';
		
		 foreach($monthly_income as $_key=>$_val)
            {
				if($_key == 0)
				{
					$string_table .= '&nbsp;&nbsp;&nbsp;Earning Members';
					$string_table .= "<br><br>";
				}
                $string_table .= '&nbsp;&nbsp;&nbsp;'.$monthly_income[$_key]['familyMem'].'.....'.$monthly_income[$_key]['relationName'];
                $string_table .= "<br><br>";
            }
            
       $string_table .=' </td>
        <td style="text-align:right;" valign="top">';
         foreach($monthly_income as $_key=>$_val)
            {
				if($_key == 0)
				{
					$string_table .= '&nbsp;&nbsp;&nbsp;';
					$string_table .= "<br><br>";
				}
                $string_table .= '&nbsp;&nbsp;&nbsp;'.$monthly_income[$_key]['amount'];
                $string_table .= "<br><br>";
            }
           
        $string_table .='</td>
        <td valign="top">';
           foreach($total_array as $_data)
            {
                $string_table .= '&nbsp;&nbsp;&nbsp;'.$_data['expenditure_type'];
                $string_table .= "<br><br>";
            }
            if($total_array)
            {
                $string_table .= '&nbsp;&nbsp;&nbsp;Savings';
                $string_table .= "<br><br>";
            }
              
        $string_table .= '</td>
        <td style="text-align:right;" valign="top">';
         foreach($total_array as $_data)
            {
                $string_table .= $_data['exp_amount'].'&nbsp;&nbsp;&nbsp;';
                $string_table .= "<br><br>";
            }
            if($total_array)
            {
                $string_table .= $repay.'&nbsp;&nbsp;&nbsp;';
                $string_table .= "<br><br>";
            }
           
      $string_table .=  '</td>
    </tr>
    <tr>
        <td>
            Total
        </td>
        <td style="text-align:right;">';
           $string_table .= $total_income.'&nbsp;&nbsp;&nbsp;'; 
      $string_table .='  </td>
        <td>
            Total
        </td>
        <td style="text-align:right;">';
            $string_table .= round($total_exp+$repay).'&nbsp;&nbsp;&nbsp;'; 
       $string_table .= ' </td>
    </tr>
    <tr>
        <td align="center" colspan="4">
            Credit Assessment cum PD Sheet
        </td>        
    </tr>
    <tr>
        <td align="center">
            Household Items seen
        </td>   
        <td width="200px"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td align="center" colspan="4">
            PD Assessment
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td align="center" colspan="4">
            &nbsp;
        </td>        
    </tr>
    <tr>
        <td style="font-weight:bold" align="center" >
            Loan Eligibility
        </td>  
        <td align="center" colspan="3">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td align="center" >
            Repaying Capacity (Income - Exp)
        </td>  
        <td align="center" colspan="3"> ';
            $string_table .= $repay ;
       $string_table .= ' </td>
    </tr>
    <tr>
        <td align="center" >
            Monthly EMI (Total)
        </td>  
        <td align="center" colspan="3">';
            $string_table .= round($details['emi_amount']);
        $string_table .= '</td>
    </tr>
    <tr>
        <td align="center" >
            Monthly EMI eligibilty
        </td>  
        <td align="center" colspan="3">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td  align="center" >
            Loan Amount
        </td>  
        <td align="center" colspan="3">';
            $string_table .= round($details['loan_amount']);
       $string_table .= ' </td>
    </tr>
    
</table> ';



$details = $data[0];




 $_SERVER['DOCUMENT_ROOT'].'/fin/assets/pdf_plugins/vendor/autoload.php';


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
    <td width="27%">'.$details['program_name'].'</td>
    <td width="23%"></td>
    <td width="27%"></td>
  </tr>
  <tr>
    <td width="23%">Scheme Name</td>
    <td width="27%">'.$details['scheme_name'].'</td>
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
    <td width="27%">'.$details['date_of_birth'].'</td>
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
  
</table>
<h2 style="text-align: center;">Declaration</h2>
<img src="'.$details['alernate_id'].'" width= "100%" height="100%">
<h2 style="text-align: center;">Aadhar Proof</h2>
<img src="'.$details['aadhar_front'].'" width= "100%" height="100%">
<img src="'.$details['aadhar_back'].'" width= "100%" height="100%">
');


$mpdf->AddPage();
$mpdf->WriteHTML($string_table);
$mpdf->Output('After Approval.pdf', 'D');