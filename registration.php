<?php
header("Content-Type: application/json");
require_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"), true);

$email = filter_var($data["email"] ?? "", FILTER_VALIDATE_EMAIL);

if (!$email) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid email"]);
    exit;
}

$otp = random_int(100000, 999999);
$expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() === 0) {
    $stmt = $pdo->prepare(
        "INSERT INTO users (email, otp_code, otp_expires_at) VALUES (?, ?, ?)"
    );
    $stmt->execute([$email, $otp, $expiry]);
} else {
    $stmt = $pdo->prepare(
        "UPDATE users SET otp_code=?, otp_expires_at=? WHERE email=?"
    );
    $stmt->execute([$otp, $expiry, $email]);
}

/*
⚠️ TEMPORARY (for testing)
Later we’ll send email properly
*/
echo json_encode([
    "message" => "OTP sent",
    "otp" => $otp
]);
