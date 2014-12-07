Cold Igniter
============
by prezire
prezire@gmail.com

Inspired by my lazy self. Includes simple features to make you to be more productive that were missing in CodeIgniter 2.1.0.

- Generate easy CRUDs with simple commands. See application/controllers/generate.php for command-line implementation
- Responsive layout is due to Foundation Framework 5 integration
- See application/helpers for the list of Helpers including CSV generator
- See public/js/fb.js for easy Facebook integration. See $(document).ready() for a one-liner implementation of custom Facebook button
- See public/libs for 3rd-party libraries
  - DataTables
  - Select2
  - Font Awesome
  - LightBox
  - ImageLiquid - https://github.com/karacas/imgLiquid
  - Slick Carousel - http://kenwheeler.github.io/slick
  - Masonry
- See application/views/generators/auth for basic Auth files such as login and register
- PayPal to be included
	- Basic payment
	- Recurring payment
- Advanced Auth to be included
	- Privileges, permissions and roles
- More CRUD commands and properties to be included
	- generate crud employee id:int avatar:image linked_to:user date_of_birth:datetime gender:enum['Male', 'Female']
		- avatar:image
			- Generates an image_path in the DB using VARCHAR type
			- Generates a multiple upload code form in view and upload array in model using data_helper
		- linked_to:user
			- Generates an indexed user_id in the DB to be used as foreign key
			- Generates a hidden tag in the update view
    - gender:enum
      - Generates a dropdown in view for small list only. Use linked_to:list_table
      when using a longer list
- AJAX MailChimp (Server-side not needed to communicate with email marketing services)