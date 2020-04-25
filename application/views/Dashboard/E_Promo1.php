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
        CURRENT PROMO
    </center>
</div>

<?php
    $i = 1;
?>
<table>
    <tr>
        <th>No</th>
        <th>Jenis Promo Promo</th>
                                            <th>Mulai Promo</th>
                                            <th>Akhir Promo</th>
    </tr>
    <?php
        foreach($promo as $list){
    ?>
    <tr>
        <td> <?php echo $i; $i++; ?></td>
        <td><?php 
                                                if($list->jenis_promo == 1)
                                                {
                                                    echo "Discount 10%";
                                                }
                                                else if($list->jenis_promo == 2)
                                                {
                                                    echo "Discount 15%";
                                                }
                                                else
                                                {
                                                    echo "Discount 20%";
                                                }
                                            ?></td>
                                            <td><?php $new_format = (new DateTime($list->tanggal_mulai))->format('d M Y'); echo $new_format; ?></td>
                                            <td><?php $new_format = (new DateTime($list->tanggal_selesai))->format('d M Y'); echo $new_format; ?></td>
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

$pdf->stream('listCurrentPromo.pdf', Array('Attachment'=>0));
?>