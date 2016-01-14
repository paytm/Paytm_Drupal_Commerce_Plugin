<?php
Class Checksum {
	public static function calculateChecksum($secret_key, $all) {
		$hash = hash_hmac('sha256', $all , $secret_key);
		$checksum = $hash;
		return $checksum;
	}

	public static function getAllParams() {
		//ksort($_POST);
		$all = '';
		foreach($_POST as $key => $value)	{
			if($key != 'checksum') {
				$all .= "'";
				if ($key == 'returnUrl') {
					$all .= Checksum::sanitizedURL($value);
				} else {	
					$all .= Checksum::sanitizedParam($value);
				}
				$all .= "'";
			}
		}
		return $all;
	}

	public static function outputForm($checksum) {
		//ksort($_POST);
		foreach($_POST as $key => $value) {
			if ($key == 'returnUrl') {
				echo '<input type="hidden" name="'.$key.'" value="'.Checksum::sanitizedURL($value).'" />'."\n";
			} else {
				echo '<input type="hidden" name="'.$key.'" value="'.Checksum::sanitizedParam($value).'" />'."\n";
			}
		}
		echo '<input type="hidden" name="checksum" value="'.$checksum.'" />'."\n";
	}

	public static function verifyChecksum($checksum, $all, $secret) {
		$cal_checksum = Checksum::calculateChecksum($secret, $all);
		$bool = 0;
		if($checksum == $cal_checksum)	{
			$bool = 1;
		}

		return $bool;
	}

	public static function sanitizedParam($param) {
		$pattern[0] = "%,%";
	        $pattern[1] = "%#%";
	        $pattern[2] = "%\(%";
       		$pattern[3] = "%\)%";
	        $pattern[4] = "%\{%";
	        $pattern[5] = "%\}%";
	        $pattern[6] = "%<%";
	        $pattern[7] = "%>%";
	        $pattern[8] = "%`%";
	        $pattern[9] = "%!%";
	        $pattern[10] = "%\\$%";
	        $pattern[11] = "%\%%";
	        $pattern[12] = "%\^%";
	        $pattern[13] = "%=%";
	        $pattern[14] = "%\+%";
	        $pattern[15] = "%\|%";
	        $pattern[16] = "%\\\%";
	        $pattern[17] = "%:%";
	        $pattern[18] = "%'%";
	        $pattern[19] = "%\"%";
	        $pattern[20] = "%;%";
	        $pattern[21] = "%~%";
	        $pattern[22] = "%\[%";
	        $pattern[23] = "%\]%";
	        $pattern[24] = "%\*%";
	        $pattern[25] = "%&%";
        	$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}

	public static function sanitizedURL($param) {
		$pattern[0] = "%,%";
	        $pattern[1] = "%\(%";
       		$pattern[2] = "%\)%";
	        $pattern[3] = "%\{%";
	        $pattern[4] = "%\}%";
	        $pattern[5] = "%<%";
	        $pattern[6] = "%>%";
	        $pattern[7] = "%`%";
	        $pattern[8] = "%!%";
	        $pattern[9] = "%\\$%";
	        $pattern[10] = "%\%%";
	        $pattern[11] = "%\^%";
	        $pattern[12] = "%\+%";
	        $pattern[13] = "%\|%";
	        $pattern[14] = "%\\\%";
	        $pattern[15] = "%'%";
	        $pattern[16] = "%\"%";
	        $pattern[17] = "%;%";
	        $pattern[18] = "%~%";
	        $pattern[19] = "%\[%";
	        $pattern[20] = "%\]%";
	        $pattern[21] = "%\*%";
        	$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}

	public static function outputResponse($bool) {
		foreach($_POST as $key => $value) {
			if ($bool == TRUE) {
				if ($key == "RESPCODE") {
					echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
						<td width="50%" align="center" valign="middle"><font color=Red>***</font></td></tr>';
				} else if ($key == "RESPMSG") {
					echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
						<td width="50%" align="center" valign="middle"><font color=Red>This response is compromised.</font></td></tr>';
				} else {
					echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
						<td width="50%" align="center" valign="middle">'.$value.'</td></tr>';
				}
			} else {
				echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
					<td width="50%" align="center" valign="middle">'.$value.'</td></tr>';
			}
		}
		echo '<tr><td width="50%" align="center" valign="middle">Checksum Verified?</td>';
		if($bool == TRUE) {
			echo '<td width="50%" align="center" valign="middle">Yes</td></tr>';
			}
		else {
			echo '<td width="50%" align="center" valign="middle"><font color=Red>No</font></td></tr>';
		}
	}


	
// validate payment
function paytm_redirect_form_validate($order, $payment_method, $checksum_check) {
  echo $checksum_check;
  $bool= $checksum_check;

  $orderId =  $_REQUEST['ORDERID'];
  $responseCode = $_REQUEST['RESPCODE'];
  $responseDescription = $_REQUEST['RESPMSG'];
  $recd_checksum = $_REQUEST['CHECKSUMHASH'];
//$secret_key = $payment_method['settings']['secret_key'];
 echo "BBBBBBBBBBBBBBBB".$bool;
	
  $message = t('Security error ip Address was: @ip', array('@ip' => ip_address()));
  if ( $bool == TRUE && $responseCode == "01" ) {
     echo "CCCCCCCCCCCCCCC";
	return drupal_set_message(t('Thank you for shopping with us. Your account has been charged and your transaction is successful.'));
    echo "DDDDDDDDDDDDDDDDDDD";
	commerce_paytm_transaction($order, $payment_method);
  } 
  elseif ( $bool == TRUE && $responseCode != "01" ) {
    return drupal_set_message(('Thank you for shopping with us.However,the transaction has been declined.'));
    commerce_paytm_transaction($order, $payment_method);
  } 
 
  else {
    return drupal_set_message(t('Security Error. Illegal access detected. We will store your IP address.'), ERROR );
    watchdog('commerce_paytm', $message, NULL, WATCHDOG_ERROR);
  }
}

function commerce_paytm_transaction($order, $payment_method) {
// ask results from verify function
 
  $wrapper = entity_metadata_wrapper('commerce_order', $order);
  $currency = $wrapper->commerce_order_total->currency_code->value();
  $amount = $wrapper->commerce_order_total->amount->value();
  $transaction->instance_id = $payment_method['instance_id'];
  $transaction->amount = $amount;
  $transaction->currency_code = $currency;
  $transaction->remote_status = t('Success');
  $transaction->status = COMMERCE_PAYMENT_STATUS_SUCCESS;
  $transaction->message = t('Payment received at') . ' ' . date("d-m-Y H:i:s", REQUEST_TIME);
  commerce_payment_transaction_save($transaction);
}


// helper functions.. 



}
?>
