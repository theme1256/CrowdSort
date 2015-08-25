(function(){
	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}
	// output information
	function Output(msg) {
		var m = $id("messages");
		m.innerHTML = msg;
	}
	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}
	// file selection
	function FileSelectHandler(e) {
		// cancel event and hover styling
		FileDragHover(e);
		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;
		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
			UploadFile(f);
		}
	}
	// output file information
	function ParseFile(file){
		// display an image
		if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					'<p><img src="' + e.target.result + '" /></p>'
				);
			}
			reader.readAsDataURL(file);
		}
		// display text
		if (file.type.indexOf("text") == 0) {
			var reader = new FileReader();
			reader.readAsText(file);
		}
	}
	// upload JPEG files
	function UploadFile(file){
		var xhr = new XMLHttpRequest();
		if (xhr.upload && (file.type == "image/jpeg" || file.type == "image/png") && file.size <= $id("MAX_FILE_SIZE").value) {
			// start upload
			xhr.open("POST", "/scripts/profilePic.php", true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(file);
		}
	}
	// initialize
	function Init(){
		var fileselect = $id("fileselect"),
			filedrag = $id("filedrag"),
			submitbutton = $id("submitbutton");
		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload){
			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";
		}
	}
	// call initialization file
	if (window.File && window.FileList && window.FileReader){
		Init();
	}
})();