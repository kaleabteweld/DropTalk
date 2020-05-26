function user_info(){

    var Data = "";
    $.post("../DropTalk/backEnd/get_user_id.php",function (data, textStatus, jqXHR) {
            
            Data = data;
            //console.log("id "+data);

            $("#kllo").load("../DropTalk/backEnd/DropTalk_API.php", {
                type:"api",
                tabel:"accounts",
                function:"get_user_Data",
                arrg:[Data]
        
            },function (data, textStatus, jqXHR) {
                    
                    Data = JSON.parse(data)
                    console.log(Data); // a json file
                });
            
        },
        
    );

    


} 
function make_group(group_name,bio,porfile_pic="/img/img.jpg") {
    
    $.post("../DropTalk/backEnd/get_user_id.php",function (data, textStatus, jqXHR) {
            

        var user_id = data
        console.log("id "+data);
        $("#kllo").load("../DropTalk/backEnd/DropTalk_API.php", {
            type:"api",
            tabel:"group_ref",
            function:"get_user_channels_id",
            arrg:[data]//,"$2y$10$y1IbF0l9bK7/f9Ww6/iEVu7DfvarJIH3sACQI35uq2n6I3T7KzUCG"]
            //arrg:[group_name,bio,porfile_pic,data]
    
        },function (data, textStatus, jqXHR) {
                
                Data = JSON.parse(data)
                console.log(data); // a json file
                // if(Data['group_ref']){
                //     console.log("ok");
                // }else{
                //     console.log("error");
                // }
            });



    });
}
$(function (){

    user_info();
    make_group("Dalol Web Serices","z bast wab div plase")



})