
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
                                    <li class="active">Pengguna</li>
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
                                <strong class="card-title">Pengguna</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/User/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputuser">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Pengguna</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($user as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_pengguna ?></td>
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
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#edituser_<?php echo $list->id_pengguna?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#deleteuser_<?php echo $list->id_pengguna?>">Delete</button>
                                            </td>
                                        </tr>
                                        
                                         <!-- modal delete -->
                                         <div class="modal fade" id="deleteuser_<?php echo $list->id_pengguna?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                                            <a href="<?php echo base_url(). 'Dashboard/user/hapusData1/'.$list->id_pengguna;?>">
                                                                <button type="button" class="btn btn-primary">Yes</button>
                                                            </a>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal edit -->
                                        <div class="modal fade" id="edituser_<?php echo $list->id_pengguna?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data user</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                            
                                                        <form action="<?php echo base_url().'Dashboard/User/updateData'?>" method="POST" novalidate="novalidate">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">ID Pengguna</label>
                                                                <input type="text" class="form-control" placeholder = "ID pengguna" id="id_user" name="id_user" value="<?php echo $list->id_pengguna ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                                <input  type="text" class="form-control" placeholder = "nama" id="nama" name="nama" value="<?php echo $list->nama_pengguna ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Jenis Kelamin</label>
                                                                <select data-placeholder="Jenis Kelamin" class="standardSelect form-control" tabindex="1" name="jk" id="jk">
                                                                        <option value="1" <?php if($list->jenis_kelamin == 1) echo "selected"; ?>>Laki-Laki</option>
                                                                        <option value="2" <?php if($list->jenis_kelamin == 2) echo "selected"; ?>> Perempuan</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tanggal Lahir</label>
                                                                <input  type="date" class="form-control"  id="tanggal" name="tanggal" value="<?php echo $list->tanggal_lahir ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tempat Lahir</label>
                                                                <input  type="text" class="form-control" placeholder = "Tempat Lahir" id="tempat" name="tempat" value="<?php echo $list->tempat_lahir ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Alamat</label>
                                                                <input  type="text" class="form-control" placeholder = "Alamat" id="alamat" name="alamat" value="<?php echo $list->alamat ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                                <input  type="text" class="form-control" placeholder = "Email" id="email" name="email" value="<?php echo $list->email ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Telepon</label>
                                                                <input  type="text" class="form-control" placeholder = "Telepon" id="telepon" name="telepon" value="<?php echo $list->telepon ?>">
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

        <!-- Modal -->
        <div class="modal fade" id="inputuser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data user</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/User/insertData'?>" method="post" novalidate="novalidate">
                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID user</label>
                                                <input type="text" class="form-control" placeholder = "ID User" id="id_user" name="id_user" value="USER-<?php echo $count+1 ?>"readonly>
                                            </div>
                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                                <input  type="text" class="form-control" placeholder = "nama" id="nama" name="nama" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Jenis Kelamin</label>
                                                                <select data-placeholder="Jenis Kelamin" class="standardSelect form-control" tabindex="1" name="jk" id="jk">
                                                                        <option value="1" >Laki-Laki</option>
                                                                        <option value="2" > Perempuan</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tanggal Lahir</label>
                                                                <input  type="date" class="form-control"  id="tanggal" name="tanggal" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Tempat Lahir</label>
                                                                <input  type="text" class="form-control" placeholder = "Tempat Lahir" id="tempat" name="tempat" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Alamat</label>
                                                                <input  type="text" class="form-control" placeholder = "Alamat" id="alamat" name="alamat" >
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
                                                                <label for="cc-payment" class="control-label mb-1">Telepon</label>
                                                                <input  type="text" class="form-control" placeholder = "Telepon" id="telepon" name="telepon" >
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