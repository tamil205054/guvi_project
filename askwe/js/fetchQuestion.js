// fetdata data into database
$(document).ready(function()
{
  
   $(document).on('click','.submit',function(){
       var id=$(this).attr("id");
       var lang=$("#lang"+id+'').val();
       var git_url=$("#url"+id+'').val();
       var user=$("#username").val();
       var question_id=$("#qun"+id+'').val();
       var domain = git_url.replace('http://','').replace('https://','').split(/[/?#]/)[0];
       var filename = git_url.substring(git_url.lastIndexOf('/')+1);
       var exc = git_url.substring(git_url.lastIndexOf('.')+1);
       var extension="";
       switch(lang)
       {
           case "java":
            extension="java";
            break;
            case "javascript":
            extension="js";
            break;
            case "python":
            extension="py";
            break;
            case "php":
            extension="php";
            break;
            case "c":
            extension="c";
            break;
            case "c++":
            extension="cpp";
            break;
            case "c#":
            extension="cs";
            break;
            
       } 
       if(lang=="lang")
       {
        alert("select the Language");
        return false;
       }
       else if(git_url.trim().length==0)
       {
           alert("enter the Github URL");
           return false;
       }
       else if(exc!=extension)
       {
           alert("url and your Language Mismatched")
           return false;
       }
       else if(validURL(git_url))
       {
           if(domain=="github.com")
           {
               $.ajax({
                   url:"postAnswer.php",
                   method:"POST",
                   data:{
                       q_id:question_id,
                       url:git_url,
                       user:user,
                       lang:lang
                   },
                   success:function(data){
                        alert(data);
                        $("#url"+id+'').val(" ");
                        $("#lang"+id+'').val("lang");
                   }
               })
           }
           else
           {
               alert("Enter the valid GitHub URL");
           }
       }
       else
       {
           alert("Please Enter the Valid URL?")
       }
       
   })
//    url validation
   function validURL(myURL) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ //port
    '(\\?[;&amp;a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i');
    return pattern.test(myURL);
 }
   $(document).on('click','.viewother',function(){
    var id=$(this).attr("id");
    $("#view"+id+'').slideToggle("fast");
})
$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
});