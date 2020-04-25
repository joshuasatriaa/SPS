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
        Pengguna
    </center>
</div>

<?php
    $i = 1;
?>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Telepon</th>
    </tr>
    <?php
        foreach($user as $list){
    ?>
    <tr>
        <td> <?php echo $i; $i++; ?></td>
        <td><?php echo $list->nama_pengguna ?></td>
        <td><?php   
                                                    if($list->jenis_kelamin == 1)
                                                    {
                                                        echo "Laki-Laki";
                                                    } 
                                                    else
                                                    {
                                                        echo"Perempuan";
                                                    }?></td>
                                            <td><?php echo date("d F Y",strtotime($list->tanggal_lahir)) ?></td>
                                            <td><?php echo $list->tempat_lahir ?></td>
                                            <td><?php echo $list->alamat ?></td>
                                            <td><?php echo $list->email ?></td>
                                            <td><?php echo $list->telepon ?></td>
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