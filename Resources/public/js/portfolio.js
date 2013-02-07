$(document).ready(function() {

	var browserWidth = $(document).innerWidth();
	var browserHeight = $(window).height();

	$("section.main").width(browserWidth);
	if(browserHeight >= 543) {
		$("section.main").height(browserHeight);
	}
	else {
		$("section.main").css("min-height", browserHeight);
	}
	//console.log(browserWidth);

	$(window).resize(function(){
		browserWidth = $(window).innerWidth();
		browserHeight = $(window).innerHeight();
		$("section.main").width(browserWidth);
		if(browserHeight >= 543) {
			$("section.main").height(browserHeight);
		}
		else {
			$("section.main").css("min-height", browserHeight);
		}
	});

	// Navigation
	$('nav').localScroll();

	// Projets - see more
	$(".projects figure .see-more").live({
		mouseenter : function() {
			$(this).fadeTo(400, 0.75);
		},
		mouseleave : function() {
			$(this).fadeTo(400, 0);
		}
	});

	// Projets - changer de catégorie
	$("#projects .categories a").click(function() {
		id = $(this).attr("data-id");
		$("#projects .projects").html('<img src="bundles/kaymoreyportfolio/images/ajax-loader.gif" alt="" class="loader" />');
		$.ajax({
			url : Routing.generate("portfolio_load_works_category", {"id" : id}),
			type : "POST",
			success : onLoadProjectsSuccess,
			error : onLoadProjectsFail
		});
		$("#projects .categories li").removeClass("active");
		$(this).parent("li").addClass("active");
		return false;
	});
	function onLoadProjectsSuccess(data) {
		$("#projects .projects").html(data);
	}
	function onLoadProjectsFail() {
		$("#projects .projects").html("Problème lors du chargement des données");	
	}

	// Footer - tooltip
	$('.social-tooltip').live({
		mouseenter : function() {
			$(this).tooltip('show');
		},
		mouseleave : function() {
			$(this).tooltip('hide');
		}

	});


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