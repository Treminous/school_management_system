<?php

$array_data=$_POST;

if(isset($array_data['btn_student_register']))
   {

    student_register($array_data);
   die();
   }

   if(isset($array_data['btn_student_login']))
   {

    student_login($array_data);
   die();
   }


   if(isset($array_data['staff_register']))
   {

    staff_register($array_data);
   die();
   }
   if(isset($array_data['button']))
   {

    password_reset($array_data);
   die();
   }




//    if(isset($array_data['staff_login']))
//    {

//     staff_login($array_data);
//    die();
//    }




function connect_to_db()
{
 return (mysqli_connect('localhost','root','','academic'));
    
}


// register user
function student_register($values=array())

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

 
function student_login($values=array())
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
function staff_register($item=array())

{
    
    // Check for existence of user
$email=$item['email'];
$id=$item['id'];
if((mysqli_num_rows(mysqli_query(connect_to_db(),"SELECT * FROM  staff WHERE  staff_idno LIKE '$id'  OR staff_email LIKE '$email'  "))))

{
    echo "<script>alert('User already exists')</script>";
    header('Refresh:0;staff_login.php');
}
//Register new user
else
 
 {
    
    $fname=$item['fname'];
    $sname=$item['sname'];
    $surname=$item['surname'];
    $id=$item['id'];
    $role=$item['role'];
    $email=$item['email'];
    $pass=$item['password'];
    $conpass=$item['confirm_password'];
    $contact=$item['contact'];
//$query="INSERT INTO student ('student_id','student_fname','student_sname','student_surname',student_email) VALUES('$adm','$fname','$sname','$surname','$email')";
$query3="INSERT INTO `staff` ( `staff_fname`, `staff_sname`, `staff_surname`, `staff_idno`, `staff_role`, `staff_email`, `staff_password`, `staff_contact`) VALUES ( '$fname', '$sname', '$surname', '$id', '$role', '$email',  '$contact')"; 
$results=mysqli_query(connect_to_db(),$query3); 
if($results)
   {
    
        if($pass==$conpass)
       {
    
         echo "<script>alert('Registered')</script>";
         header('Refresh:0;staff_login.php');
       }
    
    
       else
     {
        echo "<script>alert('Password and confirm password mismatch please try again')</script>";
        header('Refresh:0; staff_register.php');
     }
    }
    
 


     
}

}

   



function  password_reset($values=array())
{
 $email=$values['email'];
 $dquery="SELECT  email FROM student WHERE student_email LIKE '$email'";
 $dquery1=mysqli_connect(connect_to_db(),$dquery);
 $dquery2=mysqli_query(connect_to_db(),$dquery1);
 $dquery3=mysqli_num_rows($dquery2);
 if($dquery3)
 {
    echo "connected";
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
