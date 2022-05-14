<!-- jquery 3.3.1 -->
<script src="{{asset('assets/admin/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/jQueryUI/jquery-ui.min.js')}}"></script>
@yield('js')

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    UPLOADCARE_PUBLIC_KEY = "demopublickey";
</script>
<script>
    const widget = uploadcare.Widget('[role=uploadcare-uploader]');
    const preview = document.getElementById('preview');
    widget.onUploadComplete(fileInfo => {
        preview.src = fileInfo.cdnUrl;
    })
</script>
{{--<script>--}}
{{--    var h = 0;--}}
{{--    var m = 2;--}}
{{--    var s = 0;--}}
{{--    var t = setInterval(c, 1000);--}}

{{--    function c() {--}}
{{--        if (s < 0) {--}}
{{--            s = 0;--}}
{{--        }--}}
{{--        if (s === 0 && m > 0) {--}}
{{--            m--;--}}
{{--            s += 59;--}}
{{--        }--}}
{{--        if (m < 0) {--}}
{{--            m = 0;--}}
{{--        }--}}
{{--        if (m === 0 && h > 0) {--}}
{{--            h--;--}}
{{--            m += 59;--}}
{{--        }--}}
{{--        setTimeout(function() {--}}
{{--            s -= 1;--}}
{{--        }, 1000);--}}
{{--        document.getElementById("h").innerHTML = h + ":" + m + ":" + s;--}}
{{--    }--}}
{{--    setTimeout(function() {--}}
{{--        $("#h-box").remove();--}}
{{--    }, 122000);--}}
{{--</script>--}}


<!-- bootstap bundle js -->
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('assets/admin/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/admin/libs/js/main-js.js')}}"></script>
<!-- chart chartist js -->
<script src="{{asset('assets/admin/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
<!-- sparkline js -->
<script src="{{asset('assets/admin/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
<!-- morris js -->
<script src="{{asset('assets/admin/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/charts/morris-bundle/morris.js')}}"></script>
<!-- chart c3 js -->
<script src="{{asset('assets/admin/vendor/charts/c3charts/c3.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/charts/c3charts/C3chartjs.js')}}"></script>
<script src="{{asset('assets/admin/libs/js/dashboard-ecommerce.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.js"></script>
<!-- =============== ckeditor SCRIPTS ===============-->
<script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
{{--<script src="{{asset('asset/site/js/vue.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/site/js/axios.min.js')}}"></script>--}}
<script src="{{asset('assets/admin/date/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/date/bootstrap-datepicker.fa.min.js')}}"></script>
<!-- daterangepicker
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
-->
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
<!-- toast -->
<script src="{{asset('assets/admin/js/toastr.js')}}"></script>
<script src="{{asset('assets/admin/toastr/toastr.js')}}"></script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
