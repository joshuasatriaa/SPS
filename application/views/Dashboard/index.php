
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('Template/head.php');
        ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            
                <!-- Orders -->
                <div class="orders">
                <h4>Dashboard</h4>
                <br>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $countbengkel; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total Bengkel</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-tools"></i>
                                </div><!-- /.card-right -->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $countpengguna; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total User</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $countbarang; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total Barang</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-box1"></i>
                                </div><!-- /.card-right -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Orders </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>Order ID</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>Time</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i=1;
                                                foreach($pesanan as $list){
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $i;?></td>
                                                    <td class="avatar">
                                                    <?php echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar_barang).'" alt="Card image cap" />'?>
                                                    </td>
                                                    <td> <?php echo $list->id_pesanan ?></td>
                                                    <td> <?php echo $list->nama_pengguna ?></td>
                                                    <td> <?php echo $list->nama_barang ?></td>
                                                    <td> <?php echo $list->waktu_pesanan ?></td>
                                                    <td> <?php echo $list->jumlah_barang ?></td>
                                                    <td>
                                                        <span class="name"><?php if($list->status_pesanan=="1") echo "Paid"; else echo "Processing" ?></span>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $i++ ; 
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card text-white bg-flat-color-5">
                                        <div class="card-body">
                                                <div class="card-left pt-1 float-left">
                                                    <h3 class="mb-0 fw-r">
                                                        <span class="count"><?php echo $countservice; ?></span>
                                                    </h3>
                                                    <p class="text-light mt-1 m-0">Total Service</p>
                                                </div><!-- /.card-left -->

                                                <div class="card-right float-right text-right">
                                                    <i class="icon fade-5 icon-lg pe-7s-tools"></i>
                                                </div><!-- /.card-right -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card text-white bg-flat-color-6">
                                        <div class="card-body">
                                                <div class="card-left pt-1 float-left">
                                                    <h3 class="mb-0 fw-r">
                                                        <span class="count"><?php echo $countnewusers; ?></span>
                                                    </h3>
                                                    <p class="text-light mt-1 m-0">Total New Accounts This Month</p>
                                                </div><!-- /.card-left -->

                                                <div class="card-right float-right text-right">
                                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                                </div><!-- /.card-right -->
                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card text-white bg-flat-color-1">
                                        <div class="card-body">
                                                <div class="card-left pt-1 float-left">
                                                    <h3 class="mb-0 fw-r">
                                                        <span class="count"><?php echo $counttransaction; ?></span>
                                                    </h3>
                                                    <p class="text-light mt-1 m-0">Total Transaction This Month</p>
                                                </div><!-- /.card-left -->

                                                <div class="card-right float-right text-right">
                                                    <div id="flotLine1" class="flotLine1"></div>
                                                </div><!-- /.card-right -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Account Composition Chart </h4>
                                    <canvas id="doughutChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">User Growth Chart </h4>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Transaction Chart </h4>
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                </div>

            </div><!-- .animated -->
        </div>
        <!-- /.content -->
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    
    <!-- /#right-panel -->