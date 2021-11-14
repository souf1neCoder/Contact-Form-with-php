<?php
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$website = htmlspecialchars($_POST['website']);
$message = htmlspecialchars($_POST['message']);
if (!empty($email) && !empty($message)) {
    if (filter_var($website, FILTER_VALIDATE_URL)) {
        //
        require_once 'mail.php';
        //
        $mail->setFrom('exemple@gmail.com', 'souf1neCoder');
        $mail->addAddress($email);
        $mail->Subject = "From : $username";
        $mail->Body    = "Username : $username <br>
                    Email : $email <br>
                    Phone : $phone <br>
                    Website : $website <br>
                    Message : $message";

        //
        if ($mail->send()) {

            echo  "Your message has been sent";
        }


    } else {
        echo "Enter a valid  website url!";
    }
} else {
    echo "Email and message field is required";
}
