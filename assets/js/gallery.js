var Gallery = (function() {

	var count, 
	 	current, 
	 	images, 
	 	image, 
	 	title;
	
	function load(page) {
		$(".gallery .images").load("/gallery/" + page + ".html", reset);
	}
	
	function reset() {
		images = $(".gallery .images img");
		count = images.length;
		current = 1;
		showImage();
	}
	
	function showImage() {
		images.hide();
		image = images.eq(current - 1);
		title = image.attr("alt");
		image.show();
		
		$(".gallery .title").text(title);
		$(".gallery .controls .position").text(current + " of " + count);
	}
	
	function prev () {
		current = (current == 1) ? count : current - 1;
		showImage();
	}
	
	function next() {
		current = (current == count) ? 1 : current + 1;
		showImage();
	}
	
	$(".gallery .controls .prev").on({'click': prev});
	$(".gallery .controls .next").on({'click': next});
	$(".gallery .images").on({'click': next}, "img");
	
	return {'load': load};
	
})();