var ok = {

    email:false,
    password:false,

};

var email_;
var password_;

function button_enablel(){

    let  post =  $("#head #main #painl  #form  #post");
    var email = $("#head #main #painl  #form .form-group #email");

    var password = $("#head #main #painl  #form .form-group #pass");

    



    if(ok.email && ok.password){

        post.removeAttr("disabled");

        $(post).click(function (e) { 

            e.preventDefault();
            
            //$(post).load
            $.post("../DropTalk/backEnd/log_in.php", {email:email_,pass:password_,js:""},function (response, status, request) {

                if(response.split(",")[0] == "email_error" || response.split(",")[1] == "pass_error"){

                    
                    if(response.split(",")[0] == "email_error"){

                        ok.email = false;
                        email.removeClass("is-invalid");
                        email.addClass("is-invalid");

                        button_enablel();
                        
                         
                    }
                    if(response.split(",")[1] == "pass_error"){

                        ok.password = false;
                        password.addClass("is-invalid");
                        button_enablel();
                       
                        
                    }

               }else if( response.split(",")[0] == "email_ok" && response.split(",")[1] == "pass_ok"){

                    let  form =  $("#head #main #painl  #form");
                    $(form).submit();

               }

                
            
      
            });
        });

    }else{
        post.attr("disabled", "disabled");
    } 

}

$(function (){

    var email = $("#head #main #painl  #form .form-group #email");
    var password = $("#head #main #painl  #form .form-group #pass");
    
    var post =  $("#head #main #painl  #form #post");
    post.attr("disabled", "disabled");
    

    email.blur(function (e) { 
        
        email_ = email.val();
        
        if( (email_.length == 0) || ( !(email_.includes("@"))  || !(email_.includes(".")) ) ){
            //console.log(email_);
            ok.email = false;
            button_enablel();
            email.addClass("is-invalid");
            
        }else{
        
            ok.email = true;
            button_enablel();
            email.removeClass("is-invalid");
            email.addClass("is-valid");


        }

        
    });
    password.blur(function (e) { 
        
        password_ = password.val();
        if(password_.length == 0 || password_.length < 8){
            ok.password = false;
            button_enablel();
            password.addClass("is-invalid");
        }else{
            
           
            ok.password = true;
            button_enablel();
            password.removeClass("is-invalid");
            password.addClass("is-valid");

        }

        
    });


})