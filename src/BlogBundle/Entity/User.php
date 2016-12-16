<?php
// src/AppBundle/Entity/User.php

namespace BlogBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
    */
    protected $user_book;


    public function __construct()
    {
        parent::__construct();
        $this->feature = new ArrayCollection();
        $this->friends = new ArrayCollection();
        // your own logic
    }

    public function getUserBook()
    {
      return $this->user_book;
    }

}
