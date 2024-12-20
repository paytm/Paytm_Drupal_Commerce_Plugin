<?php
class PaytmConstants{
	CONST PRODUCTION_HOST						= "https://secure.paytmpayments.com/";
	CONST STAGING_HOST							= "https://securestage.paytmpayments.com/";

	CONST ORDER_PROCESS_URL						= "order/process";
	CONST ORDER_STATUS_URL						= "order/status";
	CONST INITIATE_TRANSACTION_URL				= "theia/api/v1/initiateTransaction";
	CONST CHECKOUT_JS_URL						= "merchantpgpui/checkoutjs/merchants/MID.js";

	CONST SAVE_PAYTM_RESPONSE 					= true;
	CONST CHANNEL_ID							= "WEB";
	CONST APPEND_TIMESTAMP						= true;
	CONST ONLY_SUPPORTED_INR					= true;
	CONST X_REQUEST_ID							= "PLUGIN_DRUPALCOMMERCE_" . VERSION;

	CONST MAX_RETRY_COUNT						= 3;
	CONST CONNECT_TIMEOUT						= 10;
	CONST TIMEOUT								= 10;

	CONST LAST_UPDATED							= "20241220";
	CONST PLUGIN_VERSION						= "2.3";

	CONST CUSTOM_CALLBACK_URL					= "";
	CONST IS_BLINK_SUPPORTED					= true;
}
?>