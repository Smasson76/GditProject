
function toggleMenu() {
    var x = document.getElementById("global-menu");
    if (x.className === "site-menu") {
        x.className += " responsive";
    } else {
        x.className = "site-menu";
    }
}



// (function($) {
// 	var toggle;
	
// 	function onDocumentReady() {
// 		toggle = $(document.getElementById("toggle"));
		
// 		toggle.on("click", onToggleClick);
// 	}
	
// 	function onToggleClick(e) {
// 		var clicked = $(e.currentTarget);
		
// 		clicked.toggleClass("active");
// 	}
	
// 	$(onDocumentReady);
// })(jQuery);