<script type="text/javascript" src="plugins/stellar/jquery.stellar.js"></script>
<script type="text/javascript" src="plugins/waypoints/waypoints.min.js"></script>
<script type="text/javascript" src="plugins/jquery-easing/jquery.easing.1.3.js"></script>

<script src="plugins/layerslider/js/greensock.js" type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="plugins/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="plugins/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	"use strict";
	
   $(".vd_testimonial .vd_carousel").carouFredSel({
		prev:{
			button : function()
			{
				return $(this).parent().parent().children('.vd_carousel-control').children('a:first-child')
			}
		},
		next:{
			button : function()
			{
				return $(this).parent().parent().children('.vd_carousel-control').children('a:last-child')
			}
		},		
		scroll: {
			fx: "crossfade",
			onBefore: function(){
					var target = "#front-1-clients";
					$(target).css("transition","all .5s ease-in-out 0s");				
				if ($(target).hasClass("vd_bg-soft-yellow")){						
					$(target).removeClass("vd_bg-soft-yellow");
					$(target).addClass("vd_bg-soft-red");		
				} else
				if ($(target).hasClass("vd_bg-soft-red")){						
					$(target).removeClass("vd_bg-soft-red");
					$(target).addClass("vd_bg-soft-blue");		
				} else
				if ($(target).hasClass("vd_bg-soft-blue")){						
					$(target).removeClass("vd_bg-soft-blue");
					$(target).addClass("vd_bg-soft-green");		
				} else
				if ($(target).hasClass("vd_bg-soft-green")){						
					$(target).removeClass("vd_bg-soft-green");
					$(target).addClass("vd_bg-soft-yellow");		
				} 					
			}
		},
		width: "auto",
		height: "responsive",
		responsive: true
		
	});
		
    var slide = $('.slide-waypoint');		
		
	//Setup waypoints plugin
	slide.waypoint(function(direction) {
		var dataslide = $(this).attr('data-waypoint');
	},{offset:0});		
	


	$(".feature-item, .vd_gallery .gallery-item").css("opacity",0);	
		
		
	$("#front-1-features").waypoint(function () {	
		$(".feature-1").delay().queue(function () {
			$('.feature-1').addClass("animated fadeInRightBig");				
		});	
		$(".feature-3").delay(200).queue(function () {
			$('.feature-3').addClass("animated fadeInRightBig");				
		});	
		$(".feature-5").delay(400).queue(function () {
			$('.feature-5').addClass("animated fadeInRightBig");				
		});	
		$(".feature-2").delay(600).queue(function () {
			$('.feature-2').addClass("animated fadeInRightBig");				
		});	
		$(".feature-4").delay(800).queue(function () {
			$('.feature-4').addClass("animated fadeInRightBig");				
		});	
		$(".feature-6").delay(1000).queue(function () {
			$('.feature-6').addClass("animated fadeInRightBig");				
		});																			
	
	}, 	{ offset: 600	});		
		
		
		//Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
		//easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
		function goToByScroll(dataslide) {
			if (dataslide=="home"){
				$('html,body').animate({scrollTop:0},1500, 'easeInOutQuint');	
			} else {
				$('html,body').animate({
				   scrollTop: $('.slide-waypoint[data-waypoint="' + dataslide + '"]').offset().top - 63
				}, 1500, 'easeInOutQuint');				
			}
		}	

		
		$('.vd_top-menu-wrapper .horizontal-menu .nav > li >  a[data-waypoint]').click(function (e) {		
			e.preventDefault();
			
			var dataslide = $(this).attr('data-waypoint');
			goToByScroll(dataslide);		
		});		
		
		jQuery("#layerslider").layerSlider({
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1280,
			skin: 'noskin',
			hoverPrevNext: false,
			skinsPath: 'plugins/layerslider/skins/'
		});		
});
</script>