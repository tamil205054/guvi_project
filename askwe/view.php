<?php
include('connection.php');
session_start();
// move user to details page  get the user name from link get method and checl session username password exit or not
if(isset($_GET['user'])&&isset($_SESSION['username'])&&isset($_SESSION['userpass']))
{
    $query="SELECT * FROM `signup` WHERE `user`='".$_SESSION['username']."' and `pass`='".$_SESSION['userpass']."';";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result)or die("error");
    if($num==1)
    {
        while($row=mysqli_fetch_array($result))
        {
            $user_id=$row['id'];
            $user=$row['first']; 
            $userlast=$row['last']; 
            $userid=$row['user'];
            $city=$row['city'];
            $phone=$row['phone'];
    
        }
    }
    else
    {
// redirect to the index page
      header("location:index.php");
    }
    // if session user name and link user name are equal set user type 'user'
    if($_SESSION['username']==$_GET['user'])
    {
        $userType="user";
    }
    // else user type visiter
    else
    {
        $userType="visiter";
    }
}
else
{
    header('location:index.php');
}

?>

<!DOCTYPE html>
 <html lang="">
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

            
  <title>Profile-<?php  echo  ucwords($user) ; ?></title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
      <body>
     
      <nav class="navbar navbar-inverse" role="navigation"> 
          <div class="navbar-header">

              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="askwe.php" style="color:white;font-size:2em">Ask We</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse" id="mynav">
             
             
              <ul class="nav navbar-nav navbar-right">
                  <li><a  data-toggle="modal" href='#modal-id' >My Contribute</a></li>
                    <li ><a href="view.php?user=<?php echo  $userid?>"><?php echo  ucwords($user);?></a></li>
                    <input type="hidden" name="username" id="username" value="<?php echo  $user;?>">
                    <input type="hidden" name="username_id" id="user_id" value="<?php echo  $user_id;?>">
                     <input type="hidden" name="username_email" id="user_email" value="<?php echo  $userid;?>">
                    <li><a href="#" id="logout"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
              </ul>
          </div>
      </nav>
  <!-- model -->
  <div class="container"> 
      <div class="modal fade " id="modal-id">
          <div class="modal-dialog modal-lg">
              <div class="modal-content ">
                  <div class="modal-header primary">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">My Contribute</h4>
                  </div>
                    <div class="modal-body">
                     <div class="container-fluid">
                         <h4 class="text-center text-primary"><b>No of Question Post</b></h4>
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered question">
                              <thead>
                                  <tr>
                                        <th width="5%">SNO</th> 
                                        <th width="65%">Question</th>
                                        <th width="10%">RESPONS</th>
                                        <th width="20%">POST TIME</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $getQuestion="SELECT * FROM `questions` WHERE `userid`='".$userid."' ORDER BY `question_id` ASC ";
                                    $getresult=mysqli_query($conn,$getQuestion);
                                    if(mysqli_num_rows($getresult)>0)
                                    {
                                        $i=1;
                                        while($putresult=mysqli_fetch_array($getresult))
                                        {
                                            $splitTimeStamp = explode(" ",$putresult['time']);
                                  ?>
                                  <tr>
                                      <td><?php echo $i;?></td> 
                                      <td><?php echo $putresult['question'];?></td>
                                      <td><?php echo $putresult['answer_count'];?></td>
                                      <td><?php echo $splitTimeStamp[0];?></td>
                                  </tr>
                                  <?php
                                    $i++;
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">You did not submit any Question</td>
                                        </tr>
                                        <?php
                                    }
                                  ?>
                              </tbody>
                          </table>
                        </div>
                     </div>
                     <div class="container-fluid">
                         <h4 class="text-center text-primary"><b>No of Question Post</b></h4>
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered question">
                              <thead>
                                  <tr>
                                        <th width="5%">SNO</th> 
                                        <th width="15%">Question Id</th>
                                        <th width="50%">Answer</th>
                                        <th width="15%">Language</th>
                                        <th width="15%">Post Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $getAns="SELECT * FROM `answer` WHERE `user_name`='".$user."' ORDER BY `answer_id` ASC ";
                                    $getans=mysqli_query($conn,$getAns);
                                    if(mysqli_num_rows($getans)>0)
                                    {
                                        $i=1;
                                        while($putans=mysqli_fetch_array($getans))
                                        {
                                            $splitTimeStamp = explode(" ",$putans['time']);
                                  ?>
                                  <tr>
                                      <td><?php echo $i;?></td> 
                                      <td><?php echo $putans['question_id'];?></td>
                                      <td><a target="new"href="<?php echo $putans['url'];?>"><?php echo $putans['url'];?></a></td>
                                      <td><?php echo $putans['lang'];?></td>
                                      <td><?php echo $splitTimeStamp[0];?></td>
                                  </tr>
                                  <?php
                                    $i++;
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">You did not submit any Answer</td>
                                        </tr>
                                        <?php
                                    }
                                  ?>
                              </tbody>
                          </table>
                        </div>
                     </div>
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="panel-group">
  
  </div>
</div>
              </div>
          </div>
          
      </div>
    <?php
if($userType=="user")
{
// user type equal to user  display  his personal details 
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">      
            <div class="panel panel-primary">
                <div class="panel-heading" id="personal-head" style="font-size:1.5em">Personal Details:</div>
                <div class="panel-body"  id="personal-body">
                    <?php
                      $person="SELECT * FROM `personal_details` WHERE `username`='".$userid."';";
                      $person_exe=mysqli_query($conn,$person);
                      $gender="";
                      $state="";
                      if(mysqli_num_rows($person_exe)>0)
                      {
                        while ($per=mysqli_fetch_array($person_exe)) 
                        {
                          $gender=$per['gender'];
                          $state=$per['state'];
                        }
                      }
                    ?> 
                  <div class="row">
                      <div class="col-md-6">
<!-- user personal details -->
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-2" >Name:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="name"value="<?php echo(ucwords($user)." ".ucwords($userlast));?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Gender:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="gender" value="<?php echo $gender;?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Phone:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="phone" value="<?php echo($phone);?>" class="form-control">  
                          </div>
                          </div>
                        </form>
                      </div>

                    <form class="form-horizontal">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-2" >Email:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="email" value="<?php echo($userid);?>" class="form-control">  
                          </div>
                          </div>
                          
                          <div class="form-group">
                          <label class="control-label col-sm-2" >City:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="city" value="<?php echo($city);?>"  class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >State:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="state" value="<?php echo $state;?>"  class="form-control">  
                          </div>
                          </div>
                      </div>
                    </form>
                    </div>
                            <div class="pull-right">
                                    <button type="button" id="personal-btn" class="btn btn-success">Save Change</button>
                                
                            </div>
                   
                </div>
            </div>        
        </div>
        <!-- user education form details -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">      
            <div class="panel panel-primary">
                <div class="panel-heading" id="edu-head" style="font-size:1.5em">Education Details:</div>
                <div class="panel-body" style="display:none" id="edu-body">
                  <?php
                      $education="SELECT * FROM `education` WHERE `username`='".$userid."';";
                      $education_exe=mysqli_query($conn,$education);
                      $reg="";
                      $college="";
                      $degree="";
                      $dept="";
                      $lang="";
                      $skill="";
                      if(mysqli_num_rows($education_exe)>0)
                      {
                        while ($edu=mysqli_fetch_array($education_exe)) 
                        {
                            $reg=$edu['registerno'];
                            $college=$edu['collegename'];
                            $degree=$edu['degree'];
                            $dept=$edu['department'];
                            $lang=$edu['language'];
                            $skill=$edu['skills'];
 
                        }
                      }
                    ?>
                      <div class="row">
                      <div class="col-md-6">

                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-4" >Register No:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="regno"  value="<?php echo($reg);?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-4" >College Name:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="college" value="<?php echo $college;?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-4" >Language Known:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="lang" value="<?php echo($lang);?>" class="form-control">  
                          </div>
                          </div>
                        </form>
                      </div>

                    <form class="form-horizontal">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" >Degree:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="degree" value="<?php echo($degree);?>" class="form-control">  
                          </div>
                          </div>
                          
                          <div class="form-group">
                          <label class="control-label col-sm-4" >Department:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="dept" value="<?php echo($dept);?>"  class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-4" >Programming Skill:</label>         
                          <div class="col-sm-8">
                            <input type="text"  id="skill" value="<?php echo $skill;?>"  class="form-control">  
                          </div>
                          </div>
                      </div>
                    </form>
                    </div>
                      <div class="pull-right">
                                    <button type="button" id="edu-btn" class="btn btn-success">Save Change</button>
                                
                            </div>
                </div>
            </div>        
        </div>
        <!-- contect details -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">      
            <div class="panel panel-primary">
                <div class="panel-heading" id="con-head" style="font-size:1.5em">Contect Details:</div>
                <div class="panel-body" style="display:none" id="con-body">
                        <?php
                      $contect="SELECT * FROM `contect` WHERE `username`='".$userid."';";
                      $contect_exe=mysqli_query($conn,$contect);
                      $whatsapp="";
                      $fb="";
                      $tweeter="";
                      $git="";
                      $linkedlin="";
                      $instagram="";
                      if(mysqli_num_rows($contect_exe)>0)
                      {
                        while ($con=mysqli_fetch_array($contect_exe)) 
                        {
                            $whatsapp=$con['whatsapp'];
                            $fb=$con['facebook'];
                            $tweeter=$con['twitter'];
                            $git=$con['githup'];
                            $linkedlin=$con['linkedlin'];
                            $instagram=$con['instagram'];
                        }
                      }
                    ?>
                            <div class="row">
                      <div class="col-md-6">

                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-2" >LinkedIn:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="linkedlin"value=" <?php echo($linkedlin);?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Git Hub:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="git" value="<?php echo $git;?>" class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Twitter:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="tweeter" value="<?php echo($tweeter);?>" class="form-control">  
                          </div>
                          </div>
                        </form>
                      </div>

                    <form class="form-horizontal">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-2" >WhatsApp:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="whatsapp" value="<?php echo($whatsapp);?>" class="form-control">  
                          </div>
                          </div>
                          
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Facebook:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="fb" value="<?php echo($fb);?>"  class="form-control">  
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="control-label col-sm-2" >Instagram:</label>         
                          <div class="col-sm-10">
                            <input type="text"  id="instagram" value="<?php echo $instagram;?>"  class="form-control">  
                          </div>
                          </div>
                      </div>
                    </form>
                    </div>
                            <div class="pull-right">
                                    <button type="button" id="con-btn" class="btn btn-success">Save Change</button>
                                
                            </div>
                   
                </div>
                     
                </div>
            </div>        
        </div>
    </div>
</div>
<?php
}
// user not equals to user only see the link and question only and profile of the question or answer poster
else
{
  $getname="SELECT * FROM `signup` WHERE `user`='".$_GET['user']."';";
  $get_user_name=mysqli_query($conn,$getname);
  $name="";
  $last="";
  if(mysqli_num_rows($get_user_name)>0)
  {
    while ($fetch_name=mysqli_fetch_array($get_user_name)) 
    {
      $name=$fetch_name['first'];
      $last=$fetch_name['last'];
    }
  }

?>
<div class="container">
   <h3 class="pull-left text-success"><?php echo ucwords($name)." ".ucwords($last);?><h3>
  <br>
  <br>
  <div class="row">
      <div class="panel panel-primary">
        <div class="panel-heading" id="question-head" style="font-size:1em;">
          Posted Questions
         </div>
        <div class="panel-body" id="question-body" style="font-size: 17px;">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="10%">S.NO</th>
                  <th width="60%" style="text-align: center;">Question</th>
                  <th width="12%">Respons</th>
                  <th width="18%">Posted Date</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $fetQuestion="SELECT * FROM `questions` WHERE `userid`='".$_GET['user']."';";
                $getQuestion=mysqli_query($conn,$fetQuestion);
                if(mysqli_num_rows($getQuestion)>0)
                {
                  $i=1;
                  while ($fetch_Question=mysqli_fetch_array($getQuestion)) 
                  {
                    $splitTimeStamp = explode(" ",$fetch_Question['time']);
                    ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $fetch_Question['question'];?></td>
                      <td><?php echo $fetch_Question['answer_count']; ?></td>
                      <td><?php echo $splitTimeStamp[0]; ?></td>
                    </tr>
                    <?php

                  $i++;
                  }
                }
                else
                {
                  ?>
                       <tr>
                            <td colspan="4" class="text-center text-danger"><?php echo ucwords($name)." ".ucwords($last)." ";?> did not submit any Question</td>
                      </tr>
                  <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading" id="answer-head" style="font-size:1em">Posted Answers</div>
        <div class="panel-body"  id="answer-body" style="display: none;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="font-size: 17px;">
              <thead>
                <tr>
                  <th width="10%">S.No</th>
                  <th width="10%">Q.No</th>
                  <th width="56%" style="text-align: center;">Answer</th>
                  <th width="10%">Language</th>
                  <th width="14%">Posted Date</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $fetQuestion="SELECT * FROM `answer` WHERE `userid`='".$_GET["user"]."';";
                $getQuestion=mysqli_query($conn,$fetQuestion);
                if(mysqli_num_rows($getQuestion)>0)
                {
                  $i=1;
                  while ($fetch_Question=mysqli_fetch_array($getQuestion)) 
                  {
                    $splitTimeStamp = explode(" ",$fetch_Question['time']);
                    ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $fetch_Question['question_id'];?></td>
                      <td><a href="<?php echo $fetch_Question['url']; ?>" target="blank"><?php echo $fetch_Question['url']; ?></a> </td>
                      <td><?php echo $fetch_Question['lang']; ?></td>
                      <td><?php echo $splitTimeStamp[0]; ?></td>
                    </tr>
                    <?php

                  $i++;
                  }
                }
                else
                {
                  ?>
                   <tr>
                      <td colspan="5" class="text-center text-danger"><?php echo ucwords($name)." ".ucwords($last)." ";?> did not submit any Answer</td>
                          </tr>
                  <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
</div>
</div>
<?php
}
?>  
   
   <script src="js/view.js"></script>
         <script src="js/logout.js"></script>
         <script src="js/fetchQuestion.js"></script>
        </body>
 </html>
 <?php
 include('footer.php');
 ?>