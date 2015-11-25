<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/24
 * Time: 21:48
 */

namespace TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use TestBundle\Entity\Task;


class FormController extends Controller
{
    /**
     * @Route("/form/new", name = "newform")
     */
    public function newForm(Request $request)
    {

        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));
        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving the task to the database
            return $this->redirectToRoute('form_success');
        }

        return $this->render('TestBundle:Default:Form/new.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/form/success",  name = "form_success")
     */
    public function successForm(Request $request)
    {
        return new Response("submit new form successed !");
    }

}