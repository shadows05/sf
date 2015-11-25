<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/24
 * Time: 22:08
 */

namespace TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    /**
     * @Route("/admin", name = "admin")
     */
    public function adminAction()
    {
        var_dump($this->getUser());

        return new Response('<html><body>Admin page!</body></html>');
    }

//    /**
//     * @Route("/logout", name = "logout")
//     */
//    public function logoutAction()
//    {
//        return new Response('logout');
//    }

}