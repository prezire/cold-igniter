ColdIgniter
============
by prezire
prezire@gmail.com

Inspired by my lazy self. Includes simple features to make you more productive that were missing in CodeIgniter 2.1.0.

- Generate easy CRUDs with simple commands. See application/controllers/generate.php for command-line implementation
- Foundation Framework 5 for responsive layout (Cold Foundation)
- See application/helpers for the list of Helpers including CSV generator
- See public/js/fb.js for easy Facebook integration. See $(document).ready() for a one-liner implementation of custom Facebook button
- See public/libs for 3rd-party libraries
  - DataTables
  - Select2
  - Font Awesome
  - LightBox
  - LiquidImage
  - Slick
  - Masonry
- See application/views/generators/auth for basic Auth files such as login and register
- PayPal
  - Refer to libraries/sparks/payments
	- Basic payments using DirectPayment and ExpressCheckout
	- Recurring payment to be included
    - http://tareqalam.com/2010/07/07/paypal-recurring-payment-integrated-with-codeigniter/
    - http://ci-merchant.org/
    - http://stackoverflow.com/questions/21846374/recurring-payment-in-paypal-with-codeigniter-website
- More CRUD commands and properties to be included
	- generate crud employee id:int linked_to:user
    - linked_to:user
			- Generates an indexed user_id in the DB to be used as foreign key
			- Generates a hidden tag in the update view
- AJAX MailChimp to be included