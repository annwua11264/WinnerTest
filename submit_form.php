<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect.php';

$userType = $_POST['userType'];

if ($userType === 'individual') {
    $fullName = $_POST['fullName'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';

    $sql = "INSERT INTO users (user_type, full_name, address, phone, email)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $userType, $fullName, $address, $phone, $email);

} elseif ($userType === 'corporate') {
    $companyName = $_POST['companyName'] ?? '';
    $taxId = $_POST['taxId'] ?? '';
    $companyAddress = $_POST['companyAddress'] ?? '';
    $companyPhone = $_POST['companyPhone'] ?? '';
    $companyEmail = $_POST['companyEmail'] ?? '';

    $sql = "INSERT INTO users (user_type, company_name, tax_id, company_address, company_phone, company_email)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $userType, $companyName, $taxId, $companyAddress, $companyPhone, $companyEmail);
} else {
    die("ไม่สามารถระบุประเภทผู้ใช้งานได้");
}

if ($stmt->execute()) {
    echo "✅ บันทึกข้อมูลเรียบร้อยแล้ว!";
} else {
    echo "❌ เกิดข้อผิดพลาด: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
