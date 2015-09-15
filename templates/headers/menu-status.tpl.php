<script type="text/javascript">
function send_bug(){
    $('#bug_send_response').text("Loading ...");

    $.ajax({
        url: 'index.php?r=admin/sendBug',
        type: "post",
        data: {text: $('#bug_txt').val()},  
        error: function(xhr,tStatus,e){
            if(!xhr){
                $('#bug_send_response').text("We have an error "+tStatus+"   "+e.message);
            }else{
                $('#bug_send_response').text("else: "+e.message);
            }
        },
        success: function(resp){
            if( resp == 'done' ){
                $('#top-menu-1 .mega-link').click();
                $('#bug_txt').val('');
                $('#bug_send_response').text('');
            }else{
                $('#bug_send_response').text(resp);
            }
        } 
    });
}
</script>

<ul class="mega-ul">

    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
                <img src="img/avatar/avatar.jpg" alt="example image" />               
            </span>
            <span class="mega-name">
                <?php echo Yii::app()->user->name;?> <i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                    <li> <a href="<?php echo Yii::app()->createUrl("admin/profile");?>"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                    <li class="line"></li>                
                    <li> <a href="<?php echo Yii::app()->createUrl("site/logout");?>"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                </ul>
            </div> 
        </div> 
      </div>     
  
    </li>               
    <?php if ($navbar_right_config != 0){   ?>   
    <li id="top-menu-settings" class="one-big-icon hidden-xs hidden-sm mega-li" data-intro="<strong>Toggle Right Navigation </strong><br/>On smaller device such as tablet or phone you can click on the middle content to close the right or left navigation." data-step=2 data-position="left"> 
    	<a href="#" class="mega-link"  data-action="toggle-navbar-right"> 
           <span class="mega-icon">
                <i class="fa fa-comments"></i> 
            </span> 
<!--            <span  class="mega-image">
                <img src="img/avatar/avatar.jpg" alt="example image" />               
            </span> -->           
			<span class="badge vd_bg-red">8</span>               
        </a>              
       
    </li>
	<?php } ?>
</ul>
<!-- Head menu search form ends --> 