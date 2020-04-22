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
        ADMIN
    </center>
</div>

<table>
    <tr>
        <th>ID Admin</th>
        <th>Nama Admin</th>
        <th>Keterangan</th>
    </tr>
    <?php
        foreach($admin as $list){
    ?>
    <tr>
        <td> <?php echo $list->id_admin ?></td>
        <td> <?php echo $list->nama_admin ?></td>
            <td> 
                <?php
                    if($list->level_admin == 1)
                    {
                    echo "Super Admin";
                    } 
                    else
                    {
                    echo "Admin";
                    } 
                ?>
            </td>
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

$pdf->stream('listAdmin.pdf', Array('Attachment'=>0));
?>