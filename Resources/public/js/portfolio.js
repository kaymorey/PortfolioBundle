$(document).ready(function() {
	$("#content #home #paginator .page").click(function() {
		console.log("ok");
		$("#content #home #paginator .page").removeClass("active");
		$(this).addClass("active");
	});
});