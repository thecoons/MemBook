<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {   $user = $this->getUser();

        $posts = $this->getDoctrine()->getRepository('BlogBundle:Post')->findBy(array(),array('postedDate' => 'DESC'));

        return $this->render('BlogBundle:Default:index.html.twig',array('user' => $user, 'posts' => $posts ));
    }

    public function handleExceptionAction(){
      $user = $this->getUser();
      return $this->render('BlogBundle:Default:404.html.twig',array('user'=>$user));
    }

    public function confirmedAction() {
      return $this->redirectToRoute('blog_homepage');
    }
}
