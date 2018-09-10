<?php

    Try {
      $data=new PDO('mysql:host=localhost;dbname=WebCourse;charset=utf8','root',''); 
      $dataStatus= "Databas Connected Successfully";
      }
    catch(PDOException $e)
      {
      $dataStatus= "Connection failed: " . $e->getMessage();
      }
        
     

    if($_SERVER['REQUEST_METHOD']=="POST" )      
    {       
            if(!empty($_POST['name_input']))
               {
                  $name_var=check($_POST['name_input']);
               }
               else{$name_error="error";}

              if(!empty($_POST['email_input'])){
                $email_var=check($_POST['email_input']);
              }
              else{$email_error=" ";}

              if(!empty($_POST['phone_input'])){
               $number_var=check($_POST['phone_input']);
              }
              else{$phone_error=" ";}

              if(!empty($_POST['age_input'])){
                $age_var=check($_POST['age_input']);
              }
              else{$age_error=" ";}

              if(!empty($_POST['gender_input'])){
                $gender_var=check($_POST['gender_input']);
              }
              else{$gender_error=" ";}
  
              if ( isset($_POST["insert"]) )
              {
                   $in = $data->prepare("INSERT INTO SignUp ( Name, Email, Age, Mobile, Gender) VALUES( :n, :e, :a, :p, :g)");
 
                   if ( $in->execute(array(':n' => $name_var, ':e' => $email_var, ':a' => $age_var, ':p' => $number_var, ':g' => $gender_var )))
                        {
                          $status="Inserted Successfully";
                        }
                    else 
                        {
                          $status="Insertion error";
                        }
               }
               if( isset($_POST["edit"]) ) 
               {
                  $edit = $data->prepare("UPDATE SignUp SET Name=:name, Email=:email, Age=:age, Mobile=:phone , Gender=:gender WHERE ID=:id");
                  if ($edit->execute(array(":name" =>$name_var,":email"=>$email_var,":age"=>$age_var,":phone"=>$number_var,":gender"=>$gender_var, ":id"=>$_GET['id'])))
                  {
                    header("Location:signUp.php");
                  }
                  
                }    
    }
    

    if(isset($_GET["act"]) && isset($_GET["id"]))
        {
            if($_GET["act"] == "erase") 
            {
                $delete = $data->prepare("DELETE FROM SignUp WHERE ID=:id");
                
                if ($delete->execute(array(":id" => $_GET['id']))) 
                {
                    $status = "The data of id " . $_GET['id'] . " has been removed";
                }
                else 
                {
                    $status = "Deletion Error!";
                }
            }

            if($_GET["act"] == "edit")
            {
              $selected = $data->prepare("SELECT  Name, Email, Age, Mobile, Gender FROM SignUp WHERE ID=:id");
              if ($selected->execute(array(":id" => $_GET['id'])))
                {
                  $status = "The data of id " . $_GET['id'] . " has been selected for editing";
                  foreach($selected as $sel)
                  {
                    $name=$sel['Name'];
                    $mail=$sel['Email'];
                    $age=$sel['Age'];
                    $phone=$sel['Mobile'];
                    $gender=$sel['Gender'];
                  }

                }
                else 
                {
                    $status = "Error in Edit Selection!";
                }

            }


        }


    $slkt = $data->prepare("SELECT ID, Name, Email, Age, Mobile, Gender FROM SignUp");
    $slkt->execute();
    

function check($string)
    {
        $string=htmlspecialchars($string);
        $string=trim($string);
        $string=stripcslashes($string);
        $string=filter_var($string,FILTER_SANITIZE_STRING);
        $string=strtolower($string);
        return $string;
    }  
   
   
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style>
        
        body{background-image: url('images.jpeg'); background-size: cover; color: white;  }
        .formaya{background-image: url(back2.png); background-size: cover;padding:5%}
        form{  background-color: rgba(255,255,255,0.3); width:98% ; padding: 10% 30%;  ; border-radius:100% }
        .inn{ width: 100%; height: 55px ; text-align: center;}
        span{text-align: center; color: #f36d94;} }
        table{  background-color: rgba(0,0,0,0.5); padding: 2% ; width: 34% ; display: inline-block; }
    </style>
</head>
    <body>
        <?php
        if(isset($dataStatus))
        {
          echo "<h4>$dataStatus</h4>";
        }
       
        if(isset($status))
        {
            echo "<h4>$status</h4>";
        }

        ?>
        <div class="formaya">
        <form action="" method="POST" class="text-center mx-auto d-block" >
            <input class="inn" type="text" placeholder="Enter Your Name" name="name_input" value="<?php if(isset($name)) {echo $name;} ?>"> <br>
            <span> <?php if(isset($name_error)){ echo "Your Name is REQUIRED"; } ?> </span><br>

            <input class="inn" type="email" placeholder="Enter Your Email" name="email_input" value="<?php if(isset($mail)) {echo $mail;} ?>"> <br>
            <span> <?php if(isset($email_error)){ echo "Your Email is REQUIRED"; } 
            ?> </span><br>

            <input class="inn" type="number" placeholder="Enter Your Age" name="age_input" value="<?php if(isset($age)) {echo $age;} ?>"> <br>
            <span> <?php if(isset($age_error)){ echo "Your Age is REQUIRED"; } 
               ?> </span><br>

            <input class="inn"  type="number" placeholder="Enter Your Phone Number" name="phone_input"  value="<?php if(isset($phone)) {echo $phone;} ?>">  <br>
            <span> <?php if(isset($phone_error)){ echo "Phone Number is REQUIRED"; } 
                ?> </span><br>

            <div class=" mx-auto d-block">
                <h3> Gender </h3>
                  <div>
                       <input type="radio" name="gender_input" value="<?php if(isset($gender)) {echo $gender;} else { echo "male";} ?>"" >  <label style="display: inline;">Male</label>
                  </div>
                   <div>
                       <input type="radio" name="gender_input"  value="<?php if(isset($gender)) {echo $gender;} else { echo "female";} ?>">  <label style="display: inline "> Female </label>
                  </div>
            </div>
            <span> <?php if(isset($_GET['gender_error'])){ echo "Your gender is REQUIRED"; } ?> </span><br>
      
            <input class="btn btn-warning btn-lg text-light" type="submit" value="Sign Up" name="<?php 
            if(isset($_GET['act']))
            {  echo "edit"; }
            else 
            {  echo "insert"; } ?>"> 

        </form>
      </div>
        <table class="table table-hover table-bordered table-striped mx-auto d-block text-center">
            <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
            </thead>
            <tbody>    

                    <?php 

                        foreach ($slkt as $qury) 
                        {
                          echo "<tr> <th>".$qury['ID']."</th>";
                          echo " <td> ".$qury['Name']."</td>";
                          echo " <td> ".$qury['Email']."</td>";
                          echo " <td> ".$qury['Age']."</td>";
                          echo " <td> ".$qury['Mobile']."</td>";
                          echo " <td> ".$qury['Gender']."</td>";
                          echo "<td> <a href='signUp.php?act=edit&id=".$qury['ID']."'><i class='fas fa-edit'></i></a></td>";
                          echo "<td> <a href='signUp.php?act=erase&id=".$qury['ID']."'><i class='fas fa-trash'></i></a></td></tr>";

                        }

                    ?>
            </tbody>

       </table>
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    
    </body>
</html>
