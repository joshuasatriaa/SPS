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
        BARANG
    </center>
</div>

<?php
    $i = 1;
?>
<table>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Nama Penjual</th>
        <th>Email Penjual</th>
        <th>Harga Barang</th>
    </tr>
    <?php
        foreach($barang1 as $list){
    ?>
    <tr>
        <td> <?php echo $i; $i++; ?></td>
        <td> <?php echo $list->nama_barang ?></td>
        <td> <?php 
                    if($list->nama_pengguna != null)
                    {
                        echo $list->nama_pengguna;   
                    }
                    else
                    {   
                        echo $list->nama_bengkel;
                    }
            ?>
        </td>
        <td> <?php 
                    if($list->email_a != null)
                    {
                        echo $list->email_a;
                    }
                    else
                    {
                        echo $list->email_b;
                    } 
                ?>
        </td>
        <td> <?php echo $list->harga_barang ?></td>
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

$pdf->stream('listBarang.pdf', Array('Attachment'=>0));
?>