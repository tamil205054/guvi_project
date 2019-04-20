<?php
//include connection.php file
include('connection.php');
session_start();
//if the  user  aleady login and redirect to the askwe.php page and also the session name and session password to database for security perpose
if(isset($_SESSION['username'])&&isset($_SESSION['userpass']))
{
$query="SELECT * FROM `signup` WHERE `user`='".$_SESSION['username']."' and `pass`='".$_SESSION['userpass']."';";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result)or die("error");
if($num==1)
{
         header("location:askwe.php");
    
}
}

?>
<!DOCTYPE html>
<html lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ask We </title>
  <!-- booststrap link -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">
             
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title text-center">Forgot Password:</h4>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" class="form-horizontal" role="form">
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="email">Email:</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control"name="email" id="for_email">
                                </div>
                          </div>
                          
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="password">Phone</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="logpass" id="for_phone">
                                  <span class="text-danger" ></span>
                                </div>
                                
                          </div> 
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="email">Password:</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control"name="email" id="for_pass">
                                </div>
                          </div>
                          
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="password"> Re-Enter Password:</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" name="logpass" id="for_re_pass">
                                  <span class="text-danger" id="re_pass_error"></span>
                                </div>
                                
                          </div>
                        </form>       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="for_up">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <center><h2 class="text-success">Create a New AskWe Account</h2></center>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="row">
                        <h3 class="text-info">Ask All Your Programming Questions</h3>
                        <div class="col-sm-4">
                            <img src="img/image01.jpeg" class="img-responsive" alt="Image">  
                        </div>
                        <div class="col-sm-8">
                       <p style="font-size:1.5em">When learning to code or develop software, websites or apps, we usually will get stuck with a problem or a bug that refuses to be resolved, no matter what you do. In cases like this, programmers like you may need answers to questions related to various coding languages, development platforms, tools, APIs as well as services
                       </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3 class="text-info">Get idea from us</h3>
                        <div class="col-sm-4">
                            <img src="img/think.jpg" class="img-responsive" alt="Image">  
                        </div>
                        <div class="col-sm-8">
                       <p style="font-size:1.5em">"Ask We",is a question and site for professional and enthusiast programmer.It is a privately held website,the flagship site of the stack Exchange Network,IF features questions and answer on a wide range of topics in computer programming.Come help us make collaboration even better ,We've built a company we truly love wroking for,and we think you will too</p>
                        </div>
                    </div>
                </div>
                <!-- login form -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <br><br>
                
                <div class="panel panel-primary">
                <div class="panel-heading" id="loginclick">
                            <h3 class="panel-title"><center>Log In</center> </h3>
                      </div>
                    <div class="panel-body" id="log-body"style="display:none">
                    <form action="" method="POST" class="form-horizontal" role="form">
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="email">Email:</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control"name="email" id="email">
                                </div>
                          </div>
                          
                          <div class="form-group">
                              
                                <div class="col-sm-3">
                                  <label for="password">Password:</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" name="logpass" id="logpass">
                                  <span class="text-danger" id="error"></span>
                                </div>
                                
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-6">
                                <a  data-toggle="modal" href='#modal-id'>forgot password</a> 
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-4">
                                  <button type="button" id="login" class="btn btn-success btn-block">Sign in</button>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-8">
                              <a href="#" id="createNew">Create New Account?</a>
                              </div>
                          </div>
                  </form>
                  
                    </div>
                </div>
                <!-- sign up form -->
                <div class="panel panel-primary">
                      <div class="panel-heading" id="signupclick">
                            <h3 class="panel-title"><center>Sign Up</center> </h3>
                      </div>
                      <div class="panel-body" id="sign-body" style="display:none">
                                <div class="form-group">
                                    <label for="">User Name:</label>
                                    <input type="text" class="form-control"  id="uname" name="uname" placeholder="Enter User name">
                                <p class="pull-left" id="check"></p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Password:</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="password">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Confirm Password:</label>
                                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Retype password">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                </div>
                                <button type="submit" class="btn btn-primary" id="signup" name="signup">Sign Up</button>
                                <a href="#" id="logNew" class="text-success">Aleady hava a Account? Click to login</a>    
                      </div>
                </div>
                
                </div>
            </div>
        </div>
        <!-- jQuery and javascript link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- login and signup javascript file include -->
        <script src="js/login.js"></script><script src="js/signup.js">
        </script>
        <!-- include footer file -->
        <?php
        include('footer.php')
        ?>
    </body>
</html>
