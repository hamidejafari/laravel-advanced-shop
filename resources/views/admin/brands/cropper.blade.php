<input id="input-preview" name="image_get" type="hidden" />
<input type="file" name="image" id="image" class="form-control" onchange="readURL(this);">

<div class="image_container my-2" style="position:relative;">
	<img id="blah" src="@if(isset($data->image)) {{asset('assets/uploads/content/brand/medium/'.$data->image)}} @endif" alt="تصویر مورد نظر را آپلود کنید" />
    @if(isset($data->image))
    <a  type="button" href="{{URL::action('Admin\BrandController@getDeleteImage',$data->id)}}" onclick="return confirm('آیا از حذف عکس مطمئن هستید؟');"
        data-toggle="tooltip" data-original-title="حذف عکس" class="btn" style="position: absolute;top: 0.5rem;right: 0.5rem;padding: 0;background: #fff;border-radius: 0;box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
		<svg focusable="false" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="width: 1.5rem;color: red;" viewBox="0 0 24 24">
			<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
		</svg>
	</a>
    @endif
</div>

<div id="cropped_result"></div>

<button type="button" id="crop_button" class="btn btn-space btn-success m-0 px-5">بریدن عکس</button>

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
