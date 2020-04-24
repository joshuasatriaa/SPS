<?php

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    $pdf = new Dompdf();

    ob_start();

?>

<!-- HTML -->

<!-- CSS -->
<style>

@import url("https://fonts.googleapis.com/css?family=Oswald&display=swap");

@page
{   
    font-family: 'Oswald', sans-serif;
    margin-top:3%;background-color: #E7E5E5;
}

table 
{
    border-collapse: collapse;
    width: 100%;
    margin-left:35px;
    margin-right:60px;
    margin-top:20px;
}

th, td 
{
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

td
{
    color: #369BB6;
}

</style>

<!-- Body -->
<div  style="letter-spacing: 10px;font-size:30px;">
    <center>
        BengCool
    </center>
</div>

<hr style = "margin-left:55px;margin-right:55px;color:#369BB6;">

<div style="font-size:20px;color:#369BB6;">
    <center>
        ORDERS
    </center>
</div>

<?php
    $i = 1;
?>
<table>
    <tr>
        <th>No</th>
        <th>Nama Pembeli</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Status Pesanan</th>
        <th>Waktu Pesanan</th>
    </tr>
    <?php
        foreach($pesanan as $list){
    ?>
    <tr>
        <td> <?php echo $i; $i++; ?></td>
        <td><?php echo $list->nama_pengguna ?></td>
        <td><?php echo $list->nama_barang ?></td>
        <td><?php echo $list->jumlah_barang ?></td>
        <td><?php echo ($list->status_pesanan == 1) ? "Sudah dibayar" : "Masuk ke Cart" ?></td>
        <td><?php echo date("d F Y, H:i",strtotime($list->waktu_pesanan)) ?></td>
    </tr>
    <?php
        }
    ?>
</table>

<?php

$html=ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('A4','landscape');

$pdf->render();

$pdf->stream('Orders.pdf', Array('Attachment'=>0));
?>