$("#add-to-do").on('submit',function(e){
	e.preventDefault();
	var des=$("#des").val()
	$.ajax({
		url:"add-to-do.php",
		method:"post",
		data:{
			type:"add",
			des:des
		},
		success:function(data)
		{
			
			if(data="true")
			{
				alert("task add");
				$("#des").val("");
				fetch_to_do();
			}
		}
	})
})
$(document).on('click','.remove',function(){
	var id=$(this).attr("data-id");
	$.ajax({
		url:"add-to-do.php",
		type:"post",
		data:{
			type:"remove",
			id:id
		},
		success:function(data)
		{
			alert(data)
			if(data=="true")
			{
				fetch_to_do();
			}
		}
	})
})
$(document).on('click','.add',function(){
	var id=$(this).attr("data-add-id");
	$.ajax({
		url:"add-to-do.php",
		type:"post",
		data:{
			type:"add-to-do",
			id:id
		},
		success:function(data)
		{
			if(data=="true")
			{
				fetch_to_do();
			}
		}
	})
})
function fetch_data()
{

$.ajax({
		url:"add-to-do.php",
		method:"post",
		data:{
			type:"get"
		},
		success:function(data)
		{
			var json=JSON.parse(data)
			var div=$('<ul class="list-group"></ul>')
			if(json.length>0)
			{
			for(var i=0;i<json.length;i++)
			{
				var li=$('<li  class="list-group-item add text-primary text-bold">'+json[i].des+'</li>')
			 
				div.append(li)
			}
			}
			else
			{
				var li=$('<li  class="list-group-item add">no data found !</li>')
				div.append(li)
			
			}	
			$("#modal-body-bg").html(div)
		}
	})	
}
fetch_data()
function fetch_to_do()
{

$.ajax({
		url:"add-to-do.php",
		method:"post",
		data:{
			type:"get"
		},
		success:function(data)
		{
			var json=JSON.parse(data)
			var div=$('<ul class="list-group"></ul>')
			if(json.length>0)
			{
			for(var i=0;i<json.length;i++)
			{
				var li=$('<li  class="list-group-item add" data-add-id='+json[i].id+'>'+json[i].des+'</li>')
				if(json[i].staus=="yes")
				{
				li.css("text-decoration","line-through");						
				}
				var k=$('  <i class="float-right fa fa-times remove" data-id='+json[i].id+' aria-hidden="true"></i>')
				li.append(k)
				div.append(li)
			}
			}
			else
			{
				var li=$('<li  class="list-group-item add">no data found !</li>')
				div.append(li)
			
			}	
			$("#add-to-do-list").html(div)
		}
	})	
}
fetch_to_do();
$("#reset").click(function(){
$.ajax({
		url:"add-to-do.php",
		type:"post",
		data:{
			type:"reset",
		},
		success:function(data)
		{
			if(data=="true")
			{
				fetch_to_do();
			}
		}
	})
})