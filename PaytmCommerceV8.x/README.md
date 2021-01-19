# Commerce Paytm

  1. Upload the plugin folder "commercepaytm" into /modules/ using FTP (Filezilla/Live FTP).
  2. Activate the plugin from Drupal admin panel.(Extend -> COMMERCE(CONTRIB) -> Commerce Paytm).
  3. Add Paytm as a payment option from menu list.(Commerce -> Configuration -> Payment -> Payment Gateways).
  3. Select Paytm from plugin option and insert Paytm configuration values provided by Paytm team.

      * Merchant ID               - MID provided by Paytm
      * Merchant Key              - Key provided by Paytm
      * Merchant Website          - Provided by Paytm
      * Industry type             - Provided by Paytm
      * Channel ID                - WEB/WAP
      * Transaction URL
        * Staging     - https://securegw-stage.paytm.in/theia/processTransaction
        * Production  - https://securegw.paytm.in/theia/processTransaction
      * Transaction Status URL
        * Staging     - https://securegw-stage.paytm.in/merchant-status/getTxnStatus
        * Production  - https://securegw.paytm.in/merchant-status/getTxnStatus
  4. Your Commerce plug-in is now installed. You can accept payment through Paytm.

# In case of any query, please contact to Paytm.