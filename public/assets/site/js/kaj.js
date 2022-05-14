
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 2500) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
// owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        loop: false,
        nav: true,
        rtl: true,
        margin: 1,
        responsive: {
            0: {
                items: 2,
                dots: true
            },
            576: {
                items: 3,
                dots: true
            },
            768: {
                items: 4,
                dots: true
            },
            1200: {
                items: 5,
                dots: true
            },
            1400: {
                items: 6,
                dots: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// owl carousel more image zoom
$(document).ready(function() {
    var owl = $(".owl-carousel-zoom");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: false,
        loop: false,
        nav: true,
        rtl: true,
        margin: 1,
        dots: false,
        responsive: {
            0: {
                items: 5,
            },
            576: {
                items: 5,
            },
            768: {
                items: 5,
            },
            1200: {
                items: 6,
            },
            1400: {
                items: 6,
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// blog owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel-blog");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        dots: false,
        rtl: true,
        margin: 2,
        responsive: {
            0: {
                items: 1,
                loop: true,
                dots: true,
                nav: true
            },
            576: {
                items: 2,
                loop: true,
                dots: true,
                nav: true
            },
            768: {
                items: 3,
                loop: true,
                dots: true,
                nav: true
            },
            1200: {
                items: 4,
                loop: true,
                dots: false,
                nav: true
            },
            1400: {
                items: 4,
                loop: false,
                dots: false,
                nav: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});
// blog owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel-off");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        dots: false,
        rtl: true,
        margin: 2,
        responsive: {
            0: {
                items: 1,
                loop: true,
                nav: true
            },
            576: {
                items: 1.25,
                loop: true,
                nav: true
            },
            768: {
                items: 1.75,
                loop: true,
                nav: true
            },
            1200: {
                items: 2.75,
                loop: true,
                nav: true
            },
            1400: {
                items: 3,
                loop: false,
                nav: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// most owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel-most");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,

        rtl: true,
        margin: 2,
        responsive: {
            0: {
                items: 2,
                loop: true,
                nav: true,
                dots: true,
            },
            576: {
                items: 2,
                loop: true,
                nav: true,
                dots: true,
            },
            768: {
                items: 1.25,
                loop: true,
                nav: true,
                dots: false,
            },
            1200: {
                items: 2,
                loop: true,
                nav: true,
                dots: false,
            },
            1400: {
                items: 3,
                loop: true,
                nav: true,
                dots: false,
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// brand owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel-brand");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        dots: false,
        nav: true,
        rtl: true,
        margin: 3,
        responsive: {
            0: {
                items: 2,
                loop: true
            },
            576: {
                items: 3,
                loop: true
            },
            768: {
                items: 4,
                loop: true
            },
            1200: {
                items: 6,
                loop: true
            },
            1400: {
                items: 8,
                loop: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// owl carousel baner one
$(document).ready(function() {
    var owl = $(".owl-carousel-baner-one");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        rtl: true,
        nav: true,
        margin: 0,
        responsive: {
            0: {
                items: 1,
                loop: true,
                dots: true
            },
            576: {
                items: 3,
                loop: true,
                dots: true
            },
            768: {
                items: 3,
                loop: true,
                dots: true
            },
            1200: {
                items: 4,
                loop: true,
                dots: false
            },
            1400: {
                items: 4,
                loop: false,
                dots: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// below owl carousel
$(document).ready(function() {
    var owl = $(".owl-carousel-below");
    owl.owlCarousel({
        autoplayHoverPause: true,
        responsiveClass: true,
        autoplay: true,
        rtl: true,
        margin: 0,
        responsive: {
            0: {
                items: 2,
                loop: true,
                nav: true,
                dots: true
            },
            576: {
                items: 3,
                loop: true,
                nav: true,
                dots: true
            },
            768: {
                items: 3,
                loop: true,
                nav: true,
                dots: true
            },
            1200: {
                items: 4,
                loop: true,
                nav: false,
                dots: false
            },
            1400: {
                items: 4,
                loop: false,
                nav: false,
                dots: false
            }
        }
    });
    $(".play").on("click", function() {
        owl.trigger("play.owl.autoplay", [250]);
    });
    $(".stop").on("click", function() {
        owl.trigger("stop.owl.autoplay");
    });
});

// side nav
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// show pass
$(".toggle-password").click(function() {
    $(this).toggleClass("bi-eye-slash bi-eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// set time confirm
var h = 0;
var m = 2;
var s = 0;
var t = setInterval(c, 1000);

function c() {
    if (s < 0) {
        s = 0;
    }
    if (s === 0 && m > 0) {
        m--;
        s += 59;
    }
    if (m < 0) {
        m = 0;
    }
    if (m === 0 && h > 0) {
        h--;
        m += 59;
    }
    setTimeout(function() {
        s -= 1;
    }, 1000);
}
setTimeout(function() {
    $("#h-box").remove();
}, 122000);

// like
$(document).ready(function() {
    $(".likeButton").click(function() {
        $(this).toggleClass("liked");
    });
});
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// scrolled
$(function() {
    var header = $(".menu");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
});
//
$(function() {
    var header = $(".comparison-add");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            header.addClass("scrolled-add");
        } else {
            header.removeClass("scrolled-add");
        }
    });
});
