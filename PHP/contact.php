<?php
/*This is where the POST request is broken down and each item is stored in a variable for later processing.*/
$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];
$field_recaptcha = $_POST['g-recaptcha-response'];

/*The email address of the message recipient is put into a variable here, as well as a subject for the mail subject
field*/
$mail_to = 'rorywilliamsdoyle@outlook.com';
$subject = 'Message from a site visitor '.$field_name;

/*The message is constructed using the POST request data here and stored for transmission.*/
$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

/*The sender of the email has there email address that the entered into the contact form added to the appropriate
headers here.*/
$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

/*This outer most section of logic handles the reCAPTCHA response. Transmission of the email is only attempted if the
reCAPTCHA was successful.*/
if ($field_recaptcha) {
    /*The mail function, a PHP inbuilt, is now called and the status of the email, if it was sent successfully or not,
    is stored.*/
    $mail_status = mail($mail_to, $subject, $body_message, $headers);
    /*If the message was mailed correctly then a alert box will tell the user there message was sent. Otherwise, another
    alert box will pop-up to tell the user that there message failed to send.*/
    if ($mail_status) { ?>
        <script language="javascript" type="text/javascript">
            alert('Thank you for the message. I will contact you as soon as possible.');
            window.location = 'https://www.rorywilliamsdoyle.com/index.html';
        </script>
    <?php
    }
    else { ?>
        <script language="javascript" type="text/javascript">
            alert('Message failed. Please try again later.');
            window.location = 'https://www.rorywilliamsdoyle.com/index.html';
        </script>
    <?php
    }
}
else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed. Please try again later.');
        window.location = 'https://www.rorywilliamsdoyle.com/index.html';
    </script>
<?php
 }
?>
