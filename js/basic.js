// Find window height and set top_bar height = Window height
var myWidth = 0, myHeight = 0;
$(document).ready(function() {
	if( typeof( window.innerWidth ) == 'number' ) {
		//Non-IE
		myWidth = window.innerWidth;
		myHeight = window.innerHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		//IE 6+ in 'standards compliant mode'
		myWidth = document.documentElement.clientWidth;
		myHeight = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		//IE 4 compatible
		myWidth = document.body.clientWidth;
		myHeight = document.body.clientHeight;
	}
	//window.alert( 'Width = ' + myWidth );
	//window.alert( 'Height = ' + myHeight );
});

// document ready functions
$(document).ready(function() {
	if(myWidth<myHeight){
		$("#login_div").css("backgroundSize", "cover");
	} else {
		$("#login_div").css("backgroundSize", "contain");
	}
	$("#login_div").css("height", myHeight);
	$("#reg_content").css("top", myHeight/10);
	$("#reg_content").css("height", 7*myHeight/10);
	$("#reg_content").css("width", myWidth/2);

});