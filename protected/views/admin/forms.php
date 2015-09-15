<style type="text/css">
  #dashboard_container{
    margin: 0 4%;
    padding-top: 30px;
  }

  .tab-pane{
    overflow: hidden;
  }

  #file_upload_form ul{
    list-style: none;
    padding: 0;
  }
  #file_upload_form li{
    float: left;
    display: inline-flex;
    margin: 2px;
    width: 54px;
    cursor: pointer;
  }
  #file_upload_form li.selected_background, 
  #file_upload_form li.selected_button{
    border: 1px solid #a0a0a0;
  }
  #file_upload_form li:hover{
    border: 1px solid #a0a0a0;
  }
  #file_upload_form #backgrounds_template li{
    height: 67px;
  }
  #file_upload_form .buttons_template li{
    height: 12px;
  }
  #post_sample{
    margin-top: 30px;
    border-top: 2px solid #E9EAED;
    padding-top: 10px;
    /*padding: 15px;*/
    /*background-color: #E9EAED*/
  }
  #post_sample p{
    /*padding-left: 8px;*/
  }
  #post_sample img{
    margin-top: 10px;
  }

  object{
    width: 100%;
    height: 250px;
  }

  .lists_select_p, .lists_select{
    display: none;
  }

  #publish_url{
    text-align: center;
    margin-top: 10px;
    height: 100px;
  }

  .form-actions-condensed{
    text-align: right;
  }
  </style>
<script type="text/javascript">
var selected_button1 = 0;
var selected_button2 = 0;
var current_tab = 1;

var first_form_input = true;

$(document).mouseup(function (e){

  if( $("#title1_input").is(e.target) || 
      $("#title2_input").is(e.target) || $("#button1_lbl_input").is(e.target) || 
      $("#title3_input").is(e.target) || $("#button2_lbl_input").is(e.target) || 
      $("#video_input").is(e.target) ){
    if( first_form_input == false ){
      load_form_preview();
    }else{
      first_form_input = false;
    }
  }

  if( $(".button1_template").is(e.target) || $(".button1_template").has(e.target).length > 0){ // if the target of the click is the container or a descendant of the container
    if( $(".button1_template").is(e.target) ){
      button1_template = e.target;
    }else{
      button1_template = $(e.target).closest(".button1_template");
    }
  
    selected_button1 = button1_template.attr('data-id');
    $("#button1_template .selected_button").removeClass('selected_button');
    button1_template.addClass('selected_button');

    load_form_preview();
  }

  if( $(".button2_template").is(e.target) || $(".button2_template").has(e.target).length > 0){ // if the target of the click is the container or a descendant of the container
    if( $(".button2_template").is(e.target) ){
      button2_template = e.target;
    }else{
      button2_template = $(e.target).closest(".button2_template");
    }
  
    selected_button2 = button2_template.attr('data-id');
    $("#button2_template .selected_button").removeClass('selected_button');
    button2_template.addClass('selected_button');

    load_form_preview();
  }

});

function valid_inputs(){

  switch( current_tab ){

    case 1:
      if( !$("#form_image_input").val() ){  
        return false;
      }
      if( !$("#title1_input").val() ){  
        return false;
      }
      if( !$("#title2_input").val() ){  
        return false;
      }
      if( !$("#button1_lbl_input").val() ){  
        return false;
      }
      if( selected_button1 == 0 ){  
        return false;
      }
      if( !$("#title3_input").val() ){  
        return false;
      }
      if( !$("#button2_lbl_input").val() ){  
        return false;
      }
      if( selected_button2 == 0 ){  
        return false;
      }
      if( !$("#video_input").val() ){  
        return false;
      }
      if( !$("#post_text_input").val() ){  
        return false;
      }
      if( !$("#post_image_input").val() ){  
        return false;
      }
      break;

  }

  return true;    
}

function load_form_preview(){
  $('#flash_form').html('');

  // var variables = "background_img=<?php echo Yii::app()->getBaseUrl(true);?>/forms/buttons/"+selected_button1+".png";
  // variables += "&title1="+$("#title1_input").val();
  variables  = "&title1="+$("#title1_input").val();
  variables += "&title2="+$("#title2_input").val();
  variables += "&button1_lbl="+$("#button1_lbl_input").val();
  variables += "&button1_img=<?php echo Yii::app()->getBaseUrl(true);?>/forms/buttons/"+selected_button1+".png";
  variables += "&title3="+$("#title3_input").val();
  variables += "&button2_lbl="+$("#button1_lbl_input").val();
  variables += "&button2_img=<?php echo Yii::app()->getBaseUrl(true);?>/forms/buttons/"+selected_button2+".png";
  variables += "&video="+$("#video_input").val();

  var form = '<object id="myFlashMovie" align="middle"> \
                  <param name="movie" value="<?php echo Yii::app()->getBaseUrl(true);?>/forms/form.swf" /> \
                  <param name=FlashVars value="'+variables+'" /> \
                  <!--[if !IE]>--> \
                  <object type="application/x-shockwave-flash" data="<?php echo Yii::app()->getBaseUrl(true);?>/forms/form.swf"> \
                      <param name="movie" value="<?php echo Yii::app()->getBaseUrl(true);?>/forms/form.swf" /> \
                      <param name=FlashVars value="'+variables+'" /> \
                  <!--<![endif]--> \
                      <a href="http://www.adobe.com/go/getflash"> \
                          <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /> \
                      </a> \
                  <!--[if !IE]>--> \
                  </object> \
                  <!--<![endif]--> \
              </object>';

  $('#flash_form').append(form);
}

function publish(){
  $(".finish").prepend('<i id="loading_spinner" class="fa fa-spinner fa-spin mgr-10"></i>');
  $('#file_upload_form').submit();
}

function init() {
  document.getElementById("file_upload_form").onsubmit=function() {
    document.getElementById("file_upload_form").target = "upload_target";
    document.getElementById("upload_target").onload = uploadDone; //This function should be called when the iframe has compleated loading
  }
}
function uploadDone() { //Function will be called when iframe is loaded
  var ret = $('#upload_target').contents().find('body').text();
  var data = jQuery.parseJSON(ret); //Parse JSON 
  console.log(data);
  if( data[0] == "done" ) { //This part happens when the image gets uploaded.
    $.ajax({
      url: 'index.php?r=admin/saveInteractivePost',
      type: "post",
      data: {background_img: data[1], title1: $("#title1_input").val(), title2: $("#title2_input").val(), 
             button1_lbl: $("#button1_lbl_input").val(), button1_img: selected_button1, 
             title3: $("#title3_input").val(), button2_lbl: $("#button2_lbl_input").val(), button2_img: selected_button2,
             video: $("#video_input").val(), 
             post_text: $("#post_text_input").val(), post_image: data[2]},  
      error: function(xhr,tStatus,e){
        if(!xhr){
            alert(" We have an error ");
            alert(tStatus+"   "+e.message);
        }else{
            alert("else: "+e.message); // the great unknown
        }
      },
      success: function(resp){
        $('#loading_spinner').remove();
        $('#publish_url').fadeOut(function(){
          $('#publish_url').html("share this url through facebook: <br />"+resp);
          $('#publish_url').fadeIn();
        });
      } 
    });
  } else { //Upload failed - show user the reason.
    alert("Upload Failed: "+data[1]);
  } 
}
window.onload=init;
</script>
  
<h3> Welcome back !</h3>
<div id="dashboard_container">

<div class="panel widget">
  <div class="panel-heading vd_bg-grey">
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-facebook"></i> </span> Create your Interactive post </h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div id="wizard" class="form-wizard">
        <ul>
          <li><a href="#tab1" data-toggle="tab">
            <div class="menu-icon"> 1 </div>
            Design & Content </a></li>
          <li><a href="#tab2" data-toggle="tab">
            <div class="menu-icon"> 2 </div>
            Publish </a></li>
        </ul>
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-info" > </div>
        </div>
        <div class="tab-content no-bd pd-25">

          <div class="tab-pane" id="tab1">
            <form id="asdsa"></form>
            <div class="col-md-7">
              <form id="file_upload_form" method="post" enctype="multipart/form-data" action="index.php?r=admin/uploadFormImages" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Background</label>
                  <div class="col-sm-8 controls">
                    <input id="form_image_input" name="form_image_input" type="file" accept="image/*" />
                    <span class="help-inline">upload image with width: 470px & height: 250px</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title 1</label>
                  <div class="col-sm-8 controls">
                    <input id="title1_input" type="text" placeholder="Title 1" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title 2</label>
                  <div class="col-sm-8 controls">
                    <input id="title2_input" type="text" placeholder="Title 2" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Button 1</label>
                  <div class="col-sm-8 controls">
                    <ul id="button1_template" class="buttons_template"> 
                      <li class="button1_template" data-id="1"><img src="forms/buttons/1.png" /></li>
                      <li class="button1_template" data-id="2"><img src="forms/buttons/2.png" /></li>
                      <li class="button1_template" data-id="3"><img src="forms/buttons/3.png" /></li>
                      <li class="button1_template" data-id="4"><img src="forms/buttons/4.png" /></li>
                      <li class="button1_template" data-id="5"><img src="forms/buttons/5.png" /></li>
                      <li class="button1_template" data-id="6"><img src="forms/buttons/6.png" /></li>
                      <li class="button1_template" data-id="7"><img src="forms/buttons/7.png" /></li>
                      <li class="button1_template" data-id="8"><img src="forms/buttons/8.png" /></li>
                      <li class="button1_template" data-id="9"><img src="forms/buttons/9.png" /></li>
                      <li class="button1_template" data-id="10"><img src="forms/buttons/10.png" /></li>
                      <li class="button1_template" data-id="11"><img src="forms/buttons/11.png" /></li>
                      <li class="button1_template" data-id="12"><img src="forms/buttons/12.png" /></li>
                      <li class="button1_template" data-id="13"><img src="forms/buttons/13.png" /></li>
                      <li class="button1_template" data-id="14"><img src="forms/buttons/14.png" /></li>
                      <li class="button1_template" data-id="15"><img src="forms/buttons/15.png" /></li>
                      <li class="button1_template" data-id="16"><img src="forms/buttons/16.png" /></li>
                      <li class="button1_template" data-id="17"><img src="forms/buttons/17.png" /></li>
                      <li class="button1_template" data-id="18"><img src="forms/buttons/18.png" /></li>
                      <li class="button1_template" data-id="19"><img src="forms/buttons/19.png" /></li>
                    </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Button 1 Label</label>
                  <div class="col-sm-8 controls">
                    <input id="button1_lbl_input" type="text" placeholder="Text" />
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title 3</label>
                  <div class="col-sm-8 controls">
                    <input id="title3_input" type="text" placeholder="Title 3" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Button 2</label>
                  <div class="col-sm-8 controls">
                    <ul id="button2_template" class="buttons_template"> 
                      <li class="button2_template" data-id="1"><img src="forms/buttons/1.png" /></li>
                      <li class="button2_template" data-id="2"><img src="forms/buttons/2.png" /></li>
                      <li class="button2_template" data-id="3"><img src="forms/buttons/3.png" /></li>
                      <li class="button2_template" data-id="4"><img src="forms/buttons/4.png" /></li>
                      <li class="button2_template" data-id="5"><img src="forms/buttons/5.png" /></li>
                      <li class="button2_template" data-id="6"><img src="forms/buttons/6.png" /></li>
                      <li class="button2_template" data-id="7"><img src="forms/buttons/7.png" /></li>
                      <li class="button2_template" data-id="8"><img src="forms/buttons/8.png" /></li>
                      <li class="button2_template" data-id="9"><img src="forms/buttons/9.png" /></li>
                      <li class="button2_template" data-id="10"><img src="forms/buttons/10.png" /></li>
                      <li class="button2_template" data-id="11"><img src="forms/buttons/11.png" /></li>
                      <li class="button2_template" data-id="12"><img src="forms/buttons/12.png" /></li>
                      <li class="button2_template" data-id="13"><img src="forms/buttons/13.png" /></li>
                      <li class="button2_template" data-id="14"><img src="forms/buttons/14.png" /></li>
                      <li class="button2_template" data-id="15"><img src="forms/buttons/15.png" /></li>
                      <li class="button2_template" data-id="16"><img src="forms/buttons/16.png" /></li>
                      <li class="button2_template" data-id="17"><img src="forms/buttons/17.png" /></li>
                      <li class="button2_template" data-id="18"><img src="forms/buttons/18.png" /></li>
                      <li class="button2_template" data-id="19"><img src="forms/buttons/19.png" /></li>
                    </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Button 2 Label</label>
                  <div class="col-sm-8 controls">
                    <input id="button2_lbl_input" type="text" placeholder="Text" />
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Video Link</label>
                  <div class="col-sm-8 controls">
                    <input id="video_input" type="text" placeholder="youtube video link" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Post Text</label>
                  <div class="col-sm-8 controls">
                    <input id="post_text_input" type="text" placeholder="Text" />
                  </div>
                </div>                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Post Image</label>
                  <div class="col-sm-8 controls">
                    <input id="post_image_input" name="post_image_input" type="file" accept="image/*" />
                    <span class="help-inline">upload image with width: 100px & height: 100px</span>
                  </div>
                </div>

                <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
              </form>
      
            </div>

            <div class="col-md-5">
              Form Preview: 
              <div id="flash_form">
                Enter data to load the preview
              </div>
              <div id="post_sample">
                <p>You post will be displayed like this:</p>
                <img src="img/forms/post.png" />
              </div>
              <div id="facebook_post"></div>
            </div>
          </div>

          <div class="tab-pane" id="tab2">
            <div id="publish_url" class="col-md-6 col-md-offset-3">
              Click publish button <br />and your sharing url will appear here
            </div>
          </div>

          <div class="form-actions-condensed wizard">
            <div class="row mgbt-xs-0">
              <div class="col-sm-11"> 
                <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
                <a class="btn vd_btn next" href="javascript:void(0);">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a>
                <a class="btn vd_btn vd_bg-green finish" href="javascript:void(0);" onclick="publish();"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Publish</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src='plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'></script>
<script type="text/javascript">
$(document).ready(function() {
  "use strict";

  $('#wizard').bootstrapWizard({
    'tabClass': 'nav nav-pills nav-justified',
    'nextSelector': '.wizard .next',
    'previousSelector': '.wizard .prev',
    'onTabShow' :  function(tab, navigation, index){
      $('#wizard .finish').hide();
      $('#wizard .next').show();
      if ($('#wizard .nav li:last-child').hasClass('active')){
        $('#wizard .next').hide();
        $('#wizard .finish').show();
      }
      var $total = navigation.find('li').length;
      var $current = index+1;
      var $percent = ($current/$total) * 100;
      $('#wizard').find('.progress-bar').css({width:$percent+'%'});     
    },
    'onTabClick': function(tab, navigation, index) {
      return false;   
    },
    'onNext': function(){
      if( valid_inputs() ){
        current_tab++;
        scrollTo('#wizard',-100);
      }else{
        alert('inputs not valid');
        return false;
      }
    },
    'onPrevious': function(){
      current_tab--;
      scrollTo('#wizard',-100);
    }   
  }); 
});
</script>
<!-- Specific Page Scripts END -->

</div>
