// sign in form validation and ajax post data into signup.php file
// signup and login page toggle
function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  } 
    return (false)
}
$(document).ready(function(){
    $("#signupclick").click(function(){
        $("#log-body").hide();
        $("#sign-body").toggle();
    });
    $("#loginclick").click(function(){
        $("#log-body").toggle();
        $("#sign-body").hide();
    });
    $("#logNew").click(function(){
        $("#sign-body").hide();
        $("#log-body").toggle();
      
    });
    $("#createNew").click(function(){
        $("#log-body").hide();
        $("#sign-body").toggle();
    })
    $('#uname').blur(function(){
        var uname=$("#uname").val();
        if(ValidateEmail(uname))
        {
        $.ajax(
            {
                url:'validation.php',
                method:'post',
                data:
                {
                    name:uname
                },
                success:function(data){
                    if(data=='success')
                    {
                        $('#check').html("<span class='text-success'>User name Avilable</span>")
                    }
                    else
                    {
                        $('#check').html("<span class='text-danger'>User name Not Avilable</span>")
                    } 
                }
            }
            
        )
        }
        else
        {
            $('#check').html("<span class='text-danger'>Enter valid user name</span>")
        }
         
    })
    $("#signup").click(function(e){
        e.preventDefault()
        var uname=$("#uname").val();
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var pass=$("#pass").val();
        var cpass=$("#cpass").val();
        var city=$("#city").val();
        var phone=$("#phone").val();
       
        if(uname.length==0)
        {
            alert("please enter the user name");
            return false;
        }
        else if(fname.length==0)
        {
            
            alert("please enter the first name");
            return false;
        }
        else if(lname.length==0)
        {
            
            alert("please enter the last name");
            return false;
        }
        else if(pass.length==0)
        {
            
            alert("please enter the some password");
            return false;
        }
        else if(cpass.length==0)
        {
            
            alert("please enter the confirm password");
            return false;
        }
        else if(cpass.length!=pass.length)
        {
            
            alert("password and confirm password doesn't matched!");
            return false;
        }
        else if(city.length==0)
        {
            
            alert("please enter the city");
            return false;
        }
        else if(phone.length==0)
        {
            
            alert("pleace enter the mobile number");
            return false;
        }
        else if(phone.length<10)
        {
            alert("please enter the valid phone number");
        }
         else
         {
            $.ajax({
                url:"signup.php",
                method:"POST",
                data:{ 
                    uname:uname,
                    fname:fname,
                    lname:lname,
                    pass:pass,
                    city:city,
                    phone:phone
                },
                success:function(data)
                {
                    if(data==1)
                    {
                        alert("Login successfully,please login!");
                        $("#log-body").toggle();
                        $("#sign-body").hide();
                        $("#uname").val("");
                        $("#fname").val("");
                        $("#lname").val("");
                        $("#pass").val("");
                        $("#cpass").val("");
                        $("#city").val("");
                        $("#phone").val("");
                    } 
                }
            });
         }
    });
    // forgot password
    $('#for_up').click(function(){
        var email=$('#for_email').val();
        var phone=$('#for_phone').val();
        var pass=$('#for_pass').val();
        var repass=$('#for_re_pass').val()
        if(email.length==0)
        {
            
            alert("please enter the user name");
            return false;
        }
        else if(!(ValidateEmail(email)))
        {
        alert("enter the valid user name")
        return false;
        } 
        else if(phone.length==0)
        {
            
            alert("please enter the phone number");
            return false;
        }
        else if(phone.length>10)
        {
            
            alert("please enter the valid phone number");
            return false;
        }
        else if(pass.length==0)
        {   
            alert("please enter the some password");
            return false;
        }
        else if(pass.length!=repass.length)
        {
            
            alert("password and re-password mismatched!");
            return false;
        }
        else
        {
            $.ajax(
                {
                    url:'forgot.php',
                    method:'post',
                    data:{
                        user:email,
                        pass:pass,
                        phone:phone
                    },
                    success:function(data)
                    {
                        alert(data)
                    }
                }
            )
        }
    }) 
});