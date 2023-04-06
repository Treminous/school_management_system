<?php

$array_data=$_POST;

if(isset($array_data['register']))
   {

    register($array_data);
   die();
   }

login($array_data);


function connect_to_db()
{
 return (mysqli_connect('localhost','root','','academic'));
    
}


// register user
function register($values=array())

{
    
    // Check for existence of user
$email=$values['email'];
$adm=$values['adm'];
if((mysqli_num_rows(mysqli_query(connect_to_db(),"SELECT * FROM  student WHERE student_id LIKE '$adm'  OR student_email  LIKE '$email' "))))

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
    $password=$values['password'];
    $confirm_password=$values['confirm_password'];
//$query="INSERT INTO student ('student_id','student_fname','student_sname','student_surname',student_email) VALUES('$adm','$fname','$sname','$surname','$email')";
$query="INSERT INTO `student` (`student_id`, `student_fname`, `student_sname`, `student_surname`, `student_email`,`student_password`) VALUES ('$adm','$fname','$sname','$surname','$email','$password')";
 $result=mysqli_query(connect_to_db(),$query); 
if($result)
   {
    
        if($password==$confirm_password)
       {
    
         echo "<script>alert('Registration succesful')</script>";
         header('Refresh:0;index.php');
       }
       else
     {
        echo "<script>alert('Password and confirm password mismatch please try again')</script>";
        header('Refresh:0; register.php');
     }
     }
 


     
}

}

 
function login($values=array())
{ 
     
    

        //capture user data
    $password=$values['password'];
    $adm=$values['adm'];

    // check if user is registered
    $query1="SELECT * FROM student WHERE  student_id LIKE '$adm' AND student_password LIKE '$password'";
   
    $query2=mysqli_query(connect_to_db(),$query1);

    // check number of records
    
    
    if($query2)
      {   
     
        $check_user=mysqli_num_rows($query2); 

        if($check_user){

            session_start();
         $_SESSION['adm']= $adm;
        echo "<script>alert('Login successful')</script>";
        header('Refresh:0; Home.php');

        }      

           
       
       else

       {
           echo "<script>alert('admission number or password does not match')</script>";
           header('Refresh:0;index.php');
       }
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
