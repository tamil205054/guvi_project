$(document).ready(function(){
		$(".menu-toggle").click(function(){
			$('.menu-toggle').toggleClass('active')

			$('nav').toggleClass('active')
		})
});

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
function get_user() 
{
	$.ajax({
		url:"get-user-details.php",
		method:"post",
		dataType:"json",
		data:{
			type:"get"
		},
		success:function(data)
		{
			$("#userid").val(data.id)
			$("#user-name").text(data.name)
		}
	})

}

get_user()
