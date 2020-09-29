<?php


    require 'header.php';
    require_once("config/autoload.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
use Models\Users as User;
use Repository\UsersRepo as UserRepo;
$URepo=new UserRepo();
$UArray=array();
$UArray=$URepo->getAll();
    if(isset($_POST))
    {
      
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        foreach($UArray as $user )
        {
            
            
            if(($pass==$user->getPass())&&($user==$user->getUser()));
            {
                $status=$user->getName();
            }
             
        
        }
    
        $_SESSION['status']=$status;
        if($_SESSION['status'])
        {
            header('location: dashboard.php');
        }
        else{
            include('index.php');
        }
    }
    else{
        include ('index.php');
    }
require 'footer.php';