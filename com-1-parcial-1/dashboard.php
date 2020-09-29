<?php

include_once 'config/constants.php';
include_once 'config/autoload.php';
?>
<?php require 'header.php';

use Models\Users as user;
use Models\Tasks as task;
use Repository\TaskRepo as taskRepo;
use Repository\UsersRepo as userRepo;
$uRepo=new userRepo();
$tRepo= new taskRepo();
$tArray= array();
$tArray=$tRepo->getAll();
?>

<div class="dashboard uk-flex"> 

    <div class="box">

        <h2>Agregar tarea</h2>

        <form action="addtask.php" method="POST">
            <div class="uk-margin">
                <label for="user">Título</label>
                <input type="text" name="title" class="uk-input"/>
            </div>

            <div class="uk-margin">
                <label for="">Fecha</label>
                <input type="date" name="date" class="uk-input"/>
            </div>

            <div class="uk-margin">
                <label for="">Descripción</label>
                <textarea name="description" class="uk-textarea"></textarea>
            </div>

            <div class="uk-margin">
                <label for="">Recordatorio</label>
                <select class="uk-select" name="reminder">
                    <option value="5 min">5 min</option>
                    <option value ="10 min" >10 min</option>
                    <option value ="30 min" >30 min</option>
                    <option value ="1 hora" >1 hora</option>
                    <option value ="1 dia" >1 día</option>
                </select>
            </div>

            <button type="submit" class="uk-button uk-button-primary">Enviar</button>
        </form>
    </div>

    <div class="box uk-width-1-1">

        <h2 style="color:white">Tareas</h2>

        <div class="tasks uk-flex uk-flex-wrap">
            

            <?php foreach($tArray as $task) {
                if($task->getTitle()!=null){ ?> 
                <div class="card uk-width-1-3@m">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <span uk-icon="icon: comments"></span>
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">
                                     <?php echo $task->getTitle();?>
                                    </h3>
                                    <p class="uk-text-meta uk-margin-remove-top">
                                        <time datetime="2016-04-01T19:00">
                                            <?php echo $task->getDate();?>
                                        </time>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p><?php echo $task->getDescription();?></p>
                        </div>
                        <div class="uk-card-footer uk-flex uk-flex-between">
                            <div class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: clock" class="uk-margin-small-right"></span>
                                <?php echo $task->getReminder();?>
                            </div>
                            <div>
                                <form action="removeTask.php" method="GET">

                                    
                                <!-- OJO este input es importante -->

                              
                                    <input type="text"  name="titleDelete" >
                                
                                    <!-- OJO este input es importante -->

                              
                                    <button  type="submit" class="uk-button uk-button-danger uk-button-small">
                                        <span uk-icon="icon: trash"></span>
                                    </button>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } } ?>          
        
        </div>

    </div>
    
</div>

<?php include('footer.php') ?>