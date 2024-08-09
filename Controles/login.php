<?php
   require_once("../Class/Class_User.php");
?>

<?php
   extract($_POST);
  
   $admin=User::getUser($user,$pass);
    if($admin!=NULL){
         $role=$admin->role;
         session_start();
         $_SESSION['username']=$user;
         if($role==1){
            $_SESSION['role']=1;
            header('location:../pages/Dasbord.php');
         }else{
            $_SESSION['role']=2;
            header('location:../pages/Gestion_Caisse.php');
         } 
    }else header('location:../index.php?error=Not');
?>