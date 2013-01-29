<?php

namespace Qiiss\GeneralBundle\Helper;


/**
 * A helper that allows handling of uploaded files via XHR ajax request
 *
 * @author Nic Barker <bicnarker@me.com>
 */

class XhrUploadHelper {

    private $inputName;
    private $container;

    /**
     * @param string $inputName; defaults to the javascript default: 'qqfile'
     */
    public function __construct($container){
        $this->container = $container;
        $this->inputName = 'qqfile';
    }

    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);

        if ($realSize != $this->getSize()) {
            return false;
        }

        $target = fopen($path, "w");
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);

        return true;
    }

    public function getType() {
        return "XHR";
    }

    /**
     * Get the original filename
     * @return string filename
     */
    public function getName() {

        $name = explode("=", $this->container->get('request')->getRequestUri());
        return $name[1];
    }

    /**
     * Get the file size
     * @return integer file-size in byte
     */
    public function getSize() {
        $content_length = $this->container->get('request')->headers->get('content_length');
        if (isset($content_length)) {
            return (int)$content_length;
        } else {
            throw new Exception('Getting content length is not supported.');
        }
    }
}
