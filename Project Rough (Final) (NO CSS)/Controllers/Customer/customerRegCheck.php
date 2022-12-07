<?php
     session_start();
     require_once "../../Models/userModel.php";

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $retypedPassword = trim($_POST['retypedPassword']);

    $userType= 'customer';

    $address = trim($_POST['address']);
    $balance = 20000;
    $already_exists_flag;
   // $record;
    $record_elements;
    $user;
 
            $user["username"]=$username;
            $user["password"]=$password;
            $user["email"]=$email;
            $user["address"]=$address;
            $user["balance"]=$balance;
            $user["userType"]=$userType;
     

    if($username == "" || $password == "" || $email == "" ||$retypedPassword==""||$address==""){
        //echo "Null values"; 
        
        header('location: ../../Views/Customer/customerRegistration.php?err=null');

        
    }

    else if(substr_count($username,'|')>0|| substr_count($password,'|')>0 || substr_count($retypedPassword,'|')>0|| substr_count($address,'|')>0)
    {
        header('location: customerRegistration.php?err=|_instance');
 
    }

    else if((substr_count($username,'@')>0)||(substr_count($username,'#')>0)||(substr_count($username,'$')>0)||(substr_count($username,'%')>0))
	{
        header('location: customerRegistration.php?err=spchr_instance');
    }

    else if(strlen($password)<8){
        header('location: customerRegistration.php?err=password_too_short');
    }

    else if(((substr_count($password,'!'))<1) && ((substr_count($password,'@'))<1)&&((substr_count($password,'#'))<1)&&((substr_count($password,'$'))<1)&&((substr_count($password,'%'))<1)){
        header('location: customerRegistration.php?err=password_lacks_spchr');
    }

   
    
    else if($password!=$retypedPassword){
     
      // echo "Passwords do not match!";

      header('location: customerRegistration.php?err=passwords_unmatched');

    }
    
    else{ 
              $already_exists_flag=false;
         
            
                 
              
               
                 
        
                if(checkEmail($user)==true || checkUsername($user)==true ){
                    
                   $already_exists_flag=true;

                   

                } 



        

        if($already_exists_flag==true)
        {


            header('location: ../../Views/Customer/customerRegistration.php?err=already_taken');


        }



        else{

              


        
            if(insertUser($user)==true)
            
             {  $user["userid"]=getLatestID();
                
                setUserCookies($user,72);
        
        
                
        
                 header('location: ../../Views/Customer/customerDashboard.php?message=reg_success');
            }
            
            else{
                header('location: ../../Views/Customer/customerRegistration.php?err=database_error');
            }

         

         

       
        }
    }

?>