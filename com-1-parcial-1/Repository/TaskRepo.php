<?php
namespace Repository;
use Models\Task as Task;
class taskRepo
{
    private $taskList=array();
    private $fileName;
    
    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/data/tasks.json";
    }
 
    public function Add(Task $task)
        {
            $this->RetrieveData();
            
            array_push($this->taskList, $task);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->taskList;
        }
        public function delete($title){
            $this->retrieveData();
            $newList = array();
            foreach ($this->taskList as $task) {
                if($task->getTitle() != $title){
                    array_push($newList, $task);
                }
            }
    
            $this->taskList = $newList;
            $this->saveData();
        }

        private function SaveData()
        {
            $arrayToEncode = array();
            /*private $tittle;
            private $date;
            private $description;
            private $reminder;*/
            foreach($this->taskList as $task)
            {
                $valueArray['title'] = $task->getTitle();
                $valueArray['date'] = $task->getDate();
                $valueArray['description'] = $task->getDescription();
                $valueArray['reminder'] = $task->getReminder();
                array_push($arrayToEncode, $valueArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->taskList = array();

            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valueArray)
                {
                   /*private $tittle;
            private $date;
            private $description;
            private $reminder;*/
                    $task = new Task();
                    $task->setTitle($valueArray['title']);
                    $task->setDate($valueArray['date']);
                    $task->setDescription($valueArray['description']);
                    $task->setReminder($valueArray['reminder']);
                    array_push($this->taskList, $task);
                }
            }
        }
    }
?>
