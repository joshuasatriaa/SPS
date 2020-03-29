
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
                                <h1>Chat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Chat</li>
                                    <li class="active">Chat User</li>
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
                                <strong class="card-title">Chat User</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>User ID</th>
                                            <th>User</th>
                                            <th>Last Message Sent</th>
                                            <th>Last Message Sent Time</th>
                                            <th>Buttons</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $i = 0;
                            foreach($chatUser as $list){
                          ?>
                                        <tr align="center">
                                            <td> <?php echo $list[0]->id_pengirim ?></td>
                                            <td> <?php echo ($list[0]->nama_pengguna == null) ? $list[0]->nama_bengkel : $list[0]->nama_pengguna; ?></td>
                                            <td> <?php echo $list[0]->pesan; ?></td>
                                            <td> <?php echo date("d F Y H:i", strtotime($list[0]->waktu_kirim)); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" onMouseOver="document.getElementById('link-<?= $i;?>').style.color='#FFFFFF'" onMouseOut="document.getElementById('link-<?= $i; ?>').style.color='#0000FF'"><a id="link-<?= $i;?>" href="<?php echo base_url().'Dashboard/ChatUser/chatPersonal/'.$list[0]->id_pengirim;?>" style="text-decoration:none;color:blue">Chat</a></button>
                                            </td>
                                        </tr>
                                        
                            <?php
                            $i++;
                                } 
                            ?>
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
            
        <div class="clearfix"></div>

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

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
