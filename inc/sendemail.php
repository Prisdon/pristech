<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "prisdon33@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = "You have a message from your Website";

    // Set the email headers
    $headers = "From: $name <$from>\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    // Define the fields to include in the email body
    $fields = array(
        "name" => "Name",
        "email" => "Email",
        "phone" => "Phone",
        "web" => "Website",
        "message" => "Message",
    );

    // Create the email body
    $body = "Here is the message you got:\n\n";
    foreach ($fields as $field => $label) {
        if (isset($_POST[$field])) {
            $body .= "$label: " . $_POST[$field] . "\n";
        }
    }

    // Send the email
    $send = mail($to, $subject, $body, $headers);

    // Check if the email was sent successfully
    if ($send) {
        echo "success"; // You can use this response in your AJAX handling on the frontend
    } else {
        echo "error"; // You can use this response in your AJAX handling on the frontend
    }
} else {
    echo "Invalid request method.";
}
?>
