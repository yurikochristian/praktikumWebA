<?php
include_once('db-con.php');
$database = new database();
$query="select * from buku";
if(isset($_POST['filter'])){
  $keyword=$_POST['katakunci'];
  $option=$_POST['option'];
  $conditions=array();
  if(! empty($keyword))
    $conditions[] = "judul LIKE '%$keyword%'";
  if(! empty($option))
    $conditions[] = "kategori='$option'";
  $query;
  if (count($conditions) > 0) {
    $query .= " WHERE " . implode(' AND ', $conditions);
  }
  if(! empty($_POST['sort']))
    $query .= " ORDER BY " . $_POST['sort'] . " " . $_POST['order'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="css/galeri.css">
</head>

<body>
    <div id="main-content">
        <div id="atas"> 
            <img src="gambar/perpustakaan.jpg" alt="" style="height: 250px; width: 700px;">
            <p style="color: white; font-weight: bolder;">PERPUSTAKAAN ILMU KOMPUTER</p>
        </div>
        <div id="sidebar">
            <img src="gambar/himakom.png" alt="" style="height: auto; width: 240px;">
            <div class="populer">
                <p>Artikel Populer</p>
            </div>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="galeri.html">GALERI</a></li>
                <li><a href="tentang.html">TENTANG</a></li>
                <li><a href="kontak.html">KONTAK</a></li>
            </ul>

        </div>
        <div id="menu">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="galeri.html">GALERI</a></li>
                <li><a href="tentang.html">TENTANG</a></li>
                <li><a href="kontak.html">KONTAK</a></li>
            </ul>
        </div>
        <div id="isi">
            <h1>Data Buku</h1>
            <form action="galeri.php" method="post">
                <input type="text" placeholder="Search Keyword.." name="katakunci" id="mySearch">
                <select style="width: 150px;height: 47px;border:solid 1px lightgrey;margin-top:-25px;" name="option">
                <option value="" >Kategori</option>
                <?php 
                        $query2 = "SELECT DISTINCT kategori FROM buku";
                        $rs = mysqli_query($database->koneksi, $query2);
                        while ($cat = mysqli_fetch_assoc($rs)){
                        echo '<option value="'.$cat['kategori'].'">'.$cat['kategori'].'</option>';
                        }
                ?>
                </select>
                <br>
                <label>Sort By</label>
                <select style="width: 150px;height: 47px;border:solid 1px lightgrey;" name="sort">
                    <option value="id_buku">None..</option>
                    <option value="judul">Alfabet</option>
                    <option value="tahun">Tahun</option>
                </select>
                <select style="width: 150px;height: 47px;border:solid 1px lightgrey;" name="order">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
                <button type="submit" class="button" name="filter">Apply Filter</button>
            </form>
            <table style="width: 700px; border: none;">
            <?php
                $result = mysqli_query($database->koneksi, $query);
                while($books = mysqli_fetch_assoc($result)){
                    require "galeri-list.php";
                } 
            ?>
            </table>
            <br>
        </div>
        <div id="clear"></div>
    </div>
</body>

</html>