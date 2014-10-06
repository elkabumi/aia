 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        	<?php
                             $user_data = get_user_data();
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p style="color:#BECFE0;">
                                        <?php
                                       
                                        echo $user_data[0];
                                        ?>
                                </p>

                            <a style="color:#BECFE0"><?= $user_data[1]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     <?
                    if($_SESSION['user_type_id'] != '2'){
					?>
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Master</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="agency.php?page=list"><i class="fa fa-angle-double-right"></i> Agency</a></li>
                                <li><a href="agent.php?page=list"><i class="fa fa-angle-double-right"></i> Data Ars</a></li>
                                <li><a href="branch.php?page=list"><i class="fa fa-angle-double-right"></i> Branch</a></li>
                               <!-- <li><a href="product.php?page=list"><i class="fa fa-angle-double-right"></i> Product</a></li>-->
                                <li><a href="unit.php?page=list"><i class="fa fa-angle-double-right"></i> City</a></li>
                                 <li><a href="update_ars.php?page=form"><i class="fa fa-angle-double-right"></i> Clean Data ARS</a></li>
                                   <li><a href="feedback.php?page=list"><i class="fa fa-angle-double-right"></i> Feedback</a></li>
                                     <li><a href="transaction_type.php?page=list"><i class="fa fa-angle-double-right"></i> Event Type</a></li>
                             
                            </ul>
                        </li>
                         <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="admin.php?page=list"><i class="fa fa-angle-double-right"></i> Admin</a></li>
                                <li><a href="pbd.php?page=list"><i class="fa fa-angle-double-right"></i> PBD</a></li>
                                <li><a href="rdh.php?page=list"><i class="fa fa-angle-double-right"></i> RDH</a></li>
                                <li><a href="trainer.php?page=list"><i class="fa fa-angle-double-right"></i> Trainer (ADM)</a></li>
                                <li><a href="trainer_ext.php?page=list"><i class="fa fa-angle-double-right"></i> Trainer External</a></li>
                                
                               
                            </ul>
                        </li>
                        <? } ?>
                        <li>
                            <a href="training_dashboard.php?page=list">
                                <i class="fa fa-calendar"></i> <span>Scheduling Training</span> 
                            </a>
                        </li>
                        <li>
                            <a href="travel_transaction.php?page=list">
                                <i class="fa fa-plane"></i> <span>Travel Request</span> 
                            </a>
                        </li>
                        <li>
                            <a href="logistic.php?page=list">
                                <i class="fa fa-briefcase"></i> <span>Logistic Request</span> 
                            </a>
                        </li>
                         <li>
                            <a href="feedback_answer.php?page=list">
                                <i class="fa fa-comments"></i> <span>Feedback</span> 
                            </a>
                        </li>
                        <li>
                            <a href="production.php?page=list">
                                <i class="fa fa-book"></i> <span>Production</span> 
                            </a>
                        </li>
                          <li>
                            <a href="absensi.php?page=list">
                                <i class="fa fa-book"></i> <span>Absensi</span> 
                            </a>
                        </li>
						  <li>
                            <a href="report_event_summary.php?page=form">
                                <i class="fa fa-book"></i> <span>Report Event</span> 
                            </a>
                        </li>
                     
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>