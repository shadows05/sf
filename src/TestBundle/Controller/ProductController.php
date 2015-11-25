<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/22
 * Time: 14:22
 */

namespace TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use TestBundle\Entity\Product;

class ProductController extends Controller
{

    /**
     * @Route("/product/detail/{id}", name="detail")
     */
    public function indexAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('TestBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response("PrductId:".$product->getId()." ProductName:".$product->getName());
    }

    /**
     * @Route("/product/create", name="create")
     */
    public function createAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar Test Product');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        return new Response('Created product id '.$product->getId());
    }

    /**
     * @Route("product/update/{id}/{name}", name="update")
     */
    public function updateAction($id,$name)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('TestBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName($name);
        $em->flush();

        return $this->redirectToRoute('detail', array("id" => $id));
    }
}