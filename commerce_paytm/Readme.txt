
Payment Module : Paytm
*****************************
   
	 Paytm - Simplifying payments in India 
		
		Our aim is to solve the payment pain points for eCommerce in India.
		
**************************************************************************************		

An installation procedure for the module:
   
		- Get a merchant account from Paytm
		- Unzip the contents of the module (or upload the unzipped folder named commerce_paytm) at 
		   ../sites/all/modules/commerce/modules/payment/
		- Enable the module at ../admin/build/modules
		- open ../sites/all/modules/commerce/modules/payment/commerce_paytm/posttopaytm.php and  ../sites/all/modules/commerce/modules/payment/commerce_paytm/response.php .Then, enter 
		  your secret key in both the files.
		- Enable Paytm as a payment method
		- Enter your Paytm Merchant id and Secret key, set the Paytm payment mode 
		   to Live(Value = 1) or Test(Value = 0) and save the changes.
		
**********************************************************************************************************		

DESCRIPTION :

		When you Extract the zip file, it has five files
				- commerce_paytm.info
				- commerce_paytm.module
				- posttopaytm.php
				- response.php
				- checksum.php
		
		These are simple PHP files with different extensions 
		
			* commerce_paytm.info - This is simple file which has information about the payment module.
			* commerce_paytm.module - This is the core file which includes all the funcionalities for the 
										module like posting cart information to Paytm with checksum and 
										getting the response etc ..,  
			* posttopaytm.php - This is the php file which is responsible for posting the form to the Paytm API.
			* response.php - This is the php file used to receive the response from Paytm API.			
			* checksum.php - Cotains general functions to find checksum.
										
***************************************************************************************************************************

SPECIAL NOTES :

- Create a custom field for phone number named "phone number" name its machine name as "field_phone_number" at checkout page. 


****************************************************************************************************************************************
