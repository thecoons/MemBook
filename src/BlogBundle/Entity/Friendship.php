<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friendship
 *
 * @ORM\Table(name="friendship")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\FriendshipRepository")
 */
class Friendship
{
  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="friends")
   * @ORM\Id
   */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\Id
     */
    private $friend;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setFriend($friend)
    {
        $this->friend = $friend;

        return $this;
    }

    public function getFriend()
    {
        return $this->friend;
    }
}
