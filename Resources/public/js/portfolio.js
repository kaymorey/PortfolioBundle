$(document).ready(function() {
	$("#content #home #paginator .page").click(function() {
		console.log("ok");
		$("#content #home #paginator .page").removeClass("active");
		$(this).addClass("active");
	});

	// Twitter - get last tweets
	
	loadLatestTweet();

	//Twitter Parsers
	String.prototype.parseURL = function() {
	    return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(url) {
	        return url.link(url);
	    });
	};
	String.prototype.parseUsername = function() {
	    return this.replace(/[@]+[A-Za-z0-9-_]+/g, function(u) {
	        var username = u.replace("@","")
	        return u.link("http://twitter.com/"+username);
	    });
	};
	String.prototype.parseHashtag = function() {
	    return this.replace(/[#]+[A-Za-z0-9-_]+/g, function(t) {
	        var tag = t.replace("#","%23")
	        return t.link("http://search.twitter.com/search?q="+tag);
	    });
	};
 
	function loadLatestTweet() {
	    var numTweets = 2;
	    var _url = 'https://api.twitter.com/1/statuses/user_timeline/kaymorey.json?callback=?&count='+numTweets+'&include_rts=1';
	    $.getJSON(_url, function(data) {
	   		for(var i = 0; i< data.length; i++) {
	            var tweet = data[i].text;
	            tweet = tweet.parseURL().parseUsername().parseHashtag();
	            $("#twitter_update_list").append('<p>'+tweet+'</p>');
	            $("#twitter_update_list p:first").addClass("first");
	        }
	    });
	}
});