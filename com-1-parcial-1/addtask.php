<?php
 require_once("Config/Autoload.php");
    
 use Models\Task as task;
 use Models\Users as user;
 
 use Repository\TaskRepo as taskRep;

 if(isset($_POST))
 {

         $title=$_POST['title'];
         $date=$_POST['date'];
         $description=$_POST['description'];
         $reminder=$_POST['reminder'];
         
         $task= new Task();

     $task->setTitle($title);
     $task->setDate($date);
     $task->setDescription($description);
     $task->setReminder($reminder);
     
     $taskRe=new taskRep();

     $taskRe->Add($task);
     
     header('location: dashboard.php');

 }
?>