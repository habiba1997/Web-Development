

<?php
function check($string)
    {
        $string=htmlspecialchars($string);
        $string=trim($string);
        $string=stripcslashes($string);
        $string=filter_var($string,FILTER_SANITIZE_STRING);
        $string=strtolower($string);
        return $string;
    }


    if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(!empty($_POST['named'])){
      $naamed=check($_POST['named']);
      $error1="";
    }
    else {$error1="namee";}

    if(!empty($_POST['emaild'])){
      $emaildd=check($_POST['emaild']);
      $error2="";
    }
    else{$error2="emaill";}

    if(!empty($_POST['phoned'])){
     $numbered=check($_POST['phoned']);
      $error3="";
    }
    else{$error3="phonee";}

    if(!empty($_POST['aged'])){
      $agedd=check($_POST['aged']);
      $error4="";
    }
    else{$error4="agee";}

    if(!empty($_POST['gender'])){
      $gender=check($_POST['gender']);
      $error5="";
    }
    else{$error5="gender";}

    if ($error1==$error2 && $error2==$error3 && $error3==$error4 && $error4==$error5){}
    else {header("Location:Form.php?$error1&$error2&$error3&$error4&$error5");}
    
    
}
else
{header("Location:Form.php");}
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">    
   <style> body{ background-image: url("minion.jpg"); ; color: white; position: relative;  }
           .tab{ position: absolute; top:170px; left:35%; background-color: rgba(0,0,0,0.5); padding: 2% ; width: 34%}
 </style>
    
</head>
<body>
    
   <table class="table table-hover table-bordered tab mx-auto d-block">
 
    <tr>
      <th scope="col">Name</th>
      <td><?php echo $naamed; ?></td>
    </tr>
    <tr>
      <th scope="col">Email</th>
      <td><?php echo $emaildd; ?></td>
    </tr>
    <tr>
      <th scope="col">Phone Number</th>
      <td><?php echo $numbered; ?></td>
    </tr>
    <tr>
      <th scope="col">Age</th>
      <td><?php echo $agedd; ?></td>
    </tr>
   <tr>
      <th scope="col">Gender</th>
      <td><?php echo $gender; ?></td>
    </tr>

</table>
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>

