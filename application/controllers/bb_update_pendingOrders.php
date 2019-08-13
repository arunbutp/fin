<?php
include 'connection.php';
global $connect;
require_once('models/user.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require_once 'app/Mage.php';
Mage::app()->setCurrentStore(0);
$connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');

// $storeid= 1;
$data=file_get_contents('php://input');
$json = json_decode($data,true);
//$order = $json[0];
$file = 'orderxmls/fintechlead_'.$storeid."_". (strtotime(date("Y/m/d h:i:sa"))*1000);
$current = file_get_contents($file);
$current = $data;
file_put_contents($file, $current);
$output  = array();
$i=0;
// $json1 = $json['fintech'];
$user_id = $json['user_id'];
$id = $json['lead_id'];
$username = $json['username'];
$user_type = $json['user_type'];
$status = $json['status'];
$storeid = $json['store_id'];
// print_r($store_id);
// die;
  Mage::app()->setCurrentStore(0);
  $connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');
	// $storeid= 54;
 
 if($user_id != null){
  
 if($id != '0'){
	 if($status == 'Approved'){
		 $setResp = updatePendingOrder($id,$username,$storeid);

	 if($setResp != null){
		 $output['res_msg']="pending order success";
	     $output['res_code']=1;
	 }else{
	     $output['res_msg']="order lead failed";
	     $output['res_code']=0;
    } 
	 }else{
		 
		 $disapp = 'Disapproved BY ' . $username;
		 $cur_date = date('Y-m-d H:i:s');
		 
		 $servername = "13.232.90.200";
			$username = "in3dev";
			$password = "Hysl2fer@8482";
			$dbname = "fintech";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			} 
		 
		 
		 $updatesql = "UPDATE orderlead_info SET status='Canceled',is_approved=1,note='".$disapp."',updated_at='".$cur_date."' WHERE id = ".$id."";
		// $updatesql = "UPDATE orderlead_info set updated_at = NOW() where username = '".$username."' AND id = '".$id."' "; 
		$query = $conn->query($updatesql);
		
		// $connectionRead->query($updatesql);
		if($query > 0){
			
		$output['res_msg']="pending order success";
	    $output['res_code']=3;	
		}
	 }
	
/*  $updatesql = "UPDATE orderlead_info set updated_at = NOW() where username = '".$username."' AND id = '".$id."' ";

    $connectionRead->query($updatesql);
	if($connectionRead){
	
	$output['res_msg']="order lead success";
	$output['res_code']=3;
    }else{
	$output['res_msg']="order lead failed";
	$output['res_code']=4;
    }  */ 
}
	$i++;
	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	}
// echo $id;

 echo json_encode($output);
 
	
	function updatePendingOrder($ids,$user,$storeid){
	
		$lead_ids = $ids;
		
	// $lead_ids = $_REQUEST['lead_ids'];
	   
        $resource = Mage::getSingleton('core/resource');
	    // $connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');
        $read = $resource->getConnection('core_read');
        $write = $resource->getConnection('core_write');
        // $log_customer = Mage::getSingleton('customer/session')->getCustomer();
			// print_r($log_customer);
	   // die;
        // $__username = $log_customer->getUsername();
        // $logging_store = $log_customer->getStoreId();
		$customers = Mage::getModel("customer/customer");
	
		$webId = Mage::getModel('core/store')->load($storeid)->getWebsiteId();
        $set['order_by'] = $user;
        $note = "Approved through Mobile by ".$user." - ".date("d-m-Y H:i:s");
        $order_ids ="";
		$lead_id = 10;
		
		$servername = "13.232.90.200";
			$username = "in3dev";
			$password = "Hysl2fer@8482";
			$dbname = "fintech";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			} 
			
			
            $sql = "SELECT * FROM orderlead_info WHERE id =".$lead_ids."";
            			$query = $conn->query($sql);

			$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
			//print_r($result);
		
            if($result['mobile_order'] == 1)
                $ordered_type="Mobile";
            else
                $ordered_type="Creater";
            $set['ordered_type'] = $ordered_type;
            // $set['loanrefno'] = $_REQUEST[$lead_id];
            $set['loanrefno'] = $result['cas_id'];
            $cust_username = $result['rso_username'];			
			//die;
            $customer = Mage::getModel("customer/customer");
            $customer->setWebsiteId($webId);
		    $customer->setStoreId($result['store_id']);
            $customer->loadByUsername($cust_username);
			$id = $customer->getEntityId();
			//echo 'sss'.$id;
			
            if($result)
            {
			 
           
            $branch_code = $result['bc_code'];
            $transaction = Mage::getModel('core/resource_transaction');
            $quote = Mage::getModel('sales/quote')->setStoreId($result['store_id']);
            $reservedOrderId = Mage::getSingleton('eav/config')->getEntityType('order')->fetchNewIncrementId($result['store_id']);
            $order = Mage::getModel('sales/order')
            ->setIncrementId($reservedOrderId)
            ->setStoreId($result['store_id'])
            ->setQuoteId(0)
            ->setGlobal_currency_code('INR')
            ->setBase_currency_code('INR')
            ->setStore_currency_code('INR')
            ->setOrder_currency_code('INR');
            $order->addData($set);
			
            // set Customer data
            $order->setCustomer_email($result['email_id'])
            ->setCustomerFirstname($result['store_id'])
            ->setCustomerLastname($result['applicant_firstname'])

            ->setCustomer_is_guest(0);
       
            // Billing Address
            $_address = $result['address_line1'].','.$result['address_line2'];
            $sql_region = "select region_id, district from directory_pincode where pincode='".$result['pincode']."'";
            $res_region = $read->fetchRow($sql_region);
            if($res_region['region_id'] == '')
                $regionId = 515;
            else
                $regionId = $res_region['region_id'];
			
            $billingAddress = Mage::getModel('sales/order_address')
            ->setStoreId($storeId)
            ->setAddressType(Mage_Sales_Model_Quote_Address::TYPE_BILLING)
            ->setCustomerId($result['id'])
            ->setCustomerAddressId($result['id'])
            ->setPrefix("")
            ->setFirstname($result['applicant_firstname'])
            ->setMiddlename("")
            ->setLastname($result['applicant_lastname'])
            ->setSuffix("")
            ->setCompany("")
            ->setStreet($_address)
            ->setCity($result['city'])
            ->setCountry_id("IN")
            ->setRegion_id($regionId)
            ->setPostcode($result['pincode'])
            ->setTelephone($result['mobile_number'])
            ->setFax("")
            ->setData('branch_code',$branch_code);
            $order->setBillingAddress($billingAddress);
          
            $shipping = $customer->getDefaultShippingAddress();
            $shippingAddress = Mage::getModel('sales/order_address')
            ->setStoreId($result['store_id'])
            ->setAddressType(Mage_Sales_Model_Quote_Address::TYPE_SHIPPING)
            ->setCustomerId($result['id'])
            ->setCustomerAddressId($result['id'])
            ->setPrefix("")
            ->setFirstname($result['applicant_firstname'])
            ->setMiddlename("")
            ->setLastname($result['applicant_lastname'])
            ->setSuffix("")
            ->setCompany("")
            ->setStreet($_address)
            ->setCity($result['city'])
            ->setCountry_id("IN")
            ->setRegion_id($regionId)
            ->setPostcode($result['pincode'])
            ->setTelephone($result['mobile_number'])
            ->setFax("")
            ->setVatId("")
            ->setSaveInAddressBook(1)
             ->setData('branch_code',$branch_code);
            $order->setShippingAddress($shippingAddress);
            $orderPayment = Mage::getModel('sales/order_payment')
            ->setStoreId($result['store_id'])
            ->setCustomerPaymentId(0)
            ->setMethod('cashondelivery');
            $order->setPayment($orderPayment);
            Mage::app()->setCurrentStore($result['store_id']);
			
            $subTotal = 0;
            $products=$result["item_code"];	
            $product_id = Mage::getModel('catalog/product')->getIdBySku($products);
            $qty=$result["qty"];
			  // print_r($products);
			// die;
            $_product = Mage::getModel('catalog/product')->load($product_id);
			
            $_product->setStoreId($result['store_id']);
			
            $todaydate=date("Y-m-d");
            $type=$_product->getTypeId();
            $rowTotal = $_product->getFinalPrice() * $qty;
            $finalprice = $_product->getFinalPrice();
            $original_price = $_product->getPrice();
			
            $orderItem=Mage::getModel('sales/order_item')
            ->setStoreId($result['store_id'])
            ->setQuoteItemId(0)
            ->setQuoteParentItemId(NULL)
            ->setProductId($product_id)
            ->setProductType($_product->getTypeId())
            ->setQtyBackordered(NULL)
            ->setTotalQtyOrdered($qty)
            ->setQtyOrdered($qty)
            ->setName($_product->getName())
            ->setSku($_product->getSku())
            ->setPrice($finalprice)
            ->setBasePrice($finalprice)
            ->setOriginalPrice($original_price)
            ->setBaseOriginalPrice($original_price)
            ->setPriceInclTax($finalprice)
            ->setBasePriceInclTax($finalprice)
            ->setRowTotalInclTax($finalprice)
            ->setBaseRowTotalInclTax($finalprice)
            ->setRowTotal($rowTotal)
            ->setBaseRowTotal($rowTotal);
            $subTotal += $rowTotal;
            $order->addItem($orderItem);
           
            Mage::helper('importer')->addGift($product_id,$qty,$order,$storeId,$webId);
            
            $order->setSubtotal($subTotal)
            ->setBaseSubtotal($subTotal)
            ->setShippingMethod("freeshipping_freeshipping")
            ->setShippingDescription("Free Shipping - Free");
            if($result['couponcode'] != "" && $result['discount_amount'] > 0)
            {
                $oCoupon = Mage::getModel('salesrule/coupon')->load($result['couponcode'], 'code');
                $timesUsed = $oCoupon->getData('times_used');
                if($oCoupon) {
                    $order->setCouponCode($result['couponcode'])
                          ->setBaseDiscountAmount("-".$result['discount_amount'])
                          ->setDiscountAmount("-".$result['discount_amount'])
                          ->setDiscountDescription($result['couponcode']);
                    $subTotal = $subTotal - $result['discount_amount'];
                    $timesUsed = $timesUsed;
                    $oCoupon->setTimesUsed($timesUsed)->save();
                }
            }
            $order->setGrandTotal($subTotal)
            ->setBaseGrandTotal($subTotal);
            try {
			
            $transaction->addCommitCallback(array($order, 'place'));			    			
            $transaction->addCommitCallback(array($order, 'save'));					
            $transaction->save(); 
			
            $orders_id = Mage::getModel('sales/order')->getCollection()
            ->addAttributeToFilter('store_id',$result['store_id'])
            ->setOrder('entity_id','DESC')
            ->setPageSize(1)
            ->setCurPage(1);
            $update_id = $orders_id->getFirstItem()->getId();
			
            $increment_id = $orders_id->getFirstItem()->getIncrementId();
			
            $order_data=Mage::getModel('sales/order')->loadByIncrementId($increment_id);
            $state = 'holded';
            $order_data->setState(Mage_Sales_Model_Order::STATE_HOLDED, true);
            $order_data->setStatus($state)->save();
            $cur_date = date('Y-m-d H:i:s');
            $cas_id = $_REQUEST[$lead_id];
            $sql_update = "UPDATE orderlead_info SET status='Disbursement In Progress',order_id=".$update_id.",is_approved=1,note='".$note."',updated_at='".$cur_date."' WHERE id = ".$lead_ids."";
            $query = $conn->query($sql_update);
            }
			catch(Exception $e) {			
            // echo 'Message: ' .$e->getMessage();
            }
            return $increment_id;
            }	
	}
 
?>