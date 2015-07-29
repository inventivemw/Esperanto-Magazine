var doit;

function resizedw() {

}

function highlight( items ) {
	items.filter(":eq(1)").css({
		opacity : 1
	});
	return items;
}
function unhighlight( items ) {
	items.css({
		opacity : .5
	});
	return items;
}

$(window).ready(function()  {
	$('#carousel').carouFredSel({
		align: 'center',
		prev: {
			button: '#prev',
			onBefore: function( data ) {
				unhighlight( data.items.old );
			},
			onAfter	: function( data ) {
				highlight( data.items.visible );
			}
		},
		next: {
			button : '#next', 
			onBefore: function( data ) {
				unhighlight( data.items.old );
			},
			onAfter	: function( data ) {
				highlight( data.items.visible );
			}
		},
		width: '100%',
		auto: false,
		scroll: 1,
		items: {
			height: 'auto',
			start: 1,
			visible: {
				min: 3,
				max: 6
			}
		}
	});
});

highlight( unhighlight( $("#carousel > *") ) );

$(window).on('scroll', function() {
    var y_scroll_pos = window.pageYOffset;
    var scroll_pos_test = 500;             // set to whatever you want it to be

    if(y_scroll_pos > scroll_pos_test) {
        $(".scrollToTop").css("display","block");
    } else {
    	$(".scrollToTop").css("display","none");
    }
});

$(".scrollToTop").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});