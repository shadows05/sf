<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/24
 * Time: 21:47
 */

namespace TestBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Task
{
    /**
     * @Assert\NotBlank()
     */
    protected $task;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}