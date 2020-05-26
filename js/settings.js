var ok = {

    name:false,
    us_name:false,
    email:false,
    phon:false,
    password:false,
    old_pasword:false,
    bio:false

};

var name_;
var us_name_;
var email_;
var phon_;
var password_;
var old_pasword_;
var bio_;


function button_enable(){



    var form =  $(".main .edit_account .sign_from");

    var name = $(".main .edit_account .sign_from .form-group .name");
    var us_name = $(".main .edit_account .sign_from .form-group .us_name");
    var email = $(".main .edit_account .sign_from .form-group .emaill");
    var phon = $(".main .edit_account .sign_from .form-group .phon");
    var bio = $(".main .edit_account .sign_from .bio");
    var password = $(".main .edit_account .sign_from .form-group .passs");
    var old_pass = $(".main .edit_account .sign_from .form-group .old_pass");
    
    
    var post =  $(".main .edit_account .sign_from #posts");

    if(ok.name && ok.us_name && ok.email && ok.phon && ok.password){

        post.removeAttr("disabled");
        

    }else{
        post.attr("disabled", "disabled");
    } 

}





$(function (){


    var Post = $(".main .u .post .P");
    var Post_but =  $(".main .u .about .us_img");

    var followers = $(".main .u .post .other #followerss");
    var followers_but = $(".main .u .about .follow #followers");

    var following = $(".main .u .post .other #followings");;
    var following_but = $(".main .u .about .follow #following");;



    $(Post_but).click(function (e) { 
        e.preventDefault();

        $(followers).css("display", "none");
        $(following).css("display", "none");

        $(Post).css("display", "flex");
        
    });
    $(followers_but).click(function (e) { 
        e.preventDefault();

        $(following).css("display", "none");
        $(Post).css("display", "none");
        
        $(followers).css("display", "flex");
        
    });
    $(following_but).click(function (e) { 
        e.preventDefault();

        $(followers).css("display", "none");
        $(Post).css("display", "none");
        
        $(following).css("display", "flex");
        
    });




    // var follow_but = $(".main .u .about .name #follow");
    // let d = $(follow_but).attr("d");
    // if (d == "following") {
    //     $(follow_but).text("Unfollow");
    //     //$(follow_but).attr("href", value);
    // }
    // console.log(d);



    var name = $(".main .edit_account .sign_from .form-group .name");
    $(name).val($(name).attr("d"));
    var us_name = $(".main .edit_account .sign_from .form-group .us_name");
    $(us_name).val($(us_name).attr("d"));
    var email = $(".main .edit_account .sign_from .form-group .emaill");
    $(email).val($(email).attr("d"));

    var phon = $(".main .edit_account .sign_from .form-group .phon");
    let temp =  String($(phon).attr("d"));
    temp = temp.replace("+251","251");
    $(phon).val(Number(temp));

    var bio = $(".main .edit_account .sign_from .bio");

    var password = $(".main .edit_account .sign_from .form-group .passs");
    var old_pass = $(".main .edit_account .sign_from .form-group .old_pass");
    
    
    var post =  $(".main .edit_account .sign_from #posts");
            
    $(post).click(function (e) { 

        e.preventDefault();

        //console.log(phon_);
        
        post.load("../DropTalk/backEnd/sign_up.php", {
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
                $(form).submit();

            }      
        });
    });


    post.attr("disabled", "disabled");

    
    
    
    name.change(function (e) { 
        
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

    us_name.change(function (e) { 
        
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

    email.change(function (e) { 
        
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

    phon.change(function (e) { 
        
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

    old_pass.keyup(function (e) { 
        
        old_pass_ = old_pass.val();
        if(old_pass_.length == 0 || old_pass_.length < 8){
            ok.old_pass = false;
            button_enable();
            old_pass.addClass("is-invalid");
        }else{
            
            ok.old_pass = true;
            button_enable();
            old_pass.removeClass("is-invalid");
            old_pass.addClass("is-valid");
        }

        
    });

    bio.change(function (e) { 
        
        bio_ = bio.val();
        
        if( (bio_.length == 0) ){
            ok.bio = false;
            button_enable();
            bio.addClass("is-invalid");
        }else{
            

            ok.bio = true;
            button_enable();
            bio.removeClass("is-invalid");
            bio.addClass("is-valid");

        }

        
    });



})