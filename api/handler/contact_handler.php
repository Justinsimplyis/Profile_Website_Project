<?php
// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode(['success' => false, 'message' => 'Method not allowed.']));
}

// Detect if this is an AJAX request
 $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
          && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

// Route to handler
if (($_POST['action'] ?? '') === 'send_contact') {
    handleContact($isAjax);
} else {
    respond(['success' => false, 'message' => 'Invalid action.'], $isAjax);
}

function handleContact(bool $isAjax): void
{
    // Honeypot check
    if (!empty($_POST['website'])) {
        respond(['success' => true, 'message' => 'Message sent successfully.'], $isAjax);
    }

    // Sanitize inputs
    $name    = trim(htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'));
    $email   = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
    $subject = trim(htmlspecialchars($_POST['subject'] ?? '', ENT_QUOTES, 'UTF-8'));
    $message = trim(htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'));

    // Validation
    $errors = [];

    if (strlen($name) < 2 || strlen($name) > 100) {
        $errors[] = 'Name must be between 2 and 100 characters.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (strlen($subject) < 3 || strlen($subject) > 200) {
        $errors[] = 'Subject must be between 3 and 200 characters.';
    }

    if (strlen($message) < 10 || strlen($message) > 5000) {
        $errors[] = 'Message must be between 10 and 5 000 characters.';
    }

    if (!empty($errors)) {
        respond(['success' => false, 'message' => implode(' ', $errors)], $isAjax);
    }

    // Email Settings
    $to = "blupenny66@gmail.com";
    $email_subject = "Portfolio Contact: " . $subject;
    
    // Build a clean HTML email body
    $email_body = "
    <html>
    <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
        <h2 style='color: #ec6415;'>New Portfolio Message</h2>
        <hr style='border: 1px solid #eee;'>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> <a href='mailto:{$email}'>{$email}</a></p>
        <p><strong>Subject:</strong> {$subject}</p>
        <br>
        <p><strong>Message:</strong></p>
        <p style='background: #f9f9f9; padding: 15px; border-radius: 5px;'>" . nl2br($message) . "</p>
    </body>
    </html>";

    // Email Headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@justinplaatjies.com" . "\r\n"; // Change this to a domain-like email if needed
    $headers .= "Reply-To: {$email}" . "\r\n";

    // Send Email
    if (mail($to, $email_subject, $email_body, $headers)) {
        respond(['success' => true, 'message' => 'Message sent successfully! I will get back to you soon.'], $isAjax);
    } else {
        error_log("Mail failed to send from {$email}");
        respond(['success' => false, 'message' => 'Failed to send message. Please try again later.'], $isAjax);
    }
}

// Response helper
function respond(array $data, bool $isAjax): void
{
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }

    // Fallback for non-JS
    $status = $data['success'] ? 'success' : 'error';
    $msg = urlencode($data['message']);
    $referer = $_SERVER['HTTP_REFERER'] ?? '/index.php';
    $separator = (parse_url($referer, PHP_URL_QUERY) !== null) ? '&' : '?';
    header("Location: {$referer}{$separator}contact_status={$status}&contact_msg={$msg}");
    exit;
}