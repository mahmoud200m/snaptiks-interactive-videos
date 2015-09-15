<html>

  <?php 
    $detect = new Mobile_Detect;
    if ($detect->isMobile()){
        $bgreplace = Yii::app()->getBaseUrl(true)."/uploads/forms/".$form->background_img;
        $b1replace = urlencode($form->button1_lbl);
        $b1bgreplace = Yii::app()->getBaseUrl(true)."/forms/buttons/".$form->button1_img.".png";
        $t1replace = urlencode($form->title1);
        $t2replace = urlencode($form->title2);
        $t3replace = urlencode($form->title3);
        $b2replace = urlencode($form->button2_lbl);
        $b2bgreplace = Yii::app()->getBaseUrl(true)."/forms/buttons/".$form->button2_img.".png";
        $videoId  = $form->video;
    }else{
        $variables = "form_id=".$form->id;
        $variables .= "&form_submit_url=".Yii::app()->getBaseUrl(true)."/index.php?r=site/submitForm";
        $variables .= "&background_img=".Yii::app()->getBaseUrl(true)."/uploads/forms/".$form->background_img;
        $variables .= "&title1=".urlencode($form->title1);
        $variables .= "&title2=".urlencode($form->title2);
        $variables .= "&button1_lbl=".urlencode($form->button1_lbl);
        $variables .= "&button1_img=".Yii::app()->getBaseUrl(true)."/forms/buttons/".$form->button1_img.".png";
        $variables .= "&title3=".urlencode($form->title3);
        $variables .= "&button2_lbl=".urlencode($form->button2_lbl);
        $variables .= "&button2_img=".Yii::app()->getBaseUrl(true)."/forms/buttons/".$form->button2_img.".png";
        $variables .= "&video=".$form->video;
    }
  ?>

  <head>

    <meta charset="utf-8">
    <title>Snaptiks - Interactive post</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Newsletter">
    <meta name="author" content="Snaptiks" >
    <meta name="description" content="Add yourself to our newsletter">
    <meta name="keywords" content="Newsletter">

    <meta property="og:url" content="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=site/form&id='.$form->id; ?>">
    <meta property="og:image" content="<?php echo Yii::app()->getBaseUrl(true).'/uploads/posts/'.$form->post_image; ?>">
    <meta property="og:video" content="<?php echo Yii::app()->getBaseUrl(true).'/forms/form.swf?'.$variables; ?>">
    <meta property="fb:app_id" content="208924292644059">

    <meta property="og:video:type" content="application/x-shockwave-flash">
    <meta property="og:video:width" content="470">
    <meta property="og:video:height" content="250">
    
    <meta property="og:site_name" content="Snaptiks">
    <meta property="og:title" content="<?php echo $form->title1; ?>">
    <meta property="og:type" content="video">

    <style type="text/css">
        body, html {
            margin: 0;
            height: 100%;
        }
        .formContiner {
            width: 100%;
            padding:20%;
            margin: 0 auto;
            background-size: cover;
            text-align: center;
            font-family:sans-serif;
            box-sizing: border-box;
            height: 100%;
        }
        .formContiner h2 {
            margin-bottom: 50px;
            font-size: 2.5em;
        }
        input[type="button"] {
            margin-top: 20px;
            padding: 0;
            width: 152px;
            border: 0;
            height: 35px;
            outline: 0;
            color: #fff;    
            cursor: pointer;
        }
        input[type="tel"] {
            line-height: 25px;
            padding: 0 5px;
            border-radius: 4px;
            border: 1px solid rgb(110, 102, 102);
        }
        label.error {
          display: block;
          margin-bottom: 10px;
        }
        .padd_0 {
            padding: 0;
        }
        .embed-responsive {
          position: relative;
          display: block;
          height: 0;
          padding: 0;
          overflow: hidden;
          padding-bottom: 56.25%;
        }
        .embed-responsive .embed-responsive-item, .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border: 0;
        }
        .s2, .s3 {
            display: none;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if($(".formContiner").length){
                var validator = $(".formContiner").validate({
                    rules: {
                        "mobileTXT": {
                            required: true,
                            digits: true,
                            rangelength: [11, 11]
                        }
                    }, messages: {
                        "mobileTXT": "Please enter a vaild mobile number"
                    },
                    errorPlacement: function (error, element) {
                        error.insertBefore(element);
                    }
                });
                $("#btn1").click(function () {
                    if ($(".formContiner").valid()) {
                        $(".s1").hide();
                        $(".s2").fadeIn();
                    }
                });
                $("#Button2").click(function () {
                    $(".formContiner").addClass("padd_0");
                    $(".s2").hide();
                    $(".s3").fadeIn();
                });
            }
        });
    </script>

  </head>

  <body style="margin: 0; padding: 0;">
    <?php if ($detect->isMobile()){ ?>
        <form class="formContiner" style="background: url(<?php echo $bgreplace; ?>) no-repeat center;   background-size: cover;" novalidate="novalidate">
            <div class="s1 form-group">
                <h2><?php echo $t1replace; ?></h2>
                <input type="tel" class="form-control" id="mobileTXT" name="mobileTXT" placeholder="mobile"><br>
                <input type="button"  id="btn1" value="<?php echo $b1replace; ?>" style="background: url(<?php echo $b1bgreplace; ?>) no-repeat;">
            </div>
            <div class="s2">
                <h2><?php echo $t2replace; ?></h2>
                <input type="button" id="Button2" value="<?php echo $b2replace; ?>" style="background: url(<?php echo $b2bgreplace; ?>) no-repeat;">
            </div>
            <div class="s3 embed-responsive">
                <h2><?php echo $t3replace; ?></h2>
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </form>
    <?php }else{ ?>
        <object width="470" height="250" id="myFlashMovie" align="middle">
            <param name="movie" value="<?php echo Yii::app()->getBaseUrl(true).'/forms/form.swf'; ?>" />
            <param name=FlashVars value="<?php echo $variables; ?>" />

            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="<?php echo Yii::app()->getBaseUrl(true).'/forms/form.swf'; ?>" width="470" height="250">
                <param name="movie" value="<?php echo Yii::app()->getBaseUrl(true).'/forms/form.swf'; ?>" />
                <param name=FlashVars value="<?php echo $variables; ?>" />
            <!--<![endif]-->
                <a href="//www.adobe.com/go/getflash">
                    <img src="//www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                </a>
            <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
        </object>
    <?php } ?>
  </body>

</html>