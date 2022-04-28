$(document).ready(function(){

    $("#send-btn").on("click", function(){
        value = $("#data").val();
        msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+value+'</p></div></div>';
        $(".form").append(msg);
        $("#data").val('');

        $.ajax({
            url: 'assets/config/bot.php',
            type: 'POST',
            data: {value:value},
            success: function(result){
                replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa-solid fa-robot"></i></div><div class="msg-header"><p>'+result+'</p></div></div>';
                $(".form").append(replay);
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });

    });

});