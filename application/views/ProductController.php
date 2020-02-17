<?php
require_once('config.php');

$action = $_REQUEST['action'];

if($action == "show-all"){
	$stmt=$db->prepare('SELECT * FROM barang');
	$stmt->execute();
}
elseif($action == "2"){
	$stmt=$db->prepare('SELECT * FROM barang ORDER BY harga_barang ASC');
	$stmt->execute();
}
elseif($action == "3"){
    $stmt=$db->prepare('SELECT * FROM barang ORDER BY harga_barang DESC');
	$stmt->execute();
}
?>

<div class="row">
<?php if($stmt->rowCount() > 0): ?>
	<!-- Jika jumblah row lebih besar dari 0 artinya datanya ada, loop -->
	<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
		<?php extract($row); ?>
		<div class="col-sm-12 col-lg-4 col-md-6">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="<?php echo base_url() ?>Shop/ShopDetail/<?php echo $list->id_barang ?>">
										<?php
                                            
                                            echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar_barang).'" alt="Card image cap" />';
                                            
                                        ?>
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="<?php echo base_url() ?>Shop/ShopDetail/<?php echo $list->id_barang ?>"><?php echo $list->nama_barang ?></a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-male"></i><?php echo (substr($list->id_penjual, 0, 4) == "USER") ? $list->nama_pengguna : $list->nama_bengkel ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-calendar"></i><?php echo $list->waktu_add ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-shopping-basket"></i><?php echo $list->stok_barang ?> left !</a>
											</li>
										</ul>
										<p class="card-text">Rp <?php echo $list->harga_barang ?></p>
									</div>
								</div>
							</div>
						</div>
	<?php endwhile; ?>
<?php else: ?>
	<!-- else, jika tidak maka tampilkan bahwa data kosong -->
    <div class="col-sm-6 col-md-4">
      <center>
      	<h1>
      		Product Habis
      	</h1>
      </center>
    </div>
<?php endif; ?>
</div>