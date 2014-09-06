$(document).ready(function() {         // Document ready state

   // Ajax Contact Form
   var form = $('#contact-form');      // Cache form selector

   $(form).submit(function(event) {    // Form submit listener

      event.preventDefault();          // Prevent default form submit action

      // Get form input
      var name = $('#name').val();
      var email = $('#email').val();
      var subject = $('#subject').val();
      var message = $('#message').val();
      var formData = {
                        name: name,
                        email: email,
                        subject: subject,
                        message: message
                     };
      $.ajax({    // Begin Ajax request
         type: 'POST',
         url: 'contact.php',
         data: formData,
         beforeSend: function() {   // Show loading message during sending message process
            $('form .form-body').css('text-align', 'center').html(
               '<p>' + '<img src="./message-loading.GIF" alt="Sending Message">' +
                       '&nbsp;&nbsp;&nbsp;' + 'Sending Message...' +
               '</p>'
            );
         },
         success: function(data) {  // Show success message if message sent successfully
            var respData = $.parseJSON(data);

            $('form .form-body').css('text-align', 'center').html(
               '<p>' + 'Thank you ' + respData.name + ', your message was sent successfully!' + '<br>' +
               '</p>'
            );
         },
         error: function() {     // Show error message if unable to send message
            $('form .form-body').css('text-align', 'center').html(
               '<p>' + 'Oops, something went wrong. Please refresh the page and try again.' + '<br>' +
               '</p>'
            );
         }
      });

   });

});