// JavaScript Document

	$(function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 300000,
			max: 1550000,
			values: [ 300000, 1550000],
			slide: function( event, ui ) {
				$( "#lowPrice" ).val(ui.values[ 0 ]);				               
				$( "#highPrice" ).val(ui.values[ 1 ] );
			}
		});
		$( "#lowPrice" ).val($( "#slider-range" ).slider( "values", 0 ));
		$( "#highPrice" ).val($( "#slider-range" ).slider( "values", 1 ) );
	});