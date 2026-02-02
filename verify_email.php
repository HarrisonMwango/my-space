<?php
header("Content-Type: application/json");
require_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"), true);

$email = $data["email"] ?? "";
$otp = $data["otp"] ?? "";
$username = $data["username"] ?? "";
$password = $data["password"] ?? "";

if (!$email || !$otp || !$username || !$password) {
    http_response_code(400);
    echo json_encode(["error" => "Missing fields"]);
    exit;
}

$stmt = $pdo->prepare(
    "SELECT id, otp_code, otp_expires_at FROM users WHERE email=?"
);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || $user["otp_code"] !== $otp) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid OTP"]);
    exit;
}

if (strtotime($user["otp_expires_at"]) < time()) {
    http_response_code(401);
    echo json_encode(["error" => "OTP expired"]);
    exit;
}

$hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $pdo->prepare(
    "UPDATE users 
     SET username=?, password_hash=?, email_verified=1, otp_code=NULL, otp_expires_at=NULL
     WHERE email=?"
);

$stmt->execute([$username, $hash, $email]);

echo json_encode(["message" => "Account created successfully"]);
