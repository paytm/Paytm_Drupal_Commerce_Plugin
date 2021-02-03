# Installation Steps
 1. Upload the contents of the folder named commerce_paytm into ../sites/all/modules/
 2. Enable the module at ../admin/build/modules
 3. Go to Store->Configuration->Payment Methods->paytm
 4. Click Enable Payment Method
 5. Enter the all the details there provided by Paytm
 6. Save the changes.

# PLUGIN FILE DESCRIPTION:

The plugin has the following files.
 - commerce_paytm.info
 - commerce_paytm.module
 - /library/paytm/PaytmChecksum.php
 - /library/paytm/PaytmConstants.php
 - /library/paytm/PaytmHelper.php
		
These are simple PHP files with different extensions 
 * commerce_paytm.info - This is simple file which has information about the payment module.
 * commerce_paytm.module - This is the core file which includes all the funcionalities for the module like posting cart information to Paytm with checksum and getting the response etc ..,  
 * PaytmConstants.php - This is the php file which is responsible for storing constant values like PG url's etc.
 * PaytmChecksum.php - Cotains general functions to find checksum.
 * PaytmHelper.php - This is the php file which is responsible for storing functions.
 
# SPECIAL NOTE
 Create a custom field for phone number named "phone number" and provide its machine name as "field_phone_number" at the checkout page. 

