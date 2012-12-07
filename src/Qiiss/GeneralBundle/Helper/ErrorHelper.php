<?php

namespace Qiiss\GeneralBundle\Helper;


/**
 * A simple helper that gets all the errors from a form
 *
 * @author Nic Barker <bicnarker@me.com>
 */
class ErrorHelper
{

    public function __construct() {}

    public function getErrorMessages(\Symfony\Component\Form\Form $form) {
        $errors = array();
        foreach ($form->getErrors() as $key => $error) {
            $errors[$key] = $error->getMessage();
        }
        if ($form->hasChildren()) {
            foreach ($form->getChildren() as $child) {
                if (!$child->isValid()) {
                    $errors[$child->getName()] = $this->getErrorMessages($child);
                }
            }
        }
        return $errors;
    }
}