<?php

namespace fabriziomanca\phpUpload;

use Exception;

class phpUpload{

    private $upFile;
    public  $Name;
    public  $FileName;
    public  $extension;
    public  $fileSize;
    public  $output;

    public function __construct($file){

        $this->upFile = $file;

        $this->Name = $this->upFile['name'];

        $this->extension = substr($this->Name, strpos($this->Name, '.')+1);

        $this->FileName = substr($this->Name, 0, strpos($this->Name, '.'));

        $this->fileSize = number_format($this->upFile['size']/1024, 2); //size in KB

    }

    public function maxSize($maxs){

        if($this->fileSize > $maxs){

            throw new Exception("Error with the File Size! Max Allowed = $maxs KB");

        }

    }

    public function allowedType($allExt){

        if(!in_array($this->upFile['type'], $allExt)){

            throw new Exception("Mime type not allowed! Allowed = " . implode(', ', $allExt));

        } 

    }

    public function newName($newName){

        $this->FileName = $newName;

    }

    public function run($destination, $replaceSameName){

        if(!is_dir($destination)){

            throw new Exception("Error, the folder does not exists!");

        }

        if(file_exists($destination . "/" . $this->FileName . "." . $this->extension) && !$replaceSameName){

            throw new Exception("Error, the file already exists!");

        }

        if(!move_uploaded_file($this->upFile['tmp_name'], $destination . "/" . $this->FileName . "." . $this->extension)){

            throw new Exception("Error with the moving!");

        }
        else{

            $this->output = $this->FileName . "." . $this->extension;

            return true; 

        }
        

    }

}