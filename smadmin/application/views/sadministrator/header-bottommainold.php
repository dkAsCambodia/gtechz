<?php
 if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true && $this->session -> userdata('role_id') != 1) {
      redirect('staff/index');
    }
 ?>
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <!-- <a href="index3.html" class="brand-link">
      <img src="<?php //echo base_url(); ?>assets/adminz/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AcuteFresh </span>  
    </a>-->
<a href="<?php echo base_url(); ?>staff/dashboard"  class="brand-link bg-white">
                 <?php if($this->session->userdata('image') != ""){ ?>
                        <img src="<?php echo base_url(); ?>assets/images/<?php echo $this->session->userdata('site_logo'); ?>" alt="Site Logo" class="img-fluid" style="opacity: .8">
                    <?php }else{ ?>
                          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo-small.png" alt="CandidLogo" class="img-fluid" style="width: auto; height: 50px; align-content: center" />
                    <?php } ?>
     <!--               <br/>
                       <span class="brand-text font-weight-light">AcuteFresh </span>  -->
                       CandidHomes
                </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/user.png" class="img-circle elevation-2" alt="User Image">
          
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php if($this->session->userdata('name') != ""){ echo $this->session->userdata('name');}?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="margin-bottom: 30px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('staff/dashboard'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
        
              <li class="nav-item">
               <a href="<?php echo base_url(); ?>staff/categories" class="<?php if($this->uri->segment(2)=="categories"){echo "nav-link active";} else{echo "nav-link";}?>">
               <i class="nav-icon icofont icofont-tasks text-warning"></i>
              <p>
                Category
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info fa-angle-left"></span>
              </p>
            </a>
            
          </li>

          <li class="<?php if($this->uri->segment(2)=="create-subcategories" ||  $this->uri->segment(2)=="subcategories" || $this->uri->segment(2)=="edit_subcategories"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
             <i class="nav-icon icofont icofont-tasks-alt text-green"></i>
              <p>
                Sub Category
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/create-subcategories" class="<?php if($this->uri->segment(2)=="create-subcategories"){echo "nav-link active";} else{echo "nav-link";}?>">
                 
                 <i class="far fa-circle nav-icon text-warning"></i>
                  
                  <p>Add Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/subcategories" class="<?php if($this->uri->segment(2)=="subcategories" || $this->uri->segment(2)=="edit_subcategories"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>List Sub Categories</p>
                </a>
              </li>
           
             
            </ul>
          </li>


          <li class="<?php if($this->uri->segment(2)=="create-products" ||  $this->uri->segment(2)=="products" || $this->uri->segment(2)=="edit_products"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart  text-danger"></i>
              <p>
                Products
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('staff/create-products'); ?>" class="<?php if($this->uri->segment(2)=="create-products"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Add Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/products'); ?>" class="<?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="edit_products"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Manage Products</p>
                </a>
              </li>            
            </ul>
          </li>

        
        <li class="<?php if($this->uri->segment(2)=="create-customers" ||  $this->uri->segment(2)=="customers" || $this->uri->segment(2)=="edit_customers"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users  text-info"></i>
              <p>
                Customers
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('staff/create-customers'); ?>"  class="<?php if($this->uri->segment(2)=="create-customers"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Add Customer</p>
                </a>


                        


              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/customers'); ?>"  class="<?php if($this->uri->segment(2)=="customers" || $this->uri->segment(2)=="edit_customers"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Manage Cusotmers</p>
                </a>
               
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
                <a href="<?php echo base_url('staff/user-address'); ?>" class="<?php if($this->uri->segment(2)=="user-address" || $this->uri->segment(2)=="view-address" ||  $this->uri->segment(3)=="view-profile"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="fas fa-address-book nav-icon text-success"></i>
                  <p>Addresses</p>
                </a>
          </li>


           <li class="<?php if($this->uri->segment(2)=="create-staffs" ||  $this->uri->segment(2)=="staffs" || $this->uri->segment(2)=="edit_staffs"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user  text-info"></i>
              <p>
                Staffs
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('staff/create-staffs'); ?>"  class="<?php if($this->uri->segment(2)=="create-staffs"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Add Staff</p>
                </a>


                        


              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/staffs'); ?>"  class="<?php if($this->uri->segment(2)=="staffs" || $this->uri->segment(2)=="edit_staffs"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Manage Staff</p>
                </a>
               
              </li>
              
            </ul>
          </li>
          


              
          <li class="<?php if($this->uri->segment(2)=="create-vendors" || $this->uri->segment(2)=="vendors" ||  $this->uri->segment(2)=="edit_vendors"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users text-success"></i>
              <p>
                Vendors
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/create-vendors" class="<?php if($this->uri->segment(2)=="create-vendors"){echo "nav-link active";} else{echo "nav-link";}?>">
                 
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Add Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/vendors" class="<?php if($this->uri->segment(2)=="vendors" || $this->uri->segment(2)=="edit_vendors"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>List Vendors</p>
                </a>
              </li>
           
             
            </ul>
          </li>
          
          
          
          <li class="<?php if($this->uri->segment(2)=="create-leads" || $this->uri->segment(2)=="leads" || $this->uri->segment(2)=="view_leads" || $this->uri->segment(2)=="edit_leads" || $this->uri->segment(2)=="create-orders" ||  $this->uri->segment(2)=="orders" || $this->uri->segment(2)=="edit_orders" || $this->uri->segment(2)=="view_orders" || $this->uri->segment(2)=="create-assign" ||  $this->uri->segment(2)=="assign" || $this->uri->segment(2)=="edit_assign"  || $this->uri->segment(2)=="create-workstatus" ||  $this->uri->segment(2)=="workstatus" || $this->uri->segment(2)=="edit_workstatus"){echo "nav-item menu-open";} else{echo "nav-item";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit  text-warning"></i>
              <p>
                Leads
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="<?php echo base_url('staff/leads'); ?>" class="<?php if($this->uri->segment(2)=="create-leads" ||  $this->uri->segment(2)=="leads" || $this->uri->segment(2)=="view_leads" || $this->uri->segment(2)=="edit_leads"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="ion ion-bag  nav-icon text-success"></i>
                  <p>Leads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/orders'); ?>" class="<?php if($this->uri->segment(2)=="create-orders" ||  $this->uri->segment(2)=="orders" || $this->uri->segment(2)=="edit_orders" || $this->uri->segment(2)=="view_orders" ){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="fas fa-shipping-fast  nav-icon text-success"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/assign'); ?>" class="<?php if($this->uri->segment(2)=="create-assign" ||  $this->uri->segment(2)=="assign" || $this->uri->segment(2)=="edit_assign"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="fas fa-clipboard-list  nav-icon text-info"></i>
                  <p>Billing</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="<?php //echo base_url('staff/workstatus'); ?>" class="<?php //if($this->uri->segment(2)=="create-workstatus" ||  $this->uri->segment(2)=="workstatus" || $this->uri->segment(2)=="edit_workstatus"){echo "nav-link active";} else{echo "nav-link";}?>">
                  <i class="fas fa-headphones nav-icon text-warning"></i>
                  
                 
                  <p>Support</p>
                </a>
              </li> -->
            
             
            </ul>
          </li>
          
          

          <li class="nav-item">
            <a href="<?php echo base_url('staff/feedback'); ?>" class="<?php if($this->uri->segment(2)=="feedback"){echo "nav-link active";} else{echo "nav-link";}?>">
              <i class="nav-icon fas fa-envelope  text-orange"></i>
              <p>
                Feedback
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            
          </li>
          

          
         
          
         <!-- menu ends for here-->
     
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>