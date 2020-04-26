
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
                                <h1>History Promo</h1>
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
                                <strong class="card-title">Promo</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/PromoManagement/exportPDF2' ?>" target="_blank">
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
                                            <th>ID Promo</th>
                                            <th>Jenis Promo Promo</th>
                                            <th>Mulai Promo</th>
                                            <th>Akhir Promo</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach($promo as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_promo ?></td>
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
                                            
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editpromo_<?php echo $list->id_promo?>">Edit</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editpromo_<?php echo $list->id_promo?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Promo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                                        <form action="<?php echo base_url().'Dashboard/PromoManagement/updateData1' ?>" method="POST" novalidate="novalidate">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">ID Promo</label>
                                                                <input type="text" class="form-control" name="idpromo" value="<?php echo $list->id_promo ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Jenis Promo</label>
                                                                <select class="form-control" name="jenispromo">
                                                                    <option value = "1" <?php if($list->jenis_promo == 1){echo 'selected';}?> >Discount 10%</option>
                                                                    <option value = "2" <?php if($list->jenis_promo == 2){echo 'selected';}?> >Discount 15%</option>
                                                                    <option value = "3" <?php if($list->jenis_promo == 3){echo 'selected';}?> >Discount 20%</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Mulai Promo</label>
                                                                <input type="date" class="form-control" name="tanggalmulai" value="<?php echo $list->tanggal_mulai ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Akhir Promo</label>
                                                                <input type="date" class="form-control" name="tanggalselesai" value="<?php echo $list->tanggal_selesai ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="statusUsed" class="control-label mb-1">Status Used</label>
                                                                <select class="form-control" name="statusUsed">
                                                                    <option value = "0" <?php if($list->jenis_promo == 1){echo 'selected';}?> >Belum Dipakai</option>
                                                                    <option value = "1" <?php if($list->jenis_promo == 2){echo 'selected';}?> >Sudah Dipakai</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <input type="submit" class="btn btn-primary"></button>
                                                    </div>
                                                    </form>
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
                            
                            <form action="<?php echo base_url().'Dashboard/PromoManagement/insertData1'?>" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">ID Promo</label>
                                    <input type="text" class="form-control" name="idpromo" value="PRO-<?php echo $count+1 ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="user" class="control-label mb-1">ID User</label>
                                    <select class="form-control" name="user">
                                        <?php foreach($user as $list) {?>
                                            <option value = "<?php echo $list->id_user?>"><?php echo $list->id_user?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Jenis Promo</label>
                                    <select class="form-control" name="jenispromo">
                                        <option value = "1">Discount 10%</option>
                                        <option value = "2">Discount 15%</option>
                                        <option value = "3">Discount 20%</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Mulai Promo</label>
                                    <input type="date" class="form-control" name="tanggalmulai">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Akhir Promo</label>
                                    <input type="date" class="form-control" name="tanggalselesai">
                                </div>
                                <div class="form-group">
                                    <label for="statusUsed" class="control-label mb-1">Status Used</label>
                                    <select class="form-control" name="statusUsed">
                                        <option value = "0" <?php if($list->jenis_promo == 1){echo 'selected';}?> >Belum Dipakai</option>
                                        <option value = "1" <?php if($list->jenis_promo == 2){echo 'selected';}?> >Sudah Dipakai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary"></button>
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