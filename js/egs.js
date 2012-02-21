$('document').ready(function() {
	
	$("body").prepend('<ul id="notifications"></ul>');
	
	/*!
	 * input place holders
	 */ 
	$('input[type="text"]').placeholderFunction('input-focused');
	
	$('#flagstable').hide();
	
	$('#flagstoggle').click(function(){
		$('#flagstable').toggle();
	});

	/*!
	 * thing to make akill timed section appear
	 */
	$('section#timed').hide();
	$('select#akill_type').change(function() {
		if ($(this).val() == "!T") {
			$('section#timed').slideDown();
		} else {
			$('section#timed').slideUp();
		}
	});
	
	/*!
	 * navigation tabs
	 */
	/*
	$(".tab").hide();
  	
  	if($("nav#secondary ul li.current").length < 1) {
    	$("nav#secondary ul li:first-child").addClass("current");    
  	}
  	
	var link = $("nav#secondary ul li.current a").attr("href");
	$(link).show();
  	
	$("nav#secondary ul li a").click(function() {
		if(!$(this).hasClass("current")) {
			$("nav#secondary ul li").removeClass("current");
			$(this).parent().addClass("current");
			$(".tab").hide();
			var link = $(this).attr("href");
			$(link).show();
		}
		
		return false;
	});
	*/
	
});
