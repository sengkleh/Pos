            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url('Ctr_dashboard')?>"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="<?php echo site_url('Ctr_user/index');?>"><i class="fa fa-user-secret" aria-hidden="true"></i> Data User <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="<?php echo site_url('Ctr_supplier/index');?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Data Supplier <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="<?php echo site_url('Ctr_costumer/index');?>"><i class="fa fa-users"></i></i> Data Costumer <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-balance-scale" aria-hidden="true"></i> Product <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('Ctr_category')?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Dana Category</a></li>
                      <li><a href="<?php echo site_url('Ctr_unit')?>"><i class="fa fa-suitcase" aria-hidden="true"></i> Data Unit</a></li>
                      <li><a href="<?php echo site_url('Ctr_item')?>"><i class="fa fa-list" aria-hidden="true"></i> Data Item</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('Ctr_sale/index')?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sales</a></li>
                      <li><a href="<?php echo site_url('Ctr_stock/in')?>"><i class="fa fa-suitcase" aria-hidden="true"></i> Stock In</a></li>
                      <li><a href="<?php echo site_url('Ctr_stock/out')?>"><i class="fa fa-list" aria-hidden="true"></i> Stock Out</a></li>
                    </ul>
                 </li>
                  <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Report <span class="fa fa-chevron-down"></span></a>
                  </li>
                  


                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <!--<?php if($this->session->userdata('level') == 1)  ?>-->
                  <li><a><i class="fa fa-navicon"></i> Test Hidden <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <?php } ?> 

                  
                </ul>
              </div>                
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            