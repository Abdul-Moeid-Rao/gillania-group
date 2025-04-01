<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// ✅ DB connection
$conn = new mysqli("localhost", "root", "", "gillania_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Fetch data
$result = $conn->query("SELECT * FROM submissions ORDER BY id DESC");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Submissions</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    h2 {
      margin-bottom: 24px;
      text-align: center;
      color: #222;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table thead {
      background-color: #333;
      color: #fff;
    }

    table th, table td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table tbody tr:hover {
      background-color: #f0f0f0;
    }

    .btn-export {
      display: inline-block;
      margin-top: 20px;
      background-color: #333;
      color: #fff;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
    }

    .btn-export:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h2>Gillania Group – Contact Form Submissions</h2>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Inquiry Type</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $count = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$count}</td>
                  <td>{$row['full_name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['inquiry_type']}</td>
                  <td>{$row['message']}</td>
                </tr>";
          $count++;
        }
        ?>
      </tbody>
    </table>

    <a href="export-submissions.php" class="btn-export">📥 Export to Excel</a>
    <a href="logout.php">Logout</a>

  </div>
</body>
</html>

<?php $conn->close(); ?>
