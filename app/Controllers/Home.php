<?php

namespace App\Controllers;
use App\Libraries\Aws_sdk;

class Home extends BaseController
{
    public $aws_sdk;

    public function index()
    {
        $this->aws_sdk = new Aws_sdk();
        
        try{
            $aws_object = $this->aws_sdk->saveObject(array(
                'Bucket'      => 'mybucket',
                'Key'         => 'key',
                'ACL'		  => 'public-read',
                'SourceFile'  => WRITEPATH.'uploads/1.jpg',
                'ContentType' => 'image/jpeg'
            ))->toArray();
        } catch (Exception $e){
            $error 
            = "Something went wrong saving your file.\n".$e;
        }

        var_dump($aws_object); die();
        // $this->aws_sdk->createBucket(array('Bucket' => 'mybucket'));

        // return view('welcome_message');
    }
}