$(function (){




    var log_In = $("#Communitie #nav #home");
    var log_In_ = $("#Communitie #Home");
    
    var sign_up = $("#Communitie #nav #popular");
    var sign_up_ = $("#Communitie #Popular")


    
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