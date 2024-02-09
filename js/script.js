$(document).ready(function() {
    // grab the initial top offset of the navigation 
    var stickyNavTop = $('.nav').offset().top;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > stickyNavTop) {
            $('.nav').addClass('sticky');
        } else {
            $('.nav').removeClass('sticky');
        }
    };

    stickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        stickyNav();
    });
});


$(".scroll").on("click", function(event) {
    event.preventDefault();
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top - 130
    });
});

$('#navbarSupportedContent .nav-item .nav-link').on('click', function() {
    $('.navbar-collapse').collapse('hide');
});



// bottom to up
$(window).on('scroll', function() {
    var scrolled = $(window).scrollTop();
    if (scrolled > 500) $('.go-top').addClass('active');
    if (scrolled < 500) $('.go-top').removeClass('active');
});


$('.go-top').on('click', function() {
    $("html, body").animate({
        scrollTop: "0"
    }, 50);
});

function email() {

    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var subject = document.getElementById("subject");
    var comments = document.getElementById("comments");

    var f = new FormData();

    f.append("name", name.value);
    f.append("email", email.value);
    f.append("subject", subject.value);
    f.append("comments", comments.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {

                alert("Thank You! We Recieved Your comment. We'll Contact you soon...")

                window.location.reload();

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "handler.php", true);
    r.send(f);
}

function donate() {
    var name = document.getElementById("name");
    var phone = document.getElementById("ph");
    var description = document.getElementById("description");
    var price = document.getElementById("price");

    var f = new FormData();

    f.append("name", name.value);
    f.append("phone", phone.value);
    f.append("description", description.value);
    f.append("price", price.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "donation.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addDonationProcess.php", true);
    r.send(f);
}