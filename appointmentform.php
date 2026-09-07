<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Access Denied');
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
    exit('Please fill all required fields.');
}


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

    $mail->Password = 'hetpnbxyctpodhkv';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;


    /* =========================
       SENDER
    ========================= */

    $mail->setFrom(
        'sairampachipala00@gmail.com',
        'Dr. Subhash Center for Plastic Surgery'
    );


    /* =========================
       RECEIVER
    ========================= */

    $mail->addAddress(
        'sairampachipala00@gmail.com',
        'Dr. Subhash Center for Plastic Surgery'
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

    $mail->Subject = 'New Appointment Request - Dr. Subhash';


    $mail->Body = "

        <h2>New Appointment Request</h2>

        <p>
            <strong>Patient Name:</strong>
            " . htmlspecialchars($name) . "
        </p>

        <p>
            <strong>Email:</strong>
            " . htmlspecialchars($email) . "
        </p>

        <p>
            <strong>Contact Number:</strong>
            " . htmlspecialchars($phone) . "
        </p>

        <p>
            <strong>Appointment Date:</strong>
            " . htmlspecialchars($date) . "
        </p>

        <p>
            <strong>Appointment Time:</strong>
            " . htmlspecialchars($time) . "
        </p>

        <p>
            <strong>Message:</strong><br>
            " . nl2br(htmlspecialchars($message)) . "
        </p>

    ";


    /* =========================
       SEND
    ========================= */

    $mail->send();


    /* =========================
       SUCCESS
    ========================= */

    echo "
    <script>

        alert('Your appointment request has been sent successfully.');

        window.location.href = 'appointment.html';

    </script>
    ";


} catch (Exception $e) {

    echo "
    <script>

        alert('Unable to send appointment request. Please try again.');

        window.location.href = 'appointment.html';

    </script>
    ";

}

?>