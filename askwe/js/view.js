// display user deteils 
$(document).ready(function(){
    $('#question-head').click(function(){
        $('#answer-body').fadeOut(1000)
        $('#question-body').toggle(1000)
    })

    $('#answer-head').click(function(){

        $('#question-body').fadeOut(1000)
        $('#answer-body').toggle(1000)
        
    })
    $('#personal-head').click(function(){
        $('#edu-body').fadeOut(1000);
        $('#con-body').fadeOut(1000);
        $('#personal-body').toggle(1000);
    })
    $('#edu-head').click(function(){
        $('#personal-body').fadeOut();
        $('#edu-body').toggle(1000);
        $('#con-body').fadeOut(1000);
    })
    $('#con-head').click(function(){
        $('#personal-body').fadeOut();
        $('#edu-body').fadeOut(1000);
        $('#con-body').toggle(1000);
        
    })
    $('#personal-btn').click(function(){
        var name=$('#name').val();
        var email=$('#email').val();
        var phone=$('#phone').val();
        var gender=$('#gender').val();
        var state=$('#state').val();
        var city=$('#city').val();
        var user_id=$('#user_id').val()
        $.ajax({
            url:'update.php',
            method:'POST',
            data:{
                email:email,
                phone:phone,
                gender:gender,
                state:state,
                city:city,
                id:user_id
            },
            success:function(data)
            {
                alert(data);
            }
        })
     
    })

    $('#edu-btn').click(function(){
            var reg=$('#regno').val();
            var college=$('#college').val();
            var degree=$('#degree').val();
            var dept=$('#dept').val();
            var lang=$('#lang').val();
            var skill=$('#skill').val();
            var user_id=$('#user_email').val()
            
            $.ajax({
            url:'education.php',
            method:'POST',
            data:{ 
                id:user_id,
                reg:reg,
                college:college,
                degree:degree,
                dept:dept,
                lang:lang,
                skill:skill 
            },
            success:function(data)
            {
                alert(data);
            }
        })
    })
        $('#con-btn').click(function(){
            var git=$('#git').val();
            var whatsapp=$('#whatsapp').val();
            var fb=$('#fb').val();
            var tweeter=$('#tweeter').val();
            var instagram=$('#instagram').val();
            var linkedlin=$('#linkedlin').val();
            var user_id=$('#user_email').val()
            $.ajax({
                url:'contact.php',
                method:'POST',
                data:{ 
                    git:git,
                    whatsapp:whatsapp,
                    fb:fb,
                    tweeter:tweeter,
                    instagram:instagram,
                    linkedlin:linkedlin,
                    id:user_id
            },
            success:function(data)
            {
                alert(data);
            }
        })
    })
})




















