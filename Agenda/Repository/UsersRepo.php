<?php
namespace Repository;
use Models\Users as User;
class UsersRepo
{
    private $userList=array();
    private $fileName;
    
    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/data/users.json";
    }
 
    public function Add(User $user)
        {
            $this->RetrieveData();
            
            array_push($this->userList, $user);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->userList;
        }

        private function SaveData()
        {
           /* private $name;
            private $user;
            private $email;*/
            $arrayToEncode = array();
      
            foreach($this->userList as $user)
            {
                $valueArray['name'] = $user->getName();
                $valueArray['user'] = $user->getUser();
                $valueArray['pass'] = $user->getPass();
            
                array_push($arrayToEncode, $valueArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->userList = array();

            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valueArray)
                {
                   
                    $user = new User();
                    $user->setName($valueArray['name']);
                    $user->setUser($valueArray['user']);
                    $user->setPass($valueArray['pass']);
                    array_push($this->userList, $user);
                }
            }
        }
    }
?>
