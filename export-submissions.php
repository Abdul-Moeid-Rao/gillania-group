<?php
$conn = new mysqli("localhost", "root", "", "gillania_db");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=submissions.xls");

echo "Full Name\tEmail\tPhone\tInquiry Type\tMessage\n";

$result = $conn->query("SELECT * FROM submissions");
while ($row = $result->fetch_assoc()) {
    echo "{$row['full_name']}\t{$row['email']}\t{$row['phone']}\t{$row['inquiry_type']}\t{$row['message']}\n";
}
$conn->close();
?>
