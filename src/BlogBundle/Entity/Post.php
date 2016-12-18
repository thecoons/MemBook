<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\PostRepository")
 */
class Post
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="posted_date", type="datetime")
     */
    private $postedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_book")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var textarea
     *
     * @ORM\Column(name="description", type="text", length=255)
     */
    private $description;

    public function getDescription(){
      return $this->description;
    }

    public function setDescription($text){
      $this->description = $text;
    }

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Post
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set postedDate
     *
     * @param \DateTime $postedDate
     *
     * @return Post
     */
    public function setPostedDate($postedDate)
    {
        $this->postedDate = $postedDate;

        return $this;
    }

    /**
     * Get postedDate
     *
     * @return \DateTime
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }


    public function setUserPost($user)
    {
        $this->user = $user;

        return $this;
    }


    public function getUserPost()
    {
        return $this->user;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Post
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function upvote()
    {
        $this->score += 1;
    }

    public function downvote()
    {
        $this->score -= 1;
    }

    public function initScore(){
      $this->score = 0;
    }

    public function getScore(){
      return $this->score;
    }

}
