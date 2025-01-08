<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Check if the required fields are not empty
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

        // Email recipient
        $to = "mellouzati@gmail.com";

        // Email subject
        $email_subject = "Contact Form: " . $subject;

        // Construct the email message
        $email_message = "You have received a new message from the contact form.\n\n";
        $email_message .= "Name: " . $name . "\n";
        $email_message .= "Email: " . $email . "\n\n";
        $email_message .= "Message:\n" . $message . "\n";

        // Set email headers
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $email_subject, $email_message, $headers)) {
            echo "Your message has been sent. Thank you!";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request.";
}
?>
