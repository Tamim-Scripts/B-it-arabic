<?php
if (isset($_POST['firstname'], $_POST['email'], $_POST['message'])) {

    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST['message']));

    // Set your email address where you want to receive emails
    $to = 'tamim.bit.co@gmail.com';

    $subject = 'Contact Request From Website';
    $email_content = "First Name: $firstname\n";
    $email_content .= "Last Name: $lastname\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $firstname <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $email_content, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }

} else {
    echo 'error: missing fields';
}
?>


