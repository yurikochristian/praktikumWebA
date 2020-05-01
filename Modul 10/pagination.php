<?php
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 0;
?>
<html>
<head>
    <title>PHP Pagination</title>
</head>
<body>
<center>
    <h1>PHP Pagination</h1>
    <?php
        for($i=($page*8);$i<($page+1)*8;$i++){
            $disp = $i+1;
            echo "Item $disp <br><br>";
        }
    ?>
    <br>
    <p>Page:</p>
    <?php
        for($i=0;$i<6;$i++){
            $disp = $i+1;
            if($i == $page){
            echo $disp." ";
            }
            else{
            echo "<a href='?halaman=$i'>$disp </a>";
            }
        }
    ?>
</center>
</body>
</html>