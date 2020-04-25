
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
                                <h1>Membership</h1>
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
                                <strong class="card-title">TABLE</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Membership/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputmember">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status Membership</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach($membership as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $i; $i++; ?></td>
                                            <td><?php  
                                                    if($list->nama_pengguna != null)
                                                    {
                                                        echo $list->nama_pengguna;
                                                    }else
                                                    {
                                                        echo $list->nama_bengkel;
                                                    } 
                                                ?>
                                            </td>
                                            <td><?php 
                                                    if($list->status_membership == 1)
                                                    {
                                                        echo "Aktif";
                                                    }else
                                                    {
                                                        echo "Tidak Aktif";
                                                    } 
                                                ?>
                                            </td>
                                            <td><?php echo date("d F Y, H:i",strtotime($list->tanggal_mulai)) ?></td>
                                            <td><?php echo date("d F Y, H:i",strtotime($list->tanggal_selesai)) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editbook_<?php echo $list->id_membership?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Membership/hapusData/'.$list->id_membership;?>">Remove</button>
                                            </td>
                                        </tr>

                                        <!-- Modal edit-->
                                        <div class="modal fade" id="editbook_<?php echo $list->id_membership?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Membership</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url().'Dashboard/Membership/updateData'?>" method="post" novalidate="novalidate">
                                                        <div class="modal-body">
                                            
                                                            <div class="form-group">
                                                                
                                                                <input type="hidden" class="form-control" placeholder = "ID Bengkel" id="idm" name="idm" value="<?php echo $list->id_membership;?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                                <input type="text" class="form-control" value="<?php echo $list->nama_pengguna;?>"readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Status Membership</label>
                                                                <select data-placeholder="Jenis Kelamin" class="standardSelect form-control" tabindex="1" name="status" id="status">
                                                                    <option value="1" <?php if($list->status_membership == 1) echo "selected"; ?>>Aktif</option>
                                                                    <option value="0" <?php if($list->status_membership == 0) echo "selected"; ?>>Tidak Aktif</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tanggal Mulai</label>
                                                                <input  type="datetime" class="form-control" id="mulai" name="mulai" value="<?php echo $list->tanggal_mulai; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tanggal Selesai</label>
                                                                <input  type="datetime" class="form-control" id="selesai" name="selesai" value="<?php echo $list->tanggal_selesai; ?>">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
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
                        <div class="modal fade" id="inputmember" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mediumModalLabel">Input Membership</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url().'Dashboard/Membership/insertData'?>" method="post" novalidate="novalidate">
                                        <div class="modal-body">
                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                <select class="standardSelect form-control" tabindex="1" name="iduser" id="iduser">
                                                    <?php foreach($pengguna as $list){?>
                                                        <option value="<?php echo $list->id_pengguna ?>"><?php echo $list->id_pengguna ." - " . $list->nama_pengguna ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Mulai</label>
                                                <input  type="date" class="form-control" id="mulai" name="mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Selesai</label>
                                                <input  type="date" class="form-control" id="selesai" name="selesai">
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