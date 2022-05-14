<?php


use Larabookir\Gateway\Pasargad\RSAKeyType;
use Larabookir\Gateway\Pasargad\RSAProcessor;

Route::get('/get-bank-test', function(){
    $amount = 100;                                                // Price Toman
    $merchantCode = "4497693";                                        // Merchant Code
    $terminalCode = "1679081";                                        // Terminal Code
    $privateKey = "<RSAKeyValue><Modulus>zrAbU/Gfbxb8DdxAZ8DKJX5Ru+ggXFQq6sBPx9C4wuMCY3UhNTJl3Q5FuFDf8IYLt6U5i044e9a9SvOjDTHrmkLJOc28S/TPW5L3NRcaAl29Kjlh6w0r3RuuYVeVl8W3AVmXlcoPKESkEZcVYQlFlNYGXeEHmTLHPwioeOx5IJU=</Modulus><Exponent>AQAB</Exponent><P>71AL8bJHaAnZQVu0MjJEaDHOGMAoOFOUtpo3H1KQgZBrBSHVQ4Lba5ZxU9rU37fEQQcECWo4BZovJ2iOEQPInw==</P><Q>3RmtgopqyrgkMRDyBr5ikZl56FO6OeiP7ovwhvOHSD+sgys4SwyD1sM5/RaasoYvGnI96B7HR2tweNZOpNJmSw==</Q><DP>a9s21uLTvfcaXJOZHjp7jD5ONed8+Q3qa3YLu+k5SbuuEC0Ucg3rGI1AXFu3L3EiWXBxCFFAGH5KHEfKJ6793w==</DP><DQ>L8A98vWF/uYqGta4DrDLhPqKk5yRmbQaccCTX/H0g6wMy/9nlv3K83USbxCUtH26apHFwP30t/4COna+YWZ3ZQ==</DQ><InverseQ>vE8AWeQcBzDAK0VzUl3/W4nB31uCAqv+0s7d9lWqKWT2O5SnMblgvzaqy5i/2poNtklK1fwoUw9HTKhii5mSAw==</InverseQ><D>uzak6jo38cXd9SgFZnUoJSHwIsY1WawbW5tqKFGUqWI6LaBQvgCyZ7Kf0D3hOdoRDv0nzFjDrNhriVJ55F/NSMIf6wAmJj2xIgtTtejhiRhUZlYdyImejXVAGxHSMtkW5b9fRVqveoEKpuztbbAlR0zcN+uMvxVvdlZ7IrYSjdk=</D></RSAKeyValue>";                                                // Private Key
    $redirectAddress = "http://goldcourtgallery.com/pep/verify.php";    // Callback URL
    $InvoiceNumber  = "24332443";
    $amount = $amount * 10;
    $invoiceDate = date("Y/m/d H:i:s");
    $processor = new RSAProcessor($privateKey, RSAKeyType::XMLString);
    date_default_timezone_set('Asia/Tehran');
    $timeStamp = date("Y/m/d H:i:s");
    $action = "1003";
    $data = "#" . $merchantCode . "#" . $terminalCode . "#" . $InvoiceNumber . "#" . $invoiceDate . "#" . $amount . "#" . $redirectAddress . "#" . $action . "#" . $timeStamp . "#";
    $data = sha1($data, true);
    $data = $processor->sign($data);
    $result = base64_encode($data);
    echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
	<body>
		<div id='WaitToSend' style='margin:0 auto; width: 600px; text-align: center;'>درحال انتقال به درگاه بانک<br>لطفا منتظر بمانید .</div>
		<form Id='GateWayForm' Method='post' Action='https://pep.shaparak.ir/gateway.aspx' style='display: none;'>
			InvoiceNumber<input type='text' name='InvoiceNumber' value='$InvoiceNumber' />
			invoiceDate<input type='text' name='invoiceDate' value='$invoiceDate' />
			amount<input type='text' name='amount' value='$amount' />
			terminalCode<input type='text' name='terminalCode' value='$terminalCode' />
			merchantCode<input type='text' name='merchantCode' value='$merchantCode' />
			redirectAddress<input type='text' name='redirectAddress' value='$redirectAddress' />
			timeStamp<input type='text' name='timeStamp' value='$timeStamp' />
			action<input type='text' name='action' value='$action' />
			sign<input type='text' name='sign' value='$result' />
		</form>
		<script language='javascript'>document.forms['GateWayForm'].submit();</script>
	</body>
</html>";
});
Route::get('/finish-bank-test', function(){



    $amount = 100;                                                // Price Toman
    $merchantCode = "4497693";                                        // Merchant Code
    $terminalCode = "1679081";                                        // Terminal Code
    $privateKey = "<RSAKeyValue><Modulus>zrAbU/Gfbxb8DdxAZ8DKJX5Ru+ggXFQq6sBPx9C4wuMCY3UhNTJl3Q5FuFDf8IYLt6U5i044e9a9SvOjDTHrmkLJOc28S/TPW5L3NRcaAl29Kjlh6w0r3RuuYVeVl8W3AVmXlcoPKESkEZcVYQlFlNYGXeEHmTLHPwioeOx5IJU=</Modulus><Exponent>AQAB</Exponent><P>71AL8bJHaAnZQVu0MjJEaDHOGMAoOFOUtpo3H1KQgZBrBSHVQ4Lba5ZxU9rU37fEQQcECWo4BZovJ2iOEQPInw==</P><Q>3RmtgopqyrgkMRDyBr5ikZl56FO6OeiP7ovwhvOHSD+sgys4SwyD1sM5/RaasoYvGnI96B7HR2tweNZOpNJmSw==</Q><DP>a9s21uLTvfcaXJOZHjp7jD5ONed8+Q3qa3YLu+k5SbuuEC0Ucg3rGI1AXFu3L3EiWXBxCFFAGH5KHEfKJ6793w==</DP><DQ>L8A98vWF/uYqGta4DrDLhPqKk5yRmbQaccCTX/H0g6wMy/9nlv3K83USbxCUtH26apHFwP30t/4COna+YWZ3ZQ==</DQ><InverseQ>vE8AWeQcBzDAK0VzUl3/W4nB31uCAqv+0s7d9lWqKWT2O5SnMblgvzaqy5i/2poNtklK1fwoUw9HTKhii5mSAw==</InverseQ><D>uzak6jo38cXd9SgFZnUoJSHwIsY1WawbW5tqKFGUqWI6LaBQvgCyZ7Kf0D3hOdoRDv0nzFjDrNhriVJ55F/NSMIf6wAmJj2xIgtTtejhiRhUZlYdyImejXVAGxHSMtkW5b9fRVqveoEKpuztbbAlR0zcN+uMvxVvdlZ7IrYSjdk=</D></RSAKeyValue>";                                                // Private Key
    $iD 				= (isset($_GET['iD']) 	&& $_GET['iD'] != "") 	? $_GET['iD'] 	: "";
    $tref 				= (isset($_GET['tref']) && $_GET['tref'] != "") ? $_GET['tref'] : "";
    $InvoiceNumber 		= (isset($_GET['iN']) 	&& $_GET['iN'] != "") 	? $_GET['iN'] 	: "";
    $amount				= $amount * 10;

    function getPaymentResult($tref = NULL)
    {
        if(isset($tref))
        {
            $fields = array('invoiceUID' => $tref);
            $result = post2https($fields,'https://pep.shaparak.ir/CheckTransactionResult.aspx');
            $array 	= makeXMLTree($result);

            if($array["resultObj"]["result"] == "True")
            {
                return $array;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    function verifyPaymentResult($merchantCode, $terminalCode, $privateKey, $amount, $InvoiceNumber, $iD)
    {

        $fields = array(
            'MerchantCode' 	=> $merchantCode,
            'TerminalCode' 	=> $terminalCode,
            'InvoiceNumber' => $InvoiceNumber,
            'InvoiceDate' 	=> $iD,
            'amount' 		=> $amount,
            'TimeStamp' 	=> date("Y/m/d H:i:s"),
            'sign' 			=> ''
        );

        $processor 		= new RSAProcessor( $privateKey ,RSAKeyType::XMLString);
        $data 			= "#". $fields['MerchantCode'] ."#". $fields['TerminalCode'] ."#". $fields['InvoiceNumber'] ."#". $fields['InvoiceDate'] ."#". $fields['amount'] ."#". $fields['TimeStamp'] ."#";
        $data 			= sha1($data,true);
        $data 			=  $processor->sign($data);
        $fields['sign'] =  base64_encode($data);

        $verifyresult 	= post2https($fields,'https://pep.shaparak.ir/VerifyPayment.aspx');
        $array 			= makeXMLTree($verifyresult);

        return $array;
    }

    $result = getPaymentResult($tref);

    if($result['resultObj']['result'] == "True")
    {
        $verify = verifyPaymentResult($merchantCode, $terminalCode, $privateKey, $amount, $InvoiceNumber, $iD);

        if($verify['actionResult']['result'] == "True")
        {
            echo "پرداخت شما با موفقیت انجام شد, کد پیگیری : {$tref}";
        } else {
            echo "خطا : ". $verify['actionResult']['resultMessage'];
        }
    } else {
        echo "پرداخت ناموفق بود.";
    }


});
