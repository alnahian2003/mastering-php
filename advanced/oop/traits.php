<?php
/* 
* Start Date: 10:30 PM, 17 May 2022
* End Date: 11:18 PM, 17 May 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Traits in OOP PHP
*/

trait uploadFile{
    public $uploaded = false; 
    public function uploading(){
        echo "Uploading....\n";
    }

    public function uploaded(){
        $this->uploaded = true;
        echo "Upload Completed!\n";
    }

    public function uploadFailed(){
        $this->uploaded = false;
        echo "Upload Failed :(\n";
    }
}

trait submitForm{
    public function submit(){
        echo "Submitted\n";
    }
}

class Upload{
    use uploadFile;
}

$n = new Upload();

$n->uploaded();


class Forms{
    use submitForm, uploadFile; // multiple traits
}

$f = new Forms();

$f->submit();
$f->uploadFailed();