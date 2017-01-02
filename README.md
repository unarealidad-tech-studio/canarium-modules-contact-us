# ContactUs

A module that allows canarium to have contact us functionality.

Recaptcha can be enabled for added security.

# Installation

Install via composer: 

`composer require unarealidad/canarium-modules-contact-us dev-master`

Add `ContactUs` to your Appmaster's `config/application.config.php` or your Appinstance's `config/instance.config.php` under the key `modules`

Copy the sample config `config/canariumcontactus.local.php.dist` to your Appinstance's `config/autoload/` directory and remove the `.dist` extension.

Go to your Appinstance directory and run the following to update your database:

`./doctrine-module orm:schema-tool:update --force`

# Configuration

Configuration main key: `canariumcontactus`
Sample Config file: `config/canariumcontactus.local.php.dist`

Config Item | Sample Value | Required | Description
--- | --- | --- | ---
email_sender | `array('email' => 'someone@someone.com', 'name' => 'Someone')` | true | An array with `email` and `name` key that will be used as the sender of the email
email_admin | 'admin@contactus.com' | true |The email address of the recipient of all submitted data
email_subject | 'Sample Subject' | true | The subject for the sender's success email
email_admin_subject | 'Admin Subject' | true | The subject for the recipient success email

# Exposed Pages

URL | Template | Access | Description
----- | ----- | ----- | ----- | -----
   /contact-us | contact-us/index.phtml | Public | Displays the contact form and processes the request
   /contact-us/thank-you | contact-us/thank-you.phtml | Public | Displays the thank you page after the contact form has been successfully submitted.
   /admin/contact-us | admin/index.phtml | Admin | Displays the list of submitted items
  

\* All template locations are relative to the Appinstance root's /public/templates/contact-us/. Sample templates are provided in the module's view/ directory.

# Additional Customization

## Email Templates

Template | Description
--------- | --------
/public/templates/contact-us/email.phtml | The email sent to the sender
/public/templates/contact-us/email-admin.phtml | The email sent to the admin

# Exposed Services
`canariumcontactus_contactus_service` - Main service. Handles the sending of emails after successful submission.
