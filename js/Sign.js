var ok = {

    name:false,
    us_name:false,
    email:false,
    phon:false,
    password:false,

};

var name_;
var us_name_;
var email_;
var phon_;
var password_;


function button_enable(){

    let  post =  $("#head #main #painl #form_sig  #posts");

   

    var name = $("#head #main #painl #form_sig .form-group #name");
    var us_name = $("#head #main #painl #form_sig .form-group #us_name");
    var email = $("#head #main #painl #form_sig .form-group #emaill");
    var phon = $("#head #main #painl #form_sig .form-group #phon");
    var password = $("#head #main #painl #form_sig .form-group #passs");

    if(ok.name && ok.us_name && ok.email && ok.phon && ok.password){

        post.removeAttr("disabled");
        

    }else{
        post.attr("disabled", "disabled");
    } 

}





$(function (){




    var name = $("#head #main #painl #form_sig .form-group #name");
    var us_name = $("#head #main #painl #form_sig .form-group #us_name");
    var email = $("#head #main #painl #form_sig .form-group #emaill");
    var phon = $("#head #main #painl #form_sig .form-group #phon");
    var password = $("#head #main #painl #form_sig .form-group #passs");
    
    var post =  $("#head #main #painl #form_sig #posts");
            
    $(post).click(function (e) { 

        e.preventDefault();

        //console.log(phon_);
        
        //$.post
        post.load("../DropTalk/backEnd/sign_up_cheak.php", {
                                                name:name_,
                                                us_name:us_name_,
                                                email:email_,
                                                phon:phon_,
                                                pass:password_},function (response, status, request) {

            if(response.split(",")[0] == "us_name_error" || response.split(",")[1] == "email_error" || response.split(",")[2] == "phon_error"){

                console.log("error");

                // console.log(name_);
                // console.log(us_name_);
                // console.log(email_);
                // console.log(phon_);
                // console.log(password_);

                if(response.split(",")[0] == "us_name_error"){

                    ok.us_name = false;
                    us_name.addClass("is-invalid");
                    button_enablel();
                    
                        
                }

                if(response.split(",")[1] == "email_error"){

                    ok.email = false;
                    email.addClass("is-invalid");
                    button_enablel();
                    
                        
                }
                if(response.split(",")[2] == "phon_error"){

                    ok.phon = false;
                    phon.addClass("is-invalid");
                    button_enablel();
                    
                    
                }

            }else if(response.split(",")[3] == "1"){

            
                // response.split(",")[0] == "us_name_ok"  && ( (response.split(",")[1]).length == 0 ? true : response.split(",")[1] == "email_ok" )  && ( (response.split(",")[2]).length == 0 ? true :  response.split(",")[2] != "phon_ok")){

                console.log("ok");
                let  form =  $("#head #main #painl #form_sig");
                $(form).submit();

            }      
        });
    });


    post.attr("disabled", "disabled");

    
    
    name.keyup(function (e) { 
        
        name_ = name.val();
        
        if( (name_.length == 0) ){
            ok.name = false;
            button_enable();
            name.addClass("is-invalid");
        }else{
            

            ok.name = true;
            button_enable();
            name.removeClass("is-invalid");
            name.addClass("is-valid");

        }

        
    });

    us_name.keyup(function (e) { 
        
        us_name_ = us_name.val();
        
        if( (us_name_.length == 0) ){

            ok.us_name = false;
            button_enable();
            us_name.addClass("is-invalid");
            
        }else{
             ok.us_name = true;
            button_enable();
            us_name.removeClass("is-invalid");
            us_name.addClass("is-valid");

        }

        
    });

    email.keyup(function (e) { 
        
        email_ = email.val();


        if( (email_.length == 0) || ( !(email_.includes("@"))  || !(email_.includes(".")) )  ){
            ok.email = false;
            button_enable();
            email.addClass("is-invalid");
        }else{
    
            ok.email = true;
            button_enable();
            email.removeClass("is-invalid");
            email.addClass("is-valid");

        }

        
    });

    phon.keyup(function (e) { 
        
        phon_ = phon.val();

        
        if( (phon_.length == 0) || ( phon_.startsWith("251") ? phon_.length == 12 ?  false : true  :  phon_.length == 10 ? false : true) ){


            ok.phon = false;
            button_enable();
            phon.addClass("is-invalid");
        }else{
            
            if(phon_.startsWith("251")){
                phon_ = "+"+phon_;
            }
            else{
                phon_ = phon_.slice(1,phon_.length);
                phon_ = "+251"+phon_;
            }

            ok.phon = true;
            button_enable();
            phon.removeClass("is-invalid");
            phon.addClass("is-valid");

        }

        
    });

    password.keyup(function (e) { 
        
        password_ = password.val();
        if(password_.length == 0 || password_.length < 8){
            ok.password = false;
            button_enable();
            password.addClass("is-invalid");
        }else{
            
            ok.password = true;
            button_enable();
            password.removeClass("is-invalid");
            password.addClass("is-valid");
        }

        
    });



})