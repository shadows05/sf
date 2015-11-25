<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 2015/11/22
 * Time: 15:59
 */

namespace TestBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Author
{

    /**
     * @Assert\NotBlank()
     */
    public $name;

}