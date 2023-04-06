<?php

$array_data=$_POST;

register($array_data);
login();


function connect_to_db()
{
 return (mysqli_connect('localhost','root','','academic'));
    
}


// register user
function register($values=array())

{
    if(isset($_POST['register']))
   {
    // Check for existence of user
$email=$values['email'];
if((mysqli_num_rows(mysqli_query(connect_to_db(),"SELECT * FROM  student WHERE student_email  LIKE '$email'"))))

{
    echo "<script>alert('User already exists')</script>";
    header('Refresh:0;index.php');
}
//Register new user
else
 
 {
    $adm=$values['adm'];
    $fname=$values['fname'];
    $sname=$values['sname'];
    $surname=$values['surname'];
    $email=$values['email'];
//$query="INSERT INTO student ('student_id','student_fname','student_sname','student_surname',student_email) VALUES('$adm','$fname','$sname','$surname','$email')";
$query="INSERT INTO `student` (`student_id`, `student_fname`, `student_sname`, `student_surname`, `student_email`) VALUES ('$adm','$fname','$sname','$surname','$email')";
 $result=mysqli_query(connect_to_db(),$query); 
if($result)
   {
         echo "<script>alert('Registration succesful')</script>";
         header('Refresh:0;index.php');
     }
     else
     {
        echo "<script>alert('Registration failed please try again')</script>";
        header('Refresh:0 register.php');
     }
 


     
}
}
}

 
function login()
{ 
     if(isset($_POST['login']))
     {
    

        //capture user data
     $fname=$_POST['fname'];
    $email=$_POST['email'];
    $adm=$_POST['adm'];

    // check if user is registered
    $query1="SELECT * FROM student WHERE  student_id LIKE '$adm' AND student_email LIKE '$email'  ";
   
    $query2=mysqli_query(connect_to_db(),$query1);

    // check number of records
    
    if($query2)
      {     
         session_start();
         $name=$_SESSION['fname'];
           echo "<script>alert('Login successful')</script>";
           echo "Hello, $name";
       }
       
     else

          {
              echo "<script>alert('admission number or email does not match')</script>";
          }
   }
   
     
        
     else
        {
            
            
         echo "<script>alert('User does not exist')</script>";
          header('Refresh:0;register.php');
            
        }
}




























/*$array_data=$_POST;
$json_data=json_encode($array_data);


register($array_data);

function connect_to_db()
{
   return (mysqli_connect('localhost','root','','academic'));
   
}


function register($values=array())

{
    // print_r($values);
    $email=$values['email'];
    //check existence of user in the db
    if((mysqli_num_rows(mysqli_query(connect_to_db(),"SELECT * FROM student WHERE student_email LIKE '$email'")))){


       echo "<script>alert('user already exists')</script>";
       header('refresh:0,index.php');

    }
    else{
        $adm=$values['adm'];
        $fname=$values['fname'];
        $sname=$values['sname'];
        $surname=$values['surname'];
        $email=$values['email'];
        
        $query="INSERT INTO `student` (`student_id`, `student_fname`, `student_sname`, `student_surname`, `student_email`) VALUES ('$adm', '$fname', '$sname', '$surname', '$email')";
        if(mysqli_query(connect_to_db(),$query)){

            // print_r("Registration successfully");
        echo "<script>alert('Registration successfully')</script>";
        header('refresh:0,index.php');


        }
        else{

            echo "<script>alert('error occured while processing your request!try again')</script>";
            header('refresh:0,index.php');
    
        }
   }

    
   
        
    




}*/
?>
