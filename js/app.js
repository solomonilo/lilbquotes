$(document).ready(function(){
	// Initialize Variables
	var img = $('img#lil_b').attr("src");

	$('button#inspire').click(function(){
		// Transform img to talking gif
		$('img#lil_b').attr("src", 'based_img/lil_b_talk.gif');

		// Stop Previous Song (if exists)

		// Play Random Song

		// Switch Gif Back
	});
});
	