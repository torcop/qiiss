<?php

namespace Qiiss\GeneralBundle\Helper;


/**
 * A helper that allows handling of uploaded files via regular form post
 *
 * @author Nic Barker <bicnarker@me.com>
 */

class FormUploadHelper {

    private $inputName;
    private $container;

    /**
     * @param string $inputName; defaults to the javascript default: 'qqfile'
     */
    public function __construct($container) {
        $this->container = $container;
        $inputName = 'qqfile';
    }

    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {
        return move_uploaded_file($_FILES[$this->inputName]['tmp_name'], $path);
    }

    public function getType() {
        return "FORM";
    }

    /**
     * Get the original filename
     * @return string filename
     */
    public function getName() {
        return $this->container->get('request')->files->get('name');
    }

    /**
     * Get the file size
     * @return integer file-size in byte
     */
    public function getSize() {
        return $this->container->get('request')->files->get('size');
    }
}
