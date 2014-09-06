<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>AJAX/PHP Contact Form</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="styles.css">
   </head>
   <body>
      <form id="contact-form" action="contact.php" method="post" class="form-horizontal"> <!-- Begin Ajax form -->
         <h2>Contact Us</h2>
         <div class="form-body">
            <div class="form-group">
               <label for="Name" class="col-sm-3 control-label">Name</label>
               <div class="col-sm-8">
                  <input id="name" type="text" name="name" class="form-control" placeholder="Full name" required>
               </div>
            </div>
            <div class="form-group">
               <label for="email" class="col-sm-3 control-label">E-mail</label>
               <div class="col-sm-8">
                  <input id="email" type="email" name="email" class="form-control" placeholder="Example@example.com" required>
               </div>
            </div>
            <div class="form-group">
               <label for="subject" class="col-sm-3 control-label">Subject</label>
               <div class="col-sm-8">
                  <input id="subject" type="text" name="subject" class="form-control" placeholder="Subject" required>
               </div>
            </div>
            <div class="form-group">
               <label for="message" class="col-sm-3 control-label">Message</label>
               <div class="col-sm-8">
                  <textarea id="message" name="message" rows="6" class="form-control" placeholder="Enter message..." required></textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="btn-offset col-sm-3 col-sm-offset-9">
                  <button type="submit" class="btn btn-lg btn-danger">Send</button>
               </div>
            </div>
         </div>
      </form> <!-- End Ajax form -->

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="contact.js"></script>
   </body>
</html>