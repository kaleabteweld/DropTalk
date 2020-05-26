$(function (){


    var search = $("#nav #find");
    var type = $("#type p");
    type = $(type).text();

    $(search).keyup(function (e) { 
        
        var user_id;

    // $.post("../DropTalk/backEnd/get_user_id.php",function (data, textStatus, jqXHR) {
            

    //     user_id = data;
        console.log(search.val());
        $(".main #root").load("../DropTalk/backEnd/search.php", {data:search.val(),type:type},
            function (data, textStatus, jqXHR) {
                //console.log(data);
            },

        );


    // });

    });


})