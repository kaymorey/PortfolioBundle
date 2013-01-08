$(document).ready(function() {

	var browserWidth = $(document).innerWidth();
	var browserHeight = $(window).height();

	$("section.main").width(browserWidth);
	$("section.main").height(browserHeight);
	//console.log(browserWidth);

	$(window).resize(function(){
		browserWidth = $(window).innerWidth();
		browserHeight = $(window).innerHeight();
		$("section.main").width(browserWidth);
		$("section.main").height(browserHeight);
	});

	// Navigation
	$('nav').localScroll();
	// Slider
	$("#content #home #paginator .page").click(function() {
		$("#content #home #paginator .page").removeClass("active");
		$(this).addClass("active");
	});

	$(".slider img").hide();
	$(".slider img:first").show();

	if($(".slider").length > 0) {
		$(".slider").circleCSS3Slider({
			auto: true,
			animationSpeed : 1000,
			animationInterval : 6000,
			sliderClass : ".slider",
			sliderElementClass : "img",
			paginatorElement : "#paginator",
			animationElement : "#breakApartRounded"
		});
	}
});