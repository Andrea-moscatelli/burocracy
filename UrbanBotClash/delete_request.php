<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $reason = htmlspecialchars($_POST['reason']);

    // Email configuration
    $to = "atypical.nerd.games@gmail.com";
    $subject = "Data Deletion Request from $fullName";
    $message = "You have received a data deletion request.\n\n" .
               "Full Name: $fullName\n" .
               "Email: $email\n" .
               "Reason for Request: $reason\n\n" .
               "Please take the appropriate action.";
    $headers = "From: no-reply@yourdomain.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<div class='container'>";
        echo "<p class='success'>Thank you, $fullName. Your request has been submitted successfully.</p>";
        echo "<a href='delete-request-index.html'>Back to form</a>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<p class='error'>There was an error submitting your request. Please try again.</p>";
        echo "<a href='delete-request-index.html'>Back to form</a>";
        echo "</div>";
    }
}
?>
