
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<center>
  <fieldset   style="width: 400px; height:650px; color:blue;border:5px solid #0000FF; border-radius:20px;">

  <form action="Authentication.php" method="POST">
    <table  >
<h1> Register Here</h1>
    
    <label for="fname">First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="fname"  required ><br><br><br>
    <label for="sname" class="sname" id="sname">Second Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="sname"  required><br><br><br>
    <label for="surname">Surname:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="surname"  required ><br><br><br>
    <label for="email">Email  Address:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="email" name="email"  required ><br><br><br>
    <label for="email">National Id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="id"  required ><br><br>
   
    <label for="contact">contact:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="contact"  required ><br><br>
    

    <!-- <label style ="margin-right:30%;"for="role">Role:&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <center><select  style="width:25px;"name="role" id="role">
    <option value="Teaching staff">Teaching staff </option>     
    
       <option value="Non-teaching staff">Non-teaching staff</option>
    </select></center> <br><br> -->

  
    <label for="password">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="pass"  required ><br><br><br>
    <label for="password"> Confirm Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="conpass"  required ><br><br><br>
    
    
    <a href="staff_login.php" style="color:#0000FF;text-decoration:none;">Already registered?</a><br><br>
    <input style="border-radius: 5px; width:100px;height: 30px;background-color: #0000FF;border:5px solid #0000FF" type="submit" name="staff_register" value="Register">
   
</table>

</form>
</center>
</fieldset>

<script>



    
</script>
</body>
</html>

    