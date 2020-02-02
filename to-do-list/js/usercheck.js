
function check_user()
{
	$.ajax({
		url:'check.php',
		method:"post",
		data:{
			type:"check"
		},
		success:function(data)
		{
			// alert(data)
			if(data=="false")
			{
				
					window.location.href = "http://localhost/to-do-list/login.html";	
			}	
		}
	})
}
check_user();