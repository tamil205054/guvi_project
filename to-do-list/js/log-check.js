
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
			if(data=="true")
			{		
					window.location.href = "http://localhost/to-do-list/index.html";
			}	
			
		}
	})
}
check_user();