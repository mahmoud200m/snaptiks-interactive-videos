<div class="vd_navbar vd_nav-width vd_navbar-tabs-menu <?php if (isset($current_navbar)) {echo($current_navbar);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-left") {echo($navbar_left_extra_class);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-right") {echo($navbar_right_extra_class);} ?>">
	<!-- <div class="navbar-tabs-menu clearfix">
			<span class="expand-menu" data-action="expand-navbar-tabs-menu">
            	<span class="menu-icon menu-icon-left">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>
            	<span class="menu-icon menu-icon-right">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>                
            </span>
            <div class="menu-container">
            	<div class="vd_mega-menu-wrapper">
                	<div class="vd_mega-menu"  data-intro="<strong>Tabs Menu</strong><br/>Can be placed for dropdown menu, tabs, or user profile. Responsive for medium and small size navigation." data-step=3>
        				<?php //include("templates/navbars/tabs-menu.tpl.php") ?>                    	
                    </div>                
                </div>
            </div>                                                   
    </div> -->
	<div class="navbar-menu clearfix">
        <!-- <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div> -->
    	<h3 class="menu-title hide-nav-medium hide-nav-small">Navigation Menu</h3>
        <div class="vd_menu">
        	<?php 
			  if (isset($current_navbar) && $current_navbar=="vd_navbar-left"){
				include("templates/navbars/menu-".$navbar_left_menu.".tpl.php");
			  } else if (isset($current_navbar) && $current_navbar=="vd_navbar-right"){
				include("templates/navbars/menu-".$navbar_right_menu.".tpl.php");				  
			  }			
			?>
        </div>             
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="<?php echo Yii::app()->createUrl("site/logout");?>">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>
        </ul>
    </div>     
</div>