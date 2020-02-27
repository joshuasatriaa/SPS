
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
                                <h1>Master Data</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Master Data</li>
                                    <li class="active">Bengkel</li>
                                </ol>
                            </div>
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
                                <strong class="card-title">Bengkel</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Bengkel/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputBengkel">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Bengkel</th>
                                            <th>Nama Bengkel</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Tanggal Registrasi</th>
                                            <th>Gambar</th>
                                            <th>Jam Buka</th>
                                            <th>Jam Tutup</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($bengkel as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_bengkel ?></td>
                                            <td><?php echo $list->nama_bengkel ?></td>
                                            <td><?php echo $list->email?></td>
                                            <td><?php echo $list->telepon ?></td>
                                            <td><?php echo $list->tanggal_registrasi ?></td>
                                            <td><?php echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar).'" alt="Card image cap" />'?></td>
                                            <td><?php echo $list->jam_buka?></td>
                                            <td><?php echo $list->jam_tutup?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editbengkel_<?php echo $list->id_bengkel?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/bengkel/hapusData/'.$list->id_bengkel;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editbengkel_<?php echo $list->id_bengkel?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Bengkel</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                         <form action="<?php echo base_url().'Dashboard/Bengkel/updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Bengkel</label>
                                                <input type="text" class="form-control" placeholder = "ID Bengkel" id="id_bengkel" name="id_bengkel" value="<?php echo $list->id_bengkel ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Bengkel</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel" id="nama_bengkel" name="nama_bengkel" value="<?php echo $list->nama_bengkel?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                <input  type="text" class="form-control" placeholder = "Email" id="email" name="email" value="<?php echo $list->email?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Telepon</label>
                                                <input  type="text" class="form-control" placeholder = "Telepon" id="telepon" name="telepon" value="<?php echo $list->telepon?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Registrasi</label>
                                                <input  type="text" class="form-control" placeholder = "Tanggal Registrasi" id="tanggal_registrasi" name="tanggal_registrasi" value="<?php echo $list->tanggal_registrasi?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Gambar</label><br>
                                                <input type="file" name="gambar" size="20" value="<?= $list->gambar ?>"?>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Buka</label>
                                                <input  type="text" class="form-control" placeholder = "Jam Buka" id="jam_buka" name="jam_buka" value="<?php echo $list->jam_buka?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Tutup</label>
                                                <input  type="text" class="form-control" placeholder = "Jam Tutup" id="jam_tutup" name="jam_tutup" value="<?php echo $list->jam_tutup?>">
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                                          <?php
                          } 
                          ?>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputBengkel" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data bengkel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Bengkel/insertData'?>" method="post" novalidate="novalidate">
                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Bengkel</label>
                                                <input type="text" class="form-control" placeholder = "ID Bengkel" id="id_bengkel" name="id_bengkel" value="BID-<?php echo $count+1 ?>"readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Bengkel</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel" id="nama_bengkel" name="nama_bengkel" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                <input  type="text" class="form-control" placeholder = "Email" id="email" name="email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Telepon</label>
                                                <input  type="text" class="form-control" placeholder = "Telepon" id="telepon" name="telepon" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Registrasi</label>
                                                <input  type="date" class="form-control" placeholder = "Tanggal Registrasi" id="tanggal_registrasi" name="tanggal_registrasi">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Gambar</label><br>
                                                <input type="file" name="gambar" id="gambar" size="20" class="mr-sm-2" multiple />
        
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Buka</label>
                                                <input  type="time" class="form-control" placeholder = "Jam Buka" id="jam_buka" name="jam_buka">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Tutup</label>
                                                <input  type="time" class="form-control" placeholder = "Jam Tutup" id="jam_tutup" name="jam_tutup">
                                            </div>
                                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>


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