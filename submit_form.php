<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $service = htmlspecialchars(trim($_POST['service']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "cyberinfinitytesthelp@hotmail.com"; // Your email address
    $subject = "New Quote Request from $name";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mobile: $mobile\n";
    $body .= "Service: $service\n";
    $body .= "Message: $message\n";

    // Additional headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your request, $name. We will get back to you soon!";
    } else {
        echo "Sorry, there was an error sending your request. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>