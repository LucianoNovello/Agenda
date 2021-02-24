<?php
 require_once("config/autoload.php");
    
 use Models\Task as task;
 use Models\Users as user;
 
 use Repository\TaskRepo as taskRep;

 $taskRe=new taskRep();
 $taskArray=array();
 $taskArray=$taskRe->getAll();
 if(isset($_GET))
 {

            $title=$_GET['titleDelete'];
      
     $taskRe->delete($title);
     
     header('location: dashboard.php');

 }