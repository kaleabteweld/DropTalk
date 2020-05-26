var ok = {

    name:false,
    bio:false,

};

var name_;
var bio_;

function button_enablel(){

    var name = $(".settings .admin .form .name");
    var bio = $(".settings .admin .form .bio");

    var post = $(".settings .admin .form .post");

    let  form =  $(".settings .admin .form");



    if(ok.name && ok.bio){

        post.removeAttr("disabled");

        // $(post).click(function (e) { 

        //     e.preventDefault();
            
        //     //$.post
        //     $.post("../DropTalk/backEnd/get_user_id.php",function (data, textStatus, jqXHR) {
            
        //         var user_id = data
        //         console.log("id "+data);
        //         $.post("../DropTalk/backEnd/DropTalk_API.php", {
        //             type:"api",
        //             tabel:"channels_ref",
        //             function:"get_user_channels_id",
        //             arrg:[data]//,"$2y$10$y1IbF0l9bK7/f9Ww6/iEVu7DfvarJIH3sACQI35uq2n6I3T7KzUCG"]
        //             //arrg:[group_name,bio,porfile_pic,data]
            
        //         },function (data, textStatus, jqXHR) {
                        
        //                 Data = JSON.parse(data)
        //                 console.log(data); // a json file
        //                 // if(Data['group_ref']){
        //                 //     console.log("ok");
        //                 // }else{
        //                 //     console.log("error");
        //                 // }
        //             });
        
        
        
        //     });
        // });

    }else{
        post.attr("disabled", "disabled");
    } 

}



$(function (){

    var consoil = $("#consoil");
    var chat = $("#chat");
    if($(consoil).css("display") == "none"){

        $(chat).css("height", "87vh");

    }

    var settings = $(".settings");
    var but = $("#head .but");
    var Back = $(".settings .Nav .close");

    var cont = 0;

    // open
    but.click(function (e) { 
    
        if (cont == 0) {
            
            settings.css("display", "flex");
            settings.animate({
                width:"+=500px"
            },600,function (){
                cont = 1;
            })
        }

        
    });
    // close
    $(Back).click(function (e) { 
        


        if (cont == 1) {
            
            settings.animate({
                width:"-=500px"
                },600,function (){
    
                    settings.css("display", "none");
                    cont = 0;
                });
        }

            
    });


    var remove_c = $(".settings .Nav .log_out")[0];
    var remove_user = $(".settings .admin .reCh");

    $(remove_c).click(function (e) { 
        
        var t = confirm("Do U Wish To Leve This Chnnal?");
        if (t == true) {
            
        } else {
            e.preventDefault();
        }
        
    });

    $(remove_user).click(function (e) { 
        
        var t = confirm("Do U Wish To Delet This Chnnal?");
        if (t == true) {
            
        } else {
            e.preventDefault();
        }
        
    });


    var log_In = $(".settings #logup #login");
    var log_In_ = $(".settings .main");
    
    var sign_up = $(".settings #logup #signup");
    var sign_up_ = $(".settings .members");


    
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


    var name = $(".settings .admin .form .name");
    $(name).val($(name).attr("d"));
    var bio = $(".settings .admin .form .bio");
    $(bio).val($(bio).attr("d"));

    var post = $(".settings .admin .form .post");
    post.attr("disabled", "disabled");


    name.keypress(function (e) { 
        
        name_ = name.val();
        
        if( (name_.length == 0)){
            //console.log(name_);
            ok.name = false;
            button_enablel();
            name.addClass("is-invalid");
            
        }else{
        
            ok.name = true;
            button_enablel();
            name.removeClass("is-invalid");
            name.addClass("is-valid");


        }

        
    });
    bio.keypress(function (e) { 
        
        bio_ = bio.val();
        if(bio_.length == 0){
            ok.bio = false;
            button_enablel();
            bio.addClass("is-invalid");
        }else{
            
           
            ok.bio = true;
            button_enablel();
            bio.removeClass("is-invalid");
            bio.addClass("is-valid");

        }

        
    });

})