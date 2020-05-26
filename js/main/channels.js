var ok = {

    name:false,
    bio:false,

};

var name_;
var bio_;

var post =  $("#root #Channels .NewGroup .form .post");
var name = $("#root #Channels .NewGroup .form .form-group .name");
var bio = $("#root #Channels .NewGroup .form .form-group .bio");
var form = $("#root #Channels .NewGroup .form");

function button_enablel(){

    if(ok.name && ok.bio){

        post.removeAttr("disabled");
        $(post).click(function (e) { 

            e.preventDefault();
            
            //$.post
            $(post).load("../DropTalk/backEnd/make_new_channel.php", {type:"check",name:name_,bio:bio_},function (response, status, request) {

                if(response.split(",")[0] == "channel_error"){
    
                    
                    if(response.split(",")[0] == "channel_error"){

                        ok.name = false;
                        name.addClass("is-invalid");
                        button_enablel();
                        
                         
                    }

               }else if( response.split(",")[0] == "channel_ok" ){

                    var form = $("#root #Channels .NewGroup .form");
                    $(form).submit();

               }

                
            
      
            });
        });


    }else{
        post.attr("disabled", "disabled");
    } 

}



$(function (){

    var add_but  = $("#root #Channels .newOradd > img");
    var add_g = $("#root #Channels .NewGroup");

    var close = $("#root #Channels .NewGroup #nav > #close");

    var click = 0;

    $(add_but).click(function (e) { 
        e.preventDefault();
        if (click == 0) {
            $(add_g).fadeIn(700);
            click = 1;
        }else if(click == 1){

            $(add_g).fadeOut(700);
            click = 0;
        }
        
    });
    $(close).click(function (e) { 
        e.preventDefault();
        if(click == 1){

            $(add_g).fadeOut(700);
            click = 0;
        }
        
    });


    var post =  $("#root #Channels .NewGroup .form .post");
    var name = $("#root #Channels .NewGroup .form .form-group .name");
    var bio = $("#root #Channels .NewGroup .form .form-group .bio");
    post.attr("disabled", "disabled");


    name.blur(function (e) { 
        
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
    bio.blur(function (e) { 
        
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