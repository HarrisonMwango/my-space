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
    <link rel="stylesheet" href="movies.css">
<meta charset="UTF-8">
<title>MySpace | Movies</title>

</head>

<body>

<header>🎬 Movies</header>

<div class="container">

    <div class="top-bar">
        <input type="text" placeholder="Search movies...">
        <button class="upload-btn">+ Upload Movie</button>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>Inception.mp4</td>
            <td>1.4 GB</td>
            <td class="actions">
                <button class="watch">Watch</button>
                <button class="download">Download</button>
                <button class="delete">Delete</button>
            </td>
        </tr>
    </table>

</div>

</body>
</html>
