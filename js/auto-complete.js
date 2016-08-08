var MIN_LENGTH = 2;

$( document ).ready(function() {

	$("#keyword").keyup(function() {
		var keyword = $("#keyword").val();
		if (keyword.length >= MIN_LENGTH) {
			$.get( "auto-complete.php", { keyword: keyword } )
			.done(function( data ) {
				$('#resultsLanguage').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {
					$('#resultsLanguage').append('<div class="item">' + value + '</div>');
				})


			    $('.item').click(function() {
			    	var text = $(this).html();

			    		$('#languagesSelected').append('<li class="selectedLanguage">' + text + '</li>');

			    	$('#keyword').val('');
			    	$('#resultsLanguage').html('');

			    })

			});
		} else {
			$('#resultsLanguage').html('');
		}
	});

    $("#keyword").blur(function(){
    		$("#resultsLanguage").fadeOut(500);
    	})
        .focus(function() {		
    	    $("#resultsLanguage").show();
    	});

});