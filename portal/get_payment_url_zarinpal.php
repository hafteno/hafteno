<?php
if(isset($_POST['amount'])){
    require_once("zarinpal_function.php");
    $amount = $_POST['amount'];

    $MerchantID 	= "fe7e5c2a-0459-44a0-8c32-8b4abf2cc300";
    $Amount 		= $amount;
    $Description 	= "تراکنش زرین پال";
    $Email 			= "";
    $Mobile 		= "";
    $CallbackURL 	= "https://hafteno.ir/portal/verify.php?amount=".$Amount;
    $ZarinGate 		= false;
    $SandBox 		= false;
    
    $zp 	= new zarinpal();
    $result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);
    
    if (isset($result["Status"]) && $result["Status"] == 100)
    {
    	// Success and redirect to pay
    	$zp->redirect($result["StartPay"]);
    } else {
    	// error
    	echo "خطا در ایجاد تراکنش";
    	echo "<br />کد خطا : ". $result["Status"];
    	echo "<br />تفسیر و علت خطا : ". $result["Message"];
    }
}