function mune_init() {

    $('[href*="#"]').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({ scrollTop: (target.offset().top - 72) }, 1000);
                return false;
          }
        }
      });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#head #main #nav',
    offset: 75
  });

}


$(function (){

    mune_init();

    var log_In = $("#head #main #logup #login");
    var log_In_ = $("#head #main #painl #form");
    
    var sign_up = $("#head #main #logup #signup");
    var sign_up_ = $("#head #main #painl #form_sig")


    
    $(sign_up).click(function (e) { 

        $(log_In_).css("display", "none");
        $(sign_up_).css("display", "flex");

        // $(log_In_).fadeOut(700,function(){

        //     $(sign_up_).fadeIn(700);

        // },function(){

            $(log_In).addClass("no_ac");;
            $(log_In).removeClass("ac");

            $(sign_up).addClass("ac");;
            $(sign_up).removeClass("no_ac");
        // });

        
    });    

    $(log_In).click(function (e) { 

        $(sign_up_).css("display", "none");
        $(log_In_).css("display", "flex");

        // $(log_In_).fadeOut(700,function(){

        //     $(sign_up_).fadeIn(700);

        // },function(){

            $(log_In).addClass("ac");;
            $(log_In).removeClass("no_ac");

            $(sign_up).addClass("no_ac");;
            $(sign_up).removeClass("ac");
        // });

        
    });  





})