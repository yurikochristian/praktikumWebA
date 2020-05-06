<?php
echo "<tr>
    <td>
        <p style=\"margin-top: -100px;\">1</p>
    </td>
    <td>
        <div class=\"galeri\">
            <img src=\"gambar/".$books['pic']."\">
        </div>
    </td>
    <td>
        <div id=\"detail\">
            <p>Nama Buku : ".$books['judul']."</p>
            <p>Tahun Terbit : ".$books['tahun']."</p>
            <p>Nama Penulis : ".$books['penulis']."</p>
            <p>ISBN : ".$books['ISBN']."</p>
            <p>Kategori : ".$books['kategori']."</p>
            <p><a href=\"#\"><button class=\"button\">Pinjam Buku</button></a></p>
        </div>
    </td>
</tr>"
?>