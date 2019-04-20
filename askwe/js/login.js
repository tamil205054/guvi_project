$(document).ready(function(){
//    login script send data to login php file
    $("#login").click(function(){
         var email=$("#email").val();
         var pass=$("#logpass").val();
          
         if(email.length==0||pass.length==0)
         {
             alert("Enter the user name and password");
             return false;
         }
         else
         {
            $.ajax({
                url:"login.php",
                method:"POST",
                data:{
                    email:email,
                    password:pass
                },
                success:function(data)
                {
                    if(data==1)
                    {
                        window.location="askwe.php";
                    }
                    else
                    {
                        $("#error").html("<p>Username Password Mismatched</p>");
                    }
                }
            });
         }
    }); 
});