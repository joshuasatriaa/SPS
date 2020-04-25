
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('Template/head.php');
        ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Orders</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">TABLE</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Pesanan/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Nama Pembeli</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Status Pesanan</th>
                                            <th>Waktu Pesanan</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($pesanan as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_pesanan ?></td>
                                            <td><?php echo $list->nama_pengguna ?></td>
                                            <td><?php echo $list->nama_barang ?></td>
                                            <td><?php echo $list->jumlah_barang ?></td>
                                            <td><?php echo ($list->status_pesanan == 1) ? "Sudah dibayar" : "Masuk ke Cart" ?></td>
                                            <td><?php echo date("d F Y, H:i",strtotime($list->waktu_pesanan)) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editpesanan_<?php echo $list->id_pesanan?>">Edit</button>
                                            </td>
                                            <!--<td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/pesanan/hapusData/'.$list->id_pesanan;?>">Delete</button>
                                            </td>-->
                                        </tr>
                                        <div class="modal fade" id="editpesanan_<?php echo $list->id_pesanan?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Pesanan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                         <form action="<?php echo base_url().'Dashboard/Pesanan/updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Pesanan</label>
                                                <input type="text" class="form-control" placeholder = "ID pesanan" id="id_pesanan" name="id_pesanan" value="<?php echo $list->id_pesanan ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Pembeli</label>
                                                <input type="text" class="form-control"  value="<?php echo $list->nama_pengguna ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Barang</label>
                                                <input type="text" class="form-control"  value="<?php echo $list->nama_barang ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jumlah Pesanan</label>
                                                <input type="text" class="form-control" id="jumlahbarang" name="jumlahbarang" value="<?php echo $list->jumlah_barang ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Status Pesanan</label>
                                                <select data-placeholder="Choose a Status" class="standardSelect form-control" tabindex="1" name="status_pesanan" id="status_pesanan">
                                                                        <option value="0" <?php echo ($list->status_pesanan == 0 ? "selected" : "") ?>>Masuk ke Cart</option>
                                                                        <option value="1" <?php echo ($list->status_pesanan == 1 ? "selected" : "") ?>>Sudah Dibayar</option>
                                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Waktu Pesanan</label>
                                                <input type="datetime" class="form-control" placeholder = "Waktu Pesanan" id="waktu_pesanan" name="waktu_pesanan" value="<?php echo $list->waktu_pesanan?>" readonly>
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div></form>
                                          <?php
                          } 
                          ?>
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Dosen
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->