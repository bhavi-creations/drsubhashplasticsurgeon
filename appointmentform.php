<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: appointment.html');
    exit;
}

/* =========================
   GET FORM DATA
========================= */

$name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['contact_number'] ?? '');
$date = trim($_POST['appointment_date'] ?? '');
$time = trim($_POST['appointment_time'] ?? '');
$message = trim($_POST['message'] ?? '');

/* =========================
   VALIDATION
========================= */

if (
    empty($name) ||
    empty($email) ||
    empty($phone) ||
    empty($date) ||
    empty($time)
) {
    header('Location: appointment.html?error=1');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: appointment.html?error=1');
    exit;
}

/* =========================
   FORMAT DATE
========================= */

$formattedDate = $date;
$dateObject = DateTime::createFromFormat('Y-m-d', $date);

if ($dateObject) {
    $formattedDate = $dateObject->format('d-m-Y');
}

/* =========================
   SAFE VALUES FOR EMAIL
========================= */

$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safePhone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$safeDate = htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8');
$safeTime = htmlspecialchars($time, ENT_QUOTES, 'UTF-8');
$safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

/* =========================
   PHPMailer
========================= */

$mail = new PHPMailer(true);

try {

    /* =========================
       SMTP SETTINGS
    ========================= */

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sairampachipala00@gmail.com';

    /*
       Create a NEW Google App Password and paste it below.
       Do not use your normal Gmail password.
    */
    $mail->Password = 'hetpnbxyctpodhkv';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    /* =========================
       SENDER
    ========================= */

    $mail->setFrom(
        'sairampachipala00@gmail.com',
        'Dr. Subhash'
    );

    /* =========================
       RECEIVER
    ========================= */

    $mail->addAddress(
        'sairampachipala00@gmail.com',
        'Dr. Subhash'
    );

    /* =========================
       REPLY TO PATIENT
    ========================= */

    $mail->addReplyTo(
        $email,
        $name
    );

    /* =========================
       EMAIL
    ========================= */

    $mail->isHTML(true);
    $mail->Subject = 'New Appointment Form Submission';

    /* =========================
       EMAIL BODY
    ========================= */

    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>

    <body style="
        margin:0;
        padding:30px 15px;
        background:#f5efe6;
        font-family:Arial, Helvetica, sans-serif;
        color:#191919;
    ">

        <div style="
            max-width:620px;
            margin:0 auto;
            background:#ffffff;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 8px 30px rgba(73,45,22,0.12);
        ">

            <div style="
                background:linear-gradient(110deg, #ba822c, #ffee9a, #ba822c);
                padding:28px 35px;
            ">

                <div style="
                    font-size:13px;
                    letter-spacing:2px;
                    color:#5a3519;
                    margin-bottom:7px;
                ">
                    DR. SUBHASH
                </div>

                <div style="
                    font-size:28px;
                    line-height:1.2;
                    font-weight:700;
                    color:#18120e;
                ">
                    New Appointment
                </div>

            </div>

            <div style="padding:34px 35px;">

                <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; font-size:17px;">

                    <tr>
                        <td style="padding:13px 0; width:145px; font-weight:700; color:#332215;">Name:</td>
                        <td style="padding:13px 0; color:#242424;">'.$safeName.'</td>
                    </tr>

                    <tr>
                        <td style="padding:13px 0; font-weight:700; color:#332215;">Phone:</td>
                        <td style="padding:13px 0; color:#242424;">'.$safePhone.'</td>
                    </tr>

                    <tr>
                        <td style="padding:13px 0; font-weight:700; color:#332215;">Email:</td>
                        <td style="padding:13px 0;">
                            <a href="mailto:'.$safeEmail.'" style="color:#a56b36; text-decoration:none;">'.$safeEmail.'</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:13px 0; font-weight:700; color:#332215;">Date:</td>
                        <td style="padding:13px 0; color:#242424;">'.$safeDate.'</td>
                    </tr>

                    <tr>
                        <td style="padding:13px 0; font-weight:700; color:#332215;">Time Slot:</td>
                        <td style="padding:13px 0; color:#242424;">'.$safeTime.'</td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding-top:22px;">
                            <div style="font-weight:700; margin-bottom:10px; color:#332215;">Message:</div>
                            <div style="background:#f8f3ed; border-left:4px solid #ba822c; border-radius:7px; padding:16px; line-height:1.6; color:#333333;">
                                '.($safeMessage !== '' ? $safeMessage : 'No additional message.').'
                            </div>
                        </td>
                    </tr>

                </table>

            </div>

            <div style="padding:18px 35px; background:#f8f3ed; color:#82664f; font-size:13px; text-align:center;">
                Appointment enquiry submitted through Dr. Subhash website
            </div>

        </div>

    </body>
    </html>
    ';

    /* =========================
       PLAIN TEXT FALLBACK
    ========================= */

    $mail->AltBody =
        "New Appointment\n\n" .
        "Name: " . $name . "\n" .
        "Phone: " . $phone . "\n" .
        "Email: " . $email . "\n" .
        "Date: " . $formattedDate . "\n" .
        "Time Slot: " . $time . "\n" .
        "Message: " . $message;

    /* =========================
       SEND
    ========================= */

    $mail->send();

    /* =========================
       SUCCESS
    ========================= */

    header('Location: appointment.html?success=1');
    exit;

} catch (Exception $e) {

    /* =========================
       ERROR
    ========================= */

    header('Location: appointment.html?error=1');
    exit;
}

?>
