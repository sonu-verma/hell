
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(550).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(550).css({'overflow':'visible'});
  
  // select option js
  // $('.selectpicker').selectpicker(); 
})

$(document).ready(function(){
  $('.owl-banner').owlCarousel({
             items: 1,
              loop: true,
              margin: 10,
              autoplay: true,
              autoplayTimeout: 3000,
              autoplayHoverPause: true,
              nav:true,
             navText: [
            "<img src='assets/images/arrw-left.png'>",
            "<img src='assets/images/arrw-right.png'>"
          ],
  });
// header js
$(window).scroll(function() {
    if ($(this).scrollTop() <= 100) { 
         $('.header').removeClass('fixed-header');
      $('.header .h-r-bottom li.call-us').removeClass('show-call');  
      $('.vertical-menu').removeClass('v-menu-top');   
      
    //console.log("else");
    
    }
    else{
    $('.header').addClass('fixed-header');
    $('.vertical-menu').addClass('v-menu-top');     
    console.log("if ggd");
     setTimeout(function(){        
     $('.header .h-r-bottom li.call-us').addClass('show-call');
          $('.header .fixed-header').css('background','#fff');
        }, 300); 
    
    }
});

$('.header.inner-header .navbar-toggle').click(function(){
    $('.vertical-menu').toggleClass('show-hori-menu');
    $('.fa-bars').toggleClass('fa-close');
  }); 

$('.th-seachAddon').click(function(){
  $(this).find('.addon-search').css('display','block');
});

$('.close-addon').click(function(){//alert('ad');
  $('.addon-search').addClass('addon-none');
  setTimeout(function(){$('.addon-search.addon-none').removeClass('addon-none').css('display','none'); }, 100);
});


// datepicker
  $('.datePicker').datepicker({
            format: 'mm/dd/yyyy'
        }).on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
// datepicker ends here

/*ios zoom disable js*/
function zoomDisable(){
  $('head meta[name=viewport]').remove();
  $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />');
}
$("input[type=text], textarea").on({ 'touchstart' : function() {
    zoomDisable();
}});


// transaction page preview and upload image js 
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

  // increase decrease value js start here
$(".incr-btn").on("click", function (e) {
    var $button = $(this);
    var oldValue = $button.parent().find('.quantity').val();
    $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
    if ($button.data('action') == "increase") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below 1
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
            $button.addClass('inactive');
        }
    }
    $button.parent().find('.quantity').val(newVal);
    e.preventDefault();
});

  $('.cjs-login').click(function(e){
      console.log('asd');
      $('.loginDrop').addClass('open');
      $('.loginDrop').find('a').attr('aria-expanded','true');
      e.stopPropagation();
  });

  // $('select[name="country_selector"]').awselect()

  
// $('.call-customer .circle-animate').css('visibility','hidden');

 $('.loginWrap .list-inline li').click(function (e) {
        e.stopPropagation();
        // alert();
    });
  
  $('.VM-btn').click(function(){
    $('#VH-vontent-1').show();
    $('#VH-vontent-2').hide();
    $(this).addClass('btn-primary');
  });
  $('.kyc-btn').click(function(){
    $('#VH-vontent-2').show();
    $('#VH-vontent-1').hide();
    $(this).addClass('btn-primary');
  });

  $('.owl-mobile-testi').owlCarousel({
             items: 1,
              loop: true,
              margin: 10,
              autoplay: true,
              autoplayTimeout: 3000,
              autoplayHoverPause: true,
              nav:true,
             navText: [
            "<img src='assets/images/arrw-left.png'>",
            "<img src='assets/images/arrw-right.png'>"
          ],
  });

  

  // var owl = $('.owl-banner');
  //   owl.owlCarousel({
  //     items: 1,
  //     loop: true,
  //     margin: 10,
  //     autoplay: true,
  //     autoplayTimeout: 3000,
  //     autoplayHoverPause: true,
  //     dots:false,
  //     nav:true,
  //     navText: [
  //       "<img src='assets/images/banner_left_arrow.png'>",
  //       "<img src='assets/images/banner_right_arrow.png'>"
  //     ],
  //   });
  //   $('.play').on('click', function() {
  //     owl.trigger('play.owl.autoplay', [1000])
  //   });
  //   $('.stop').on('click', function() {
  //     owl.trigger('stop.owl.autoplay')
  //   });








});
var stop_anim=0;
$(window).on('scroll', function() {
    var scrollTop = $(this).scrollTop();

    $('.delivery-through').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-500) < scrollTop ) {//alert('sads');
            $('.delivery-through .list-unstyled li.bg-white').addClass('animated slideInDown');
            $('.delivery-type .round-text').addClass('animated pulse');
        }
    });


   

    $('.how-it-works').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.how-it-works').addClass('animated slideInUp');
        }
    });
     $('.our-services').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.our-services').addClass('animated slideInUp');
        }
    });
    $('.why-logistiksforce').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.why-logistiksforce').addClass('animated slideInUp');
        }
    });
    $('.book-n-track').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.book-n-track').addClass('animated slideInUp');
        }
    });
    $('.testimonial').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.testimonial').addClass('animated slideInUp');
        }
    });
    $('.footer').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-650) < scrollTop ) {//alert('sads');
            $('.footer').addClass('animated slideInUp');
        }
    });



    $('.join-us').each(function() {
        var topDistance = $(this).offset().top;
        if ( (topDistance-200) < scrollTop ) {
         // alert('sads');
        $('.join-us .count-here').addClass('count');
              stop_anim++;
              if(stop_anim<=1){
                 $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
              }
            
           
        }
    });
});


/*-------- Step FORM START-------*/
$(document).ready(function () { 

   var navListItems = $('div.setup-panel div a,div.V-setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
      
             $('.owl-carousel2').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 4,
                    nav: false
                  },
                  1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                    margin: 10
                  }
                }
              });
      
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
           nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
	 // customer dashboard filter js
    $('.filter-here').click(function(){
        $('.filter-table').slideToggle();
        $(this).toggleClass('filtered');
    });

    // transaction page js start here
    $('.select-mode').click(function(){
        $('.showArrowOne').addClass('animated slideInDown ArrowOne');
        $(this).addClass('selected-mode');
    });

    $('.showArrowOne').click(function(){
        $('.showFirstFold').addClass('animated slideInDown FirstFold');
        $('.showArrowTwo').addClass('animated slideInDown ArrowOne');
    });

    $('.showArrowTwo').click(function(){
        $('.showSecndFold').addClass('animated slideInDown SecndFold');
        $('.showArrowTwo').addClass('animated slideInDown ArrowOne');
        $('.trans-submit').addClass('animated slideInDown ArrowOne');
    });

 

  $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
  });





});


















document.getElementById('fake-file-button-browse').addEventListener('click', function() {
  document.getElementById('files-input-upload').click();
});

document.getElementById('files-input-upload').addEventListener('change', function() {
  document.getElementById('fake-file-input-name').value = this.value;
  
  document.getElementById('fake-file-button-upload').removeAttribute('disabled');
});
  
/*-------- Step FORM END--------*/




window.onload=function(){
  $('.selectpicker').selectpicker();

};