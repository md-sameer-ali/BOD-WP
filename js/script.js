
$(document).ready(function () {
  
  if ($(".count")[0]) {
    $(window).on('scroll', function () {
      let st = $(this).scrollTop(),
        vh = $(this).height(),
        $counter = $('.counter-area-main'),
        ct = $counter.offset().top;
      if ((st + vh) > ct) {
        // #counter is in the viewport
        $('.count').each(function () {
          let $this = $(this),
            countTo = $this.attr('data-number');

          $({ countNum: $this.text() }).animate({
            countNum: countTo
          },

            {

              duration: 2000,
              easing: 'linear',
              step: function () {
                $this.text(Math.floor(this.countNum));
              },
              complete: function () {
                $this.text(this.countNum);
                //alert('finished');
              }

            });


        });
      }
    })
  }


  // Select li elements that have ul as children
  $('.nav-ul li:has(ul)').each(function () {
    // Append a div to their child a tags
    $(this).children('a').append('<span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>');
  });


  if ($(window).width() <= 991) {
    $(".nav-ul .dropdown-arrow").on("click", function (e) {
      e.preventDefault();
      if ($(this).parent().hasClass("active")) {
        $(this).parent().removeClass("active");
        $(this)
          .parent().siblings(".sub-menu")
          .slideUp(200);
      } else {
        $(".nav-ul .dropdown-arrow").parent().removeClass("active");
        $(this).parent().addClass("active");
        $(".sub-menu").slideUp(200);
        $(this)
          .parent().siblings(".sub-menu")
          .slideDown(200);
      }
    });
  }

  $(".menu-bar").on('click', function () {
    $(".header .nav-area").addClass("mobi-nav-active");
    $(".black-overlay").fadeIn();
  });
  $(".cross").on('click', function () {
    $(".header .nav-area").removeClass("mobi-nav-active");
    $(".black-overlay").fadeOut(1000);
  });
  $(".black-overlay").on('click', function () {
    $(".header .nav-area").removeClass("mobi-nav-active");
    $(this).fadeOut(1000);
  });

  $(".faqs-area .set > a").on("click", function (e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".faqs-area .content")
        .slideUp(200);
      $(".faqs-area .set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".faqs-area .set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".faqs-area .set > a").removeClass("active");
      $(this).addClass("active");
      $(".faqs-area .content").slideUp(200);
      $(this)
        .siblings(".faqs-area .content")
        .slideDown(200);
    }

  });

    $('#Tswitch').on('change', function () {
      if ($(this).is(':checked')) {
        $('.card-head-details .price-yearly').show();
        $('.card-head-details .price-quarterly').hide();
      } else {
        $('.card-head-details .price-yearly').hide();
        $('.card-head-details .price-quarterly').show();
      }
    });
    $('#Tswitch2').on('change', function () {
      if ($(this).is(':checked')) {
        $('.price-show-area .price-yearly').show();
        $('.price-show-area .price-quarterly').hide();
      } else {
        $('.price-show-area .price-yearly').hide();
        $('.price-show-area .price-quarterly').show();
      }
    });

});
