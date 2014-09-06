<?php

require_once 'vendor/autoload.php';    // Include the mailer package

   // Only process POST requests
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get form field data and sanitize input
      $name = strip_tags($_POST['name']);
      $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
      $subject = strip_tags($_POST['subject']);
      $message = nl2br(htmlentities($_POST['message']));

      $body = "Name: $name<br><br>" . $message;    // Set e-mail body message

      // Validate data
      if(empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
         echo "Oops! An error occurred, please complete the form and try again.";   // Invalid data message
         exit;
      }

      // Set-up mailer
      $m = new PHPMailer;
      $m->isSMTP();        // Assuming SMTP is used
      $m->SMTPAuth = true;
      $m->Host = '';       // Ex: smtp.gmail.com
      $m->Username = '';   // Set e-mail account here, ex: youremail@sample.com
      $m->Password = '';   // Password for your e-mail account
      $m->SMTPSecure = ''; // Ex: ssl, tls, etc.
      $m->Port = 465;      // Change to desired port, currently set to 465 assuming GMail account

      // Set-up e-mail headers and body
      $m->From = $email;
      $m->FromName = $name;
      $m->addReplyTo($email, 'Reply address');
      $m->addAddress('Your e-mail address', 'Name goes here, ex: Patrick Stearns');
      $m->Subject = $subject;
      $m->Body = $body;
      $m->AltBody = $body;

      // Send E-mail
      if ($m->send()) {
         // echo "Thank you $name! Your message has been sent."; // Comment out this line and remove line below
                                                                 // if not using Ajax.
         echo json_encode(array(    // Set Ajax callback data here; Add anything to the array you wish to pass back.
            'name' => $name
         ));
      }
      else {
         echo "Oops! Something went wrong and your message could not be delivered.";  // Something went wrong sending
                                                                                      // message.
      }
   }
   else {   // Not a POST request
      echo "There was a problem with your submission, please try again.";
   }