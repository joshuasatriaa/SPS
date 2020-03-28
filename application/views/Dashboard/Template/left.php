<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url(). "Dashboard/Welcome" ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li>
                    <?php if($this->session->userdata('tipe_akun')==2){   ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Academics</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php    
                                     if($dosen['tipe_dosen'] == 3){
                                
                                ?>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Nilai/index';?>">Nilai</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Materi/index';?>">Mata Kuliah</a></li>
                            <?php }else if($dosen['tipe_dosen'] == 2){
                             ?>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Nilai/index';?>">Nilai</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Materi/index';?>">Mata Kuliah</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Enroll/index';?>">Enroll</a></li>
                            <?php }else{ ?>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Nilai/index';?>">Nilai</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Materi/index';?>">Mata Kuliah</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Enroll/index';?>">Enroll</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/JadwalKuliah/index';?>">Jadwal Kuliah</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/JadwalCustom/index';?>">Jadwal Custom</a></li>
                                        <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Dosen/assignPA';?>">Assign Dosen PA</a></li>
                            <?php }
                             ?>
                            
                            
                        </ul>
                    </li>
                    <?php }else if($this->session->userdata('tipe_akun') == 0){ ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Admin/index';?>">Admin</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Barang/index';?>">Barang</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Bengkel/index';?>">Bengkel</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Pesanan/index';?>">Pesanan</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Service/index';?>">Service</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/User/index';?>">User</a></li>
                        </ul>
                    </li>
                    <li class=""><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/ChatUser/index';?>">Chat With User</a></li>
                    <?php  } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>