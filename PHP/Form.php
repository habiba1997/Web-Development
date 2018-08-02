<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous"> 
    <style>
        body{margin: inherit; background-image: url(minion.jpg); position: relative;  }
        form{ position: absolute; top:60px;left:15%; width:70%; margin-top: 100%px; color: #f5f5f5; padding: 10% 20%; background-color: rgba(0,0,0,0.3); border-radius:100% }
        form input{ width:100% ; height: 50px  }
        form button {margin-top: 5% }
        span{text-align: center; color: white;}

    </style>
</head>
    <body>
    
        <form action="Table.php" method="POST" class="mx-auto d-block text-center" >
            <input  type="text" placeholder="Enter Your Username" name="named"> <br>
            <span> <?php if(isset($_GET['namee'])){ echo "Your Username is REQUIRED"; } ?> </span><br>

            <input  type="email" placeholder="Enter Your Email" name="emaild"> <br>
            <span> <?php if(isset($_GET['emaill'])){ echo "Your Email is REQUIRED"; } 
              /*if(isset($GET['invalidEmail'])){ echo "Invalid Email"; }*/?> </span><br>

            <input  type="number" placeholder="Enter Your Age" name="aged"> <br>
            <span> <?php if(isset($_GET['agee'])){ echo "Your Age is REQUIRED"; } 
               /* if(isset($GET['letters'])){ echo "You Can't Use Letters in your age"; } */?> </span><br>

            <input  type="number" placeholder="Enter Your Phone Number" name="phoned">  <br>
            <span> <?php if(isset($_GET['phonee'])){ echo "Phone Number is REQUIRED"; } 
                /*if(isset($GET['letters'])){ echo "You Can't Use Letters in Phone Number"; }*/?> </span><br>
        <fieldset>
            <legend>Gender</legend>
            <div>
            <label style="display: inline;margin: 0px;" for="Male">Male</label>  <input  style="display: inline;margin: inherit;" type="radio" name="gender" id="Male" value="male" > 
            </div>
            <div>
            <label style="display: inline;" for="Female">Female</label> <input  style="display: inline;" type="radio" name="gender" id="Female" value="female">
            </div>
            <span> <?php if(isset($_GET['gender'])){ echo "Your gender is REQUIRED"; } ?> </span><br>
        </fieldset>

            <button class="btn btn-danger btn-lg" type="submit"> Submit </button>

        </form>
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    
    </body>
</html>



