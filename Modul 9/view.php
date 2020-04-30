<?php
    include_once('db-con.php');
    $database = new database();
?>
<html>
<head>
    <title>Tugas CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
</head>
<body>
    <div style="width:40vw;margin:80px auto;">
        <a href="index.php" style="display:flex;"><img src="img/left-arrow.png" style="height:32px;margin-right:20px"><h3 style="color:#29aae3;margin-bottom:30px;height:40px;">Data Pengguna</h3></a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php $database->view(); ?>
        </tbody>
        </table>
    </div>
</body>
</html>