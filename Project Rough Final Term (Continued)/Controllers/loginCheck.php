<?php
    session_start();
    require_once "../Models/userModel.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    $user;
    $user["username"]=$username;
    $user["password"]=$password;

    $loginStatus=false;

    if($username == "" || $password == "" || $userType==""){
        header('location: ../Views/home.php?err=null');
    } 

    else if(substr_count($username,'|')>0|| substr_count($password,'|')>0){
        header('location: ../Views/home.php?err=|_instance');
    }

    else
    { /* $filename;
        $php_filename;
        
        
        switch ($userType) {

         case 'admin':
               $php_filename='../Views/Admin/adminDashboard.php';
          break;

        case 'foodCourtManager':
              $php_filename='../Views/FoodCourtManager/foodCourtManagerDashboard.php';
          break;

        case 'restaurantManager':
              $php_filename='../Views/RestaurantManager/restaurantManagerDashboard.php';
          break;

        case  'restaurantOwner':
                $php_filename='../Views/RestaurantOwner/restaurantOwnerDashboard.php';
          break;

        case  'customer':
               $php_filename='../Views/Customer/customerDashboard.php';
            break;
           
           
        default:
        header('location: ../Views/home.php?err=null');
      } */



      if(login($user)["loginStatus"]==true)
      {
           $user=login($user);
           $loginStatus=true;


      }
 




         

        if($loginStatus==true)
        { 
          setUserCookies($user,72);

              
            // echo "bazinga";
            
           $_SESSION['user']['selectedUserType']=$userType;

           $php_filename=dashboardFetcher($user);

            header('location: '.$php_filename.'?message=log_in_success');
           
             
        }

        else
        {
           // header('location: ../Views/home.php?err=login_failed');

        }





    }

?>