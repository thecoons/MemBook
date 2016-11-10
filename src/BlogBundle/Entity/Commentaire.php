<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_post", type="datetime")
     */
    private $dataPost;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
    * @ORM\ManyToOne(targetEntity="User")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    **/
    private $user_comment;

    /**
    * @ORM\ManyToOne(targetEntity="Post", inversedBy="commentaires")
    * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
    **/
    private $comment_post;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataPost
     *
     * @param \DateTime $dataPost
     *
     * @return Commentaire
     */
    public function setDataPost($dataPost)
    {
        $this->dataPost = $dataPost;

        return $this;
    }

    /**
     * Get dataPost
     *
     * @return \DateTime
     */
    public function getDataPost()
    {
        return $this->dataPost;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Commentaire
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
