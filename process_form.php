<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate fields
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Set the recipient email address
        $to = 'cyberinfinityhelp@outlook.com'; // Your email address

        // Create email subject and body
        $email_subject = "New Contact Form Submission: $subject";
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Subject: $subject\n";
        $email_body .= "Message:\n$message\n";

        // Set email headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Error sending message.";
        }
    } else {
        echo "Please fill all the fields.";
    }
} else {
    echo "Invalid request method.";
}
?>