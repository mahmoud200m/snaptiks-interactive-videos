<style type="text/css">
  #dashboard_container{
    margin: 0 4%;
    padding-top: 30px;
  }
  #fb_App_container{
    overflow: hidden;
    background-image: url('img/FB-App.png');
    background-repeat: no-repeat;
    background-position: left;
    padding: 35px 0 40px 145px;
    margin-bottom: 40px;
  }
  #fb_App_container h4{
    margin-bottom: 20px;
  }
  #fb_App_container input{
    float: left;
    width: 40%;
    height: 35px;
    margin-right: 2%;
  }
</style>
<script type="text/javascript">
  function verfiy_inputs(){
    var input_val = $("#email").val();
    if( !(input_val == null || input_val == "") ){
        var atpos = input_val.indexOf("@");
        var dotpos = input_val.lastIndexOf(".");
        if( atpos < 1 || dotpos < atpos+2 || dotpos+2 >= input_val.length ){
            alert("Not a valid e-mail address");
            return false;
        }
    }

    var input_val = $("#password").val();
    if( !(input_val == null || input_val == "") ){
        if( input_val != $("#password_confirmation").val() ){
            alert("Password confirmation must be the same as password");
            return false;
        }    
    }

    $( ".form-horizontal" ).submit();
  }  
</script>

<div class="row">
  <div class="col-md-12">
    <div class="panel widget">
      <div class="panel-heading vd_bg-grey">
        <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-group"></i> </span> Edit Profile </h3>
      </div>
      <div class="panel-body">
        <?php echo CHtml::beginForm('', 'get', array('class'=>'form-horizontal', 'role'=>'form')); ?>
          <div class="form-group">
            <label class="col-sm-4 control-label">Username</label>
            <div class="col-sm-6 controls">
              <input id="username" name="username" type="text" placeholder="Username" />
              <span class="help-inline">current: '<?php echo $username;?>'</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Email</label>
            <div class="col-sm-6 controls">
              <input id="email" name="email" type="text" placeholder="Email" />
              <span class="help-inline">current: '<?php echo $email;?>'</span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Password</label>
            <div class="col-sm-6 controls">
              <input id="password" name="password" type="password" placeholder="Password" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Password Confirmation</label>
            <div class="col-sm-6 controls">
              <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Password Confirmation" />
            </div>
          </div>
          <div class="form-actions-condensed row mgbt-xs-0">
            <div class="col-sm-12"> <a id="submit_button" class="btn vd_btn vd_bg-green vd_white" href="javascript:void(0);" onclick="verfiy_inputs();"><span class="menu-icon"><i class="fa fa-fw fa-check-circle"></i></span> Edit</a> </div>
          </div>
        <?php echo CHtml::endForm(); ?>
      </div>
    </div>
    <!-- Panel Widget --> 
  </div>
  <!-- col-md-12 --> 
</div>
<!-- row -->

