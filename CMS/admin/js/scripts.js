
$(document).ready(function(){

    $('#selectAllBoxes').click(function(e){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }
        else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });


    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);
    $('#load-screen').delay(200).fadeOut(100, function(){
        $(this).remove();
    });


});


function loadUsersOnline(){
    $.get("functions.php?onlineusers=result", function(data){
        $("#usersOnline").text(data);
    });
}

setInterval(function(){
    loadUsersOnline();
}, 500);




