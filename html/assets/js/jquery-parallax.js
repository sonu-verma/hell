$.fn.parallax = function ( resistance, mouse ) 
{
	$el = $( this );
	TweenLite.to( $el, 0.5, 
	{
		x : -(( mouse.clientX - (window.innerWidth/4) ) / resistance ),
		y : -(( mouse.clientY - (window.innerHeight/4) ) / resistance )
	});

};