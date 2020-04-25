
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
                                    <li class="active">Service</li>
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
                                <strong class="card-title">service</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/service/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputservice">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Service</th>
                                            <th>Nama Bengkel</th>
                                            <th>Nama Service</th>
                                            <th>Harga Service</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($service as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_service ?></td>
                                            <td><?php echo $list->nama_bengkel ?></td>
                                            <td><?php echo $list->nama_service ?></td>
                                            <td><?php echo $list->harga_service ?></td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editservice_<?php echo $list->id_service?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteservice_<?php echo $list->id_service?>">Delete</button>
                                            </td>
                                        </tr>

                                         <!-- modal delete -->
                                         <div class="modal fade" id="deleteservice_<?php echo $list->id_service?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                                            <a href="<?php echo base_url(). 'Dashboard/Service/hapusData1/'.$list->id_service;?>">
                                                                <button type="button" class="btn btn-primary">Yes</button>
                                                            </a>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- edit -->
                                        <div class="modal fade" id="editservice_<?php echo $list->id_service?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data service</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                                        <form action="<?php echo base_url().'Dashboard/Service/updateData'?>" method="POST" novalidate="novalidate">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">ID Service</label>
                                                                <input type="text" class="form-control" placeholder = "ID service" id="id_service" name="id_service" value="<?php echo $list->id_service ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama Bengkel</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Bengkel" id="nama_bengkel" name="nama_bengkel" value="<?php echo $list->nama_bengkel?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama Service</label>
                                                                <input  type="text" class="form-control" placeholder = "Nama Service" id="nama_service" name="nama_service" value="<?php echo $list->nama_service?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Harga Service</label>
                                                                <input  type="text" class="form-control" placeholder = "Harga Service" id="harga_service" name="harga_service" value="<?php echo $list->harga_service?>">
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

        <!-- Modal input -->
        <div class="modal fade" id="inputservice" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/service/insertData'?>" method="post" novalidate="novalidate">
                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Service</label>
                                                <input type="text" class="form-control" placeholder = "ID service" id="id_service" name="id_service" value="SERVICE-<?php echo $count+1 ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Bengkel</label><br>
                                                <select data-placeholder="Pilih Bengkel" class="standardSelect form-control" tabindex="1" name="id_bengkel">
                                                    <?php foreach($bengkel as $a){ ?>
                                                        <option value="<?php echo $a->id_bengkel ?>"><?php echo $a->nama_bengkel ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Service</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Service" id="nama_service" name="nama_service">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Harga Service</label>
                                                <input  type="text" class="form-control" placeholder = "Harga Service" id="harga_service" name="harga_service">
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