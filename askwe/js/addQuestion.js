// post question to data base 
$(document).ready(function(){
    $("#questionView").click(function(){
        $("#qun-panel-body").toggle(3000);
    });
    $("#post").click(function(){
        var message=$("#input").val();
        if(message.trim().length!=0)
        {
            $.ajax({
                url:"addQuestion.php",
                method:"POST",
                data:{
                    msg:message
                },
                success:function(data)
                {
                    alert("Question added Successfully!");
                    $("#input").val("");
                }
            });
        }
    });
});