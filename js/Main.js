// function redir_set(dir="Communitie") {

        
//     $("#root #Communitie").load("../DropTalk/backEnd/page_main.php",{type:"set",dir:dir}, function (response, status, request) {
        
//         console.log(response);
        
//     });


    
// }
// function redir_get(){   

//     $("#root #Communitie").load("../DropTalk/main.php",{type:"get"}, function (response, status, request) {
        
//         console.log(response);
//         if (response != "get_not_set") {
            

//                 let temp = response;
//                 console.log("#root #"+String(temp));
//                 $($("#root").children()).css("display", "none");
//                 $("#root #"+String(temp)).css("display", "flex");
            
//         }else if(response == "get_not_set"){

//             let temp = "Communitie";
//             console.log("#root #"+String(temp));
//             $($("#root").children()).css("display", "none");
//             $("#root #"+String(temp)).css("display", "flex");
//         }
        
//     });


// } 



$(function (){

    // redir_get();
    
    var nav_bottom = $("#nav_bottom");
    var root = $("#root");
    var search = $("#nav #find");

    //$(nav_bottom.children())
    $(nav_bottom.children()).click(function (e) { 
        e.preventDefault();
        let temp = $(this).attr("href");
        console.log("#root #"+String(temp));

        
        let t = "../DropTalk/search.php?by="+String(temp);
        search.attr("href",t);

        $($(root).children()).css("display", "none");
        $("#root #"+String(temp)).css("display", "flex");


        // redir_set(String(temp));
        
    });
    



})