

<div class="row w-100 m-0">
	<div class="col-xl-12 p-1">
		<input id="input-preview" name="image_get" type="hidden" />
		<input type="file" name="file" id="file" class="form-control" onchange="readURL(this);">
	</div>
	<div class="col-xl-12 p-1">
		<div class="image_container my-2">
			<img id="blah" src="@if(isset($data->file)) {{asset('assets/uploads/content/pro/medium/'.$data->file)}} @endif" alt="تصویر مورد نظر را آپلود کنید" />
		</div>
	</div>
	<div class="col-xl-12 p-1">
		<div id="cropped_result"></div>
	</div>
	<div class="col-xl-12 p-1">
		<button type="button" id="crop_button" class="btn btn-space btn-primary m-0 px-5">
			بریدن عکس
		</button>
	</div>
</div>



<!--  -->
<script id="rendered-js">
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#blah').attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
		setTimeout(initCropper, 1000);
	}
}

function initCropper() {
	console.log("Came here");
	var image = document.getElementById('blah');
	var cropper = new Cropper(image, {
		aspectRatio: 1 / 1,
		crop: function(e) {
			console.log(e.detail.x);
			console.log(e.detail.y);
		}
	});
	// On crop button clicked
	document.getElementById('crop_button').addEventListener('click', function() {
		var imgurl = cropper.getCroppedCanvas().toDataURL();
		var img = document.createElement("img");
		img.src = imgurl;

        document.getElementById("input-preview").value =  img.src;

        document.getElementById("cropped_result").appendChild(img);
	});
}
</script>
<style>
	#cropped_result img {
		width: 100%;
		border: 1px solid;
		margin: 0.5rem 0;
		padding: 1rem;
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
	}
</style>