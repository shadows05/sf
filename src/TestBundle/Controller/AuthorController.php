<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/22
 * Time: 16:04
 */

namespace TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TestBundle\Entity\Author;

class AuthorController extends  Controller
{

    /**
     * @Route("/validate", name="validate")
     */
    public function validateAction()
    {
        $author = new Author();

        $validator = $this->get('validator');
        $errors = $validator->validate($author);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        return new Response('The author is valid! Yes!');
    }

}