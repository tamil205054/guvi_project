$(document).ready(function(){
	$("#login").on('submit',function(e){
		e.preventDefault();
		var name=$('#uname').val();
		var pass=$('#pwd').val();
		if(name==""|| name==null)
		{
			$("#uname_error").text("enter the user name");
		}
		else if(pass==""|| pass==null)
		{
			$("#pwd_error").text("enter the password");
		}
		else
		{
				$.ajax({
				url:'login.php',
				method:"post",
				data:{
					type:'login',
					uname:name,
					pass:pass
				},
				success:function(data)
				{
					alert(data)
					if(data=='true')
					{
						window.location.href = "http://localhost/to-do-list/index.html";
					}
				}
			})
		}
	});
	function isMail(mail)
	{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return emailReg.test(mail );
	}
	$("#signup").on('submit',function(e){
		e.preventDefault();
		var name=$('#uname').val();
		var email=$('#email').val();
		var pass=$('#pwd').val();
		var cpass=$('#cpwd').val();

		if(name==""|| name==null)
		{
			$("#uname_error").text("enter the user name");
		}
		else if(email==""|| email==null)
		{
			$("#email_error").text("enter the mail");
		}

		else if(!isMail(email))
		{
			$("#email_error").text("enter the valid email");
		}
		else if(pass==""|| pass==null)
		{
			$("#pwd_error").text("enter the password");
		}
		
		else if(cpass==""|| cpass==null)
		{
			$("#cpwd_error").text("enter the confirm password");
		}

		else if(pass.length!=cpass.length)
		{
			$("#cpwd_error").text("confirm password mismatched");
		}
		else
		{
			$.ajax({
				url:"add.php",
				type:"post",
				data:{
					type:"signup",
					uname:name,
					email:email,
					pass:pass
				},
				success:function(data)
				{
					
					if(data=="true")
					{
						window.location.href = "http://localhost/to-do-list/login.html";
					}
				}
			})
		}

	})
	$("#uname").click(function(){
		$("#uname_error").text("")
	})

	$("#pwd").click(function(){
		$("#pwd_error").text("")
	})

	$("#cpwd").click(function(){
		$("#cpwd_error").text("")
	})
	$("#email").click(function(){
		$("#email_error").text("")
	})

})





// login validation check




















