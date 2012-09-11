$(document).ready(function() {
	$("#content #home #paginator .page").click(function() {
		console.log("ok");
		$("#content #home #paginator .page img").removeClass("active");
		$(this).find("img").addClass("active");
	});
});