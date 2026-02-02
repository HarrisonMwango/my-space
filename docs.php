<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="docs.css">
<meta charset="UTF-8">
<title>MySpace | Documents</title>

</head>

<body>

<header>📄 Documents</header>

<div class="container">

    <div class="top-bar">
        <input type="text" placeholder="Search documents... (.pdf, .docx, .csv, .xlsx)">
        <button class="upload-btn">+ Upload Document</button>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>budget_2026.csv</td>
            <td>120 KB</td>
            <td class="actions">
                <button class="view">View</button>
                <button class="download">Download</button>
                <button class="delete">Delete</button>
            </td>
        </tr>
    </table>

</div>

</body>
</html>
