<?php include 'bb_serverconfig.php';?>
<?php include 'models/user.php';?>
<?php
//header("Access-Control-Allow-Origin: *");
require_once 'app/Mage.php';
ini_set('display_errors', 1);

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID); 
Mage::app ( "0" );
$connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');

// $_SERVER["REQUEST_METHOD"]

$data = file_get_contents('php://input');
$json = json_decode ($data,true);

/* $id = "test";
      $json = json_decode ($data,true);
      $file = 'orderxmls/logis_'.$id."_". (strtotime(date("Y/m/d h:i:sa"))*1000);
      $current = file_get_contents($file);
      $current = $data;
      file_put_contents($file, $current); */

$login_data = $json['data'];

$api_key = $json['API-KEY'];
$api_id = $json['APP-ID'];

//$login['uname'] = trim($jsondata["uname"]); $login['pwd'] = trim($jsondata["pwd"]); 
	
$uname = trim($login_data["uname"]); 
$pwd = trim($login_data["pwd"]); 
$hostname = Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true );
  $blah = Mage::getModel('admin/user')->authenticate($uname, $pwd);
  
if($blah == true) { 
$sql = "SELECT * FROM admin_user WHERE username='" . $uname . "'" ;
$result = $connectionRead->fetchAll( $sql );
echo json_encode($result);
}else{
echo json_encode(array("data"=>NULL));
} 
  

?>