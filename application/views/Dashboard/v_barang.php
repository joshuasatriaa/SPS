
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
                                    <li class="active">Barang</li>
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
                                <strong class="card-title">Barang</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Barang/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputBarang">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Email Penjual</th>
                                            <th>Harga Barang</th>
                                            <th>Stok Barang</th>
                                            <th>Keterangan Barang</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach($barang as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_barang ?></td>
                                            <td><?php echo $list->nama_barang ?></td>
                                            <td><?php echo $list->email?></td>
                                            <td><?php echo $list->harga_barang ?></td>
                                            <td><?php echo $list->stok_barang ?></td>
                                            <td><?php echo $list->keterangan_barang?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editBarang_<?php echo $list->id_barang?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deletebarang_<?php echo $list->id_barang?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- modal delete -->
                                        <div class="modal fade" id="deletebarang_<?php echo $list->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Confirm Delete This Row ?
                                                    </div>
                                                    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <a href="<?php echo base_url(). 'Dashboard/Barang/hapusData1/'.$list->id_barang;?>">
                                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                            </a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- modal edit -->
                                        <div class="modal fade" id="editBarang_<?php echo $list->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                                        <form action="<?php echo base_url().'Dashboard/Barang/updateData'?>" method="POST" novalidate="novalidate">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">ID Barang</label>
                                                                <input type="text" class="form-control" placeholder = "ID Barang" id="id_barang" name="id_barang" value="<?php echo $list->id_barang ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama Barang</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Barang" id="nama_barang" name="nama_barang" value="<?php echo $list->nama_barang?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Email Penjual</label><br>
                                                                <select data-placeholder="Pilih Email" class="standardSelect form-control" tabindex="1" name="id_user" id="id_user" readonly>
                                                                    <option>
                                                                        <?php echo $list->email; ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Harga Barang</label>
                                                                <input  type="text" class="form-control" placeholder = "Harga Barang" id="harga_barang" name="harga_barang" value="<?php echo $list->harga_barang?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Stok Barang</label>
                                                                <input  type="text" class="form-control" placeholder = "Stok Barang" id="stok_barang" name="stok_barang" value="<?php echo $list->stok_barang?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Keterangan Barang</label>
                                                                <input  type="text" class="form-control" placeholder = "keterangan Barang" id="keterangan_barang" name="keterangan_barang" value="<?php echo $list->keterangan_barang?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
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

            <!-- Modal Input-->
            <div class="modal fade" id="inputBarang" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Barang/insertData'?>" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">ID Barang</label>
                                    <input type="text" class="form-control" placeholder = "ID Barang" id="id_barang" name="id_barang" value="BARANG-<?php echo $count+1 ?>"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nama Barang</label>
                                    <input  type="text" class="form-control" placeholder = "Nama Barang" id="nama_barang" name="nama_barang" >
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Email Penjual</label>
                                    <br>
                                    <select data-placeholder="Pilih Pengguna" class="form-control standardSelect" tabindex="1" name="id_user">
                                        <?php foreach($user as $a){ ?>
                                            <option value="<?php echo $a->id_user ?>"><?php echo $a->email ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Harga Barang</label>
                                    <input  type="text" class="form-control" placeholder = "Harga Barang" id="harga_barang" name="harga_barang" >
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Stok Barang</label>
                                    <input  type="text" class="form-control" placeholder = "Stok Barang" id="stok_barang" name="stok_barang" >
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">keterangan Barang</label>
                                    <input  type="text" class="form-control" placeholder = "keterangan Barang" id="keterangan_barang" name="keterangan_barang" >
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
                        Copyright &copy; 2018 Ela Barang
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->