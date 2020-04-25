
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
                                <h1>Booking</h1>
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
                                    <a href="<?php echo base_url().'Dashboard/Booking/exportPDF' ?>" target="_blank">
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
                                            <th>ID Booking</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Bengkel</th>
                                            <th>Service</th>
                                            <th>Waktu Booking</th>
                                            <th>Status Booking</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach($booking as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_booking ?></td>
                                            <td><?php echo $list->nama_pengguna ?></td>
                                            <td><?php echo $list->nama_bengkel ?></td>
                                            <td><?php echo $list->nama_service ?></td>
                                            <td><?php echo date("d F Y, H:i",strtotime($list->waktu_service)) ?></td>
                                            <td><?php 
                                                    if($list->status_booking == 0)
                                                    {
                                                        echo "Belum Konfirmasi";
                                                    }
                                                    else if($list->status_booking == 1)
                                                    {
                                                        echo "Ditolak";
                                                    }
                                                    else if($list->status_booking == 2)
                                                    {
                                                        echo "Dikonfirmasi";
                                                    }
                                                    else
                                                    {
                                                        echo "Selesai";
                                                    } 
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editbook_<?php echo $list->id_booking?>">Edit</button>
                                            </td>
                                            <!--<td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/pesanan/hapusData/'.$list->id_pesanan;?>">Delete</button>
                                            </td>-->
                                        </tr>

                                        <!-- Modal edit-->
                                        <div class="modal fade" id="editbook_<?php echo $list->id_booking?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url().'Dashboard/Booking/updateData'?>" method="post" novalidate="novalidate">
                                                        <div class="modal-body">
                                            
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">ID Booking</label>
                                                                <input type="text" class="form-control" placeholder = "ID Bengkel" id="idbook" name="idbook" value="<?php echo $list->id_booking ?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama Pelanggan</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel"  value="<?php echo $list->nama_pengguna?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama Bengkel</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel"  value="<?php echo $list->nama_bengkel ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Service</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel"  value="<?php echo $list->nama_service ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Waktu Service</label>
                                                                <input  type="datetime" class="form-control" id="waktu" name="waktu"  value="<?php echo $list->waktu_service ?>">
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
                                        <!-- end modal -->

                                        <?php
                                            }
                                        ?>                    
                                    </tbody>                    
                                </table>                    
                            </div>                                
                        </div>                                
                    </div>                               
                </div> 
            </div>
        </div> <!-- .content -->
                             
                                            
                            
         
        
                        <!-- Modal input-->
                        <div class="modal fade" id="inputBengkel" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mediumModalLabel">Input Data bengkel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url().'Dashboard/Bengkel/insertData'?>" method="post" novalidate="novalidate">
                                        <div class="modal-body">
                            
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
                                                <label for="cc-payment" class="control-label mb-1">Password</label>
                                                <input  type="password" class="form-control" placeholder = "Password" id="password1" name="password1">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Konfirmasi Password</label>
                                                <input  type="password" class="form-control" placeholder = "Konfirmasi Password" id="password2" name="password2">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Alamat</label>
                                                <input  type="text" class="form-control" placeholder = "Alamat" id="alamat" name="alamat" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Telepon</label>
                                                <input  type="text" class="form-control" placeholder = "Telepon" id="telepon" name="telepon" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Gambar</label><br>
                                                <input type="file" name="gambar" id="gambar" size="20" class="mr-sm-2 form-control" multiple />
        
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal input -->
                            

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