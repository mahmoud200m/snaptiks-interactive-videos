<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Specific Page Data -->
<?php $title = CHtml::encode($this->pageTitle); ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'Ecommerce Products - Responsive Admin HTML Template'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php
	 // Specific Data Tables CSS
	 $specific_css[0] = 'plugins/dataTables/css/jquery.dataTables.min.css';   // Data Table CSS
	 $specific_css[1] = 'plugins/dataTables/css/dataTables.bootstrap.css';   // Data Table CSS
	 $page_css ='
				  #product-table thead .heading th, #product-table thead .filter th{border-bottom:none; }
				  #product-table thead .heading th {font-size: 14px; text-transform:uppercase; color:#FFF;} 
				  #product-table thead .filter th{
					  background :#FFF;
					  border-top:none;
					  padding-top: 10px;
					  padding-bottom:10px;
					 
				  }
				  div.dataTables_length label{margin-bottom:0;}
				  .dataTables_wrapper .dataTables_length{display:inline; margin-right:10px; float:none;}
				  .dataTables_wrapper .dataTables_info{display: inline-block; padding-top: 2px; float:none;}	 
	 ';
?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>

<div class="content">
  <div class="container">
    <?php if ($navbar_left_config != 0) { $current_navbar="vd_navbar-left"; require('templates/navbars/'.$navbar_left.'.tpl.php'); }?>
    <?php if ($navbar_right_config != 0) { $current_navbar="vd_navbar-right"; require('templates/navbars/'.$navbar_right.'.tpl.php'); }?>
    
    <!-- Middle Content Start -->
    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <!-- <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a> </li>
                <li class="active">Groups</li>
              </ul>
              <?php //include('templates/widgets/panel-menu-head-section.tpl.php'); ?>
            </div>
          </div> -->
          <!-- <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Groups</h1>
              <small class="subtitle">Social Media: Groups</small>
              <div class="vd_panel-menu  hidden-xs">
                <div class="menu">
                  <div data-action="click-trigger"> <span class="menu-icon mgr-10"><i class="fa fa-bars"></i></span>Menu <i class="fa fa-angle-down"></i> </div>
                  <div data-action="click-target" class="vd_mega-menu-content width-xs-2 left-xs" style="display: none;">
                    <div class="child-menu">
                      <div class="content-list content-menu">
                        <ul class="list-wrapper pd-lr-10">
                          <li> <a href="pages-ecommerce-products.php">
                            <div class="menu-icon"><i class=" fa fa-cubes"></i></div>
                            <div class="menu-text">Dummy text</div>
                            </a> </li>
                          <li> <a href="pages-ecommerce-product-add.php">
                            <div class="menu-icon"><i class="fa fa-plus"></i></div>
                            <div class="menu-text">Dummy text 2</div>
                            </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 -->
          <div class="vd_content-section clearfix">
         	<?php echo $content; ?>          
          </div>
          <!-- .vd_content-section --> 
         
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>