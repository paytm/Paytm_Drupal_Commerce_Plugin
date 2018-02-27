# Installation Steps
 1. Upload the contents of the folder named commerce_paytm into ../sites/all/modules/
 2. Enable the module at ../admin/build/modules
 3. Open ../sites/all/modules/commerce_paytm/posttopaytm.php then enter 
 4. Your secret key in the file.
 5. Enable Paytm as a payment method
 6. Enter your Paytm Merchant id and Secret key
 7. Set the Paytm payment mode to either one of the following:
   - Live(Value = 1)
   - Test(Value = 0)
 8. Save the changes.

# PLUGIN FILE DESCRIPTION:

The plugin has the following files.
 - commerce_paytm.info
 - commerce_paytm.module
 - posttopaytm.php
 - checksum.php
		
These are simple PHP files with different extensions 
 * commerce_paytm.info - This is simple file which has information about the payment module.
 * commerce_paytm.module - This is the core file which includes all the funcionalities for the module like posting cart information to Paytm with checksum and getting the response etc ..,  
 * posttopaytm.php - This is the php file which is responsible for posting the form to the Paytm API.
 * checksum.php - Cotains general functions to find checksum.
 
# SPECIAL NOTE
 Create a custom field for phone number named "phone number" and provide its machine name as "field_phone_number" at the checkout page. 

# Paytm PG URL Details
	staging	
		Transaction URL             => https://securegw-stage.paytm.in/theia/processTransaction
		Transaction Status Url      => https://securegw-stage.paytm.in/merchant-status/getTxnStatus

	Production
		Transaction URL             => https://securegw.paytm.in/theia/processTransaction
		Transaction Status Url      => https://securegw.paytm.in/merchant-status/getTxnStatus
