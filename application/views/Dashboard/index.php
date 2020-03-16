
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
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Traffic </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title"> Page Visits</h4>
                                            <div class="por-txt">100,000 Users</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Workshop Visitors</h4>
                                            <div class="por-txt">30,000 Users</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Targeted  Visitors</h4>
                                            <div class="por-txt">250,000 Users</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
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
                                                    <td class="serial">1.</td>
                                                    <td class="avatar">
                                                    <?php echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar).'" alt="Card image cap" />'?>
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
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="box-title">Chandler</h4> -->
                                    <div class="calender-cont widget-calender">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                        </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
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