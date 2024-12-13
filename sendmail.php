<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['form_name']);
    $email = htmlspecialchars($_POST['form_email']);
    $subject = htmlspecialchars($_POST['form_subject']);
    $phone = htmlspecialchars($_POST['form_phone']);
    $message = htmlspecialchars($_POST['form_message']);

    // Prepare email
    $to = " anuragkas@gmail.com";
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    ";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href = './';</script>";
    } else {
        echo "<script>alert('Failed to send the message. Please try again.'); window.history.back();</script>";
    }
} else {
    // Redirect to form if accessed directly
    header("Location: ./");
    exit;
}
?>
