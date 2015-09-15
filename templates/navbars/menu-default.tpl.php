 <ul>
    <li <?php echo (Yii::app()->session['menu']=="forms")?"class='selected'":""; ?> >
        <a href="<?php echo Yii::app()->createUrl("admin/forms");?>">
            <span class="menu-icon"><i class="fa fa-facebook"></i></span> 
            <span class="menu-text">Interactive Posts</span>  
            <!-- <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span> -->
        </a>
<!--        <div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="layouts-simple.php">
                        <span class="menu-text">Layout Simple</span>  
                    </a>
                </li> 
            </ul>   
        </div> -->
    </li>

</ul>
<!-- Head menu search form ends --> 