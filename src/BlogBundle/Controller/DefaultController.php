<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {   $user = $this->getUser();

        // $posts = $this->getDoctrine()->getRepository('BlogBundle:Post')->findBy(array(),array('postedDate' => 'DESC'));
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT a FROM BlogBundle:Post a ORDER BY a.postedDate DESC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
          $query,
          $request->query->get('page',1),
          3
        );


        return $this->render('BlogBundle:Default:index.html.twig',array('user' => $user,
        // 'posts' => $posts,
        'pagination' => $pagination
       ));
    }

    public function handleExceptionAction(){
      $user = $this->getUser();
      return $this->render('BlogBundle:Default:404.html.twig',array('user'=>$user));
    }


    // public function confirmedAction() {
    //   return $this->redirectToRoute('blog_homepage');
    // }
}
