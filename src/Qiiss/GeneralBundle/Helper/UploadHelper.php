<?php

namespace Qiiss\GeneralBundle\Helper;

use Qiiss\GeneralBundle\Helper\FormUploadHelper;
use Qiiss\GeneralBundle\Helper\XhrUploadHelper;


/**
 * A helper that allows handling of uploaded files
 *
 * @author Nic Barker <bicnarker@me.com>
 */
class UploadHelper {

    private $allowedExtensions;
    private $sizeLimit;
    private $file;
    private $uploadName;
    private $container;
    private $content_type;

    /**
     * @param array $allowedExtensions; defaults to an empty array
     * @param int $sizeLimit; defaults to the server's upload_max_filesize setting
     * @param string $inputName; defaults to the javascript default: 'qqfile'
     */
    function __construct($container){
        $this->container = $container;
        $allowedExtensions = array("jpg", "gif", "png");
        $sizeLimit = null;
        $inputName = 'qqfile';
        if($allowedExtensions===null) {
            $allowedExtensions = array();
        }
        if($sizeLimit===null) {
            $sizeLimit = $this->toBytes(ini_get('upload_max_filesize'));
        }

        $allowedExtensions = array_map("strtolower", $allowedExtensions);

        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;

        $this->checkServerSettings();

        $this->content_type = $container->get('request')->headers->get('content_type');
        if(!isset($this->content_type)) {
            $this->file = false;
        } else if (strpos(strtolower($this->content_type), 'multipart/') === 0) {
            $this->file = $this->container->get('general.helper.formupload');
        } else {
            $this->file = $this->container->get('general.helper.xhrupload');
        }
    }

    /**
     * Get the name of the uploaded file
     * @return string
     */
    public function getUploadName(){
        if( isset( $this->uploadName ) )
            return $this->uploadName;
    }

    /**
     * Get the original filename
     * @return string filename
     */
    public function getName() {
        if ($this->file) {
            return $this->file->getName();
        }
    }

    /**
     * Internal function that checks if server's may sizes match the
     * object's maximum size for uploads
     */
    private function checkServerSettings() {
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            die(json_encode(array('error'=>'increase post_max_size and upload_max_filesize to ' . $size)));
        }
    }

    /**
     * Convert a given size with units to bytes
     * @param string $str
     */
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;
        }
        return $val;
    }

    /**
     * Handle the uploaded file
     * @param string $uploadDirectory
     * @param string $replaceOldFile=true
     * @returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)) {
            return array('error' => "Server error. Upload directory isn't writable.");
        }

        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }

        $size = $this->file->getSize();

        if ($size == 0) {
            return array('error' => 'File is empty');
        }

        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }

        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        $ext = @$pathinfo['extension'];     // hide notices if extension is empty

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }

        $ext = ($ext == '') ? $ext : '.' . $ext;

        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)) {
                $filename .= md5(rand(10, 10000));
            }
        }

        $this->uploadName = $filename . $ext;

        if ($this->file->save($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)) {
            // Resize the image using imagemagick
            $webDirectory = '/Users/bicnarker/Sites/Qiiss/web/';
            $filePath = $uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext;
            $mediumFile = $uploadDirectory . DIRECTORY_SEPARATOR . '_medium_' . $filename . $ext;
            $largeFile = $uploadDirectory . DIRECTORY_SEPARATOR . '_large_' . $filename . $ext;
            exec('convert ' . $webDirectory . $filePath . ' -resize 200x200 ' . $mediumFile);
            exec('convert ' . $webDirectory . $filePath . ' -resize 600x600 ' . $largeFile);
            return array(
                'success' => true,
                'filename' => $uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext,
                'mediumFile' => $mediumFile,
                'largeFile' => $largeFile,
            );
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
    }
}