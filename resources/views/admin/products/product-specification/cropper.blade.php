<input id="input-preview{{$row->id}}" name="image_get[{{$row->id}}]" type="hidden" />
<input type="file" name="image{{$row->id}}" id="image{{$row->id}}" class="form-control" onchange="readURL{{$row->id}}(this);">

<div class="image_container my-2">
    <img id="blah{{$row->id}}" alt="تصویر مورد نظر را آپلود کنید" />
</div>

<div id="cropped_result{{$row->id}}"></div>

<button type="button" id="crop_button{{$row->id}}" class="btn btn-space btn-success m-0 px-5">بریدن عکس</button>

<!--  -->
<script id="rendered-js">
    function readURL{{$row->id}}(input) {
        console.log('---------');
        console.log({{$key==1?'0':$key}});
        console.log({{$key}});
        console.log('---------');
        if (input.files && input.files[{{$key==1?'0':$key}}]) {
            var reader{{$row->id}} = new FileReader();
            reader{{$row->id}}.onload = function(e) {
                $('#blah{{$row->id}}').attr('src', e.target.result);
                console.log('heeeelo');
            };
            reader{{$row->id}}.readAsDataURL(input.files[{{$key==1?'0':$key}}]);
            setTimeout(initCropper{{$row->id}}, 1000);
        }
    }

    function initCropper{{$row->id}}() {
        console.log("Came here");
        var image{{$row->id}} = document.getElementById('blah{{$row->id}}');
        var cropper{{$row->id}} = new Cropper(image{{$row->id}}, {
            aspectRatio: 16 / 9,
            crop: function(e) {
                console.log(e.detail.x);
                console.log(e.detail.y);
            }
        });
        // On crop button clicked
        document.getElementById('crop_button{{$row->id}}').addEventListener('click', function() {
            var imgurl{{$row->id}} = cropper{{$row->id}}.getCroppedCanvas().toDataURL();
            var img{{$row->id}} = document.createElement("img");
            img{{$row->id}}.src = imgurl{{$row->id}};

            document.getElementById("input-preview{{$row->id}}").value =  img{{$row->id}}.src;

            document.getElementById("cropped_result{{$row->id}}").appendChild(img{{$row->id}});
        });
    }
</script>
