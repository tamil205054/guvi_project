<?php
// start the session and include the connection.php file
session_start();
include('connection.php'); 
//check the session if value exit stay this page otherwise redirect to the index.php
if(isset($_SESSION['username'])&&isset($_SESSION['userpass']))
{
$query="SELECT * FROM `signup` WHERE `user`='".$_SESSION['username']."' and `pass`='".$_SESSION['userpass']."';";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result)or die("error");
if($num==1)
{
    while($row=mysqli_fetch_array($result))
    {
        //store the user name and user 
         $user=$row['first']; 
         $userid=$row['user'];

    }
}
else
{
    //username and password not matched redirect to the index page
    header("location:index.php");
}
}
else
{   //session value dosn`t exit redirect to the index.php page
    header("location:index.php");
}
?>
 <!DOCTYPE html>
 <html lang="">
     <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Welcome</title>
        <!-- external style sheet -->
        <link rel="stylesheet" href="css/login.css">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
     </head>
      <body>
    <!-- navigation bar -->
      <nav class="navbar navbar-inverse" role="navigation"> 
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#" style="color:white;font-size:2em">Ask We</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse" id="mynav">
             
             
              <ul class="nav navbar-nav navbar-right">
                  <li><a  data-toggle="modal" href='#modal-id' >My Contribute</a></li>
                    <li ><a href="view.php?user=<?php echo  $userid?>"><?php echo  ucwords($user);?></a></li>
                    <input type="hidden" name="username" id="username" value="<?php echo  ucwords($user);?>">
                    <li><a href="#" id="logout"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
              </ul>
          </div>
      </nav>
  <!-- model mycontribute pupup content -->
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
                                  <!-- fetch the data from database useing session username value -->
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
                                  <!-- fetch the data from database useing session username value -->
                                  
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
      <!--end of model  -->
      <!-- Question display panel -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span id="questionView" class="glyphicon glyphicon-triangle-bottom"></span>&nbsp;Questions</h3>
                </div>
                <div class="panel-body" id="qun-panel-body">
                    <!-- fetch data from question table display all Question -->
                    <?php
                        $qnquery="SELECT * FROM `questions` ORDER BY `question_id` ASC;";
                        $output=mysqli_query($conn,$qnquery);
                            if(mysqli_num_rows($output)>0)
                                {
                                    while($row=mysqli_fetch_array($output))
                                        {    
                                            // find the user name 
                                            $user="SELECT * FROM `signup` WHERE `user`='".$row["userid"]."'";
                                            $userdetails=mysqli_query($conn,$user);
                                            if(mysqli_num_rows($userdetails)>0)
                                                {
                                                    while($row1=mysqli_fetch_array($userdetails))
                                                        {
                                                            // assign value to the variable
                                                            $select = "langbtn".$row["question_id"];
                                                            $url='urlbtn'.$row["question_id"];
                                                            $click='clickbtn'.$row["question_id"];
                                                            $view='viewclickbtn'.$row["question_id"];
                                                            $btn='btn'.$row["question_id"];
                                                            $question_id="qunbtn".$row["question_id"];
                                                            $splitTimeStamp = explode(" ",$row['time']);
                                                            $answer="SELECT * FROM `answer` WHERE `question_id`='".$row["question_id"]."' ORDER BY `time` DESC";
                                                            $answerdetails=mysqli_query($conn,$answer);

                    ?>
                                                            <h4>
                                                                <?php echo $row["question_id"].".";echo $row["question"]?>
                                                                <span class="label label-default"><?php echo "Total Submissions  ".$row["answer_count"]?></span>
                                                            </h4>
                                                            <input type="hidden" id="<?php echo $question_id;?>" value="<?php echo $row["question_id"];?>"/>
                                                            <form action="" method="POST" class="form-inline" role="form">
                                                                <div class="form-group">
                                                                    <label>Language Used:</label>
                                                                    <select name="lang"  class="form-control" id="<?php echo $select?>" required="required">
                                                                        <option value="lang">Select language</option>
                                                                        <option value="java">Java</option>
                                                                        <option value="javascript">Javascript</option>
                                                                        <option value="python">Python</option>
                                                                        <option value="php">Php</option>
                                                                        <option value="c">C</option>
                                                                        <option value="c++">C++</option>
                                                                        <option value="c#">C#</option>
                                                                    </select>
                                                                    <label>GitHub URL:</label>
                                                                    <input type="url" class="form-control" id="<?php echo $url?>" name="url_link" placeholder="Input field">
                                                                </div>
                                                                    <button type="button" name="submit" class="btn btn-primary submit" id="<?php echo $btn;?>">Submit</button><br><br>
                                                                <div class="pull-right text-success ">
                                                                    <b>Submitted BY- <a href="view.php?user=<?php echo $row["userid"];?>"><?php echo ucwords($row1["first"]);?></a></b><?php echo $splitTimeStamp[0];?>
                                                                </div>
                                                                <div class="pull-left viewother" id="<?php echo $click;?>">
                                                                    <b class="text-success">View Submission</b>
                                                                </div>
                                                                <br><br>

                                                                <!-- Display all answer  if exit -->
                                                                <div class="col-md-12 col-sm-12 panel panel-default hideview" id="<?php echo $view;?>" style="display:none">
                                                                    <?php
                                                                        if(mysqli_num_rows($answerdetails)>0)
                                                                            {
                                                                                $i=1;
                                                                                while($fetchvalue=mysqli_fetch_array($answerdetails))
                                                                                    {
                                                                                        $splitTimeStamp = explode(" ",$fetchvalue['time']);
                                                                    ?> 
                                                                                        <div class="row" style="padding-top:1%">
                                                                                            <div class="col-md-6">
                                                                                                <p><?php echo $i;?>)&nbsp;&nbsp;<a target="blank" href="<?php echo $fetchvalue["url"];?>"><?php echo $fetchvalue["url"];?></a></p>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p class="pull-right"><b>&nbsp;&nbsp;Submitted By-<a href="view.php?user=<?php echo $fetchvalue["userid"];?>"><?php echo $fetchvalue["user_name"];?></a>:</a><span><?php echo $splitTimeStamp[0];?></span></p>
                                                                                            </div>
                                                                                        </div>
                        
                                                                    <?php
                                                                                $i++;
                                                                                    }
                                                                            }
                                                                            else
                                                                            {
                                                                    ?>
                                                                    <!-- no answer  -->
                                                                                <b class="text-danger">NO OTHER SUBMISSION </b>
                                                                    <?php
                                                                            }
                                                                    ?>
                                                                </div>
                                                            </form>
                                                            <hr>
                    <?php
                                                        }
                                                }
                                        }
                                }
                    ?>   
                </div>
            </div>
        </div>
      </div>
      <!-- add question to the database -->
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
  <div class="panel-heading text-success"> Ask Questions</div>
  <div class="panel-body">   
    <form  class="form-horizontal" role="form">
                            <div class="form-group  col-sm-12 ">
                                    <textarea name="input" id="input" class="form-control" rows="3" required="required"></textarea>                        
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="button" id="post" class="btn btn-success">Post Question</button>
                                </div>
                            </div>
                    </form></div>
</div> 
          </div>
      </div>
      
  </div>
<!-- include all link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script src="js/logout.js"></script><script src="js/addQuestion.js"></script>
         <script src="js/fetchQuestion.js"></script>

        </body>
 </html>
 <!-- include footer.php file -->
 <?php
 include('footer.php');
 ?>