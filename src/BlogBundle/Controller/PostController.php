<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use BlogBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
  public function createPostAction(Request $request)
  {
    $user = $this->getUser();
    $post = new Post();
    $post->initScore();
    $post->setPostedDate(new \DateTime());
    $post->setUserPost($user);

    $form = $this->createForm(PostType::class,$post);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($post);
      $em->flush();

      return $this->redirect($this->generateUrl(
        'blog_homepage',array()
      ));
    }


    return $this->render('BlogBundle:Post:create_post.html.twig', array(
      'form' => $form->createView(), 'user' => $user
    ));
  }

  public function mybookPostAction(){
    $user = $this->getUser();
    $posts = $user->getUserBook();
    return $this->render('BlogBundle:Post:my_book.html.twig', array('user' => $user, 'posts' => $posts));
  }

  public function showPostAction($id)
  {   $user = $this->getUser();
    $em = $this->getDoctrine()->getManager();
    $post = $em->getRepository('BlogBundle:Post')->find($id);
    $post->upvote();
    $em->persist($post);
    $em->flush();

    return $this->render('BlogBundle:Post:show_post.html.twig', array( 'post' => $post, 'user' => $user
  ));
}

public function deletePostAction($id)
{
  // TODO sécuriser le delete des posts
  // $user = $this.getUser();
  $em = $this->getDoctrine()->getManager();
  $post = $em->getRepository('BlogBundle:Post')->find($id);
  $em->remove($post);
  $em->flush();

  return $this->redirectToRoute('mybook_post');

}

public function updatePostAction(Request $request,$id)
{
  $post = $this->getDoctrine()->getRepository('BlogBundle:Post')->find($id);
  $user = $this->getUser();
  if(!$user->getUserBook()->contains($post)){
    return $this->redirect($this->generateUrl(
      'blog_homepage',array()
    ));
  }
  $form = $this->createForm(PostType::class,$post);
  $form->handleRequest($request);
  if($form->isSubmitted() && $form->isValid()){
    $em = $this->getDoctrine()->getManager();
    $em->persist($post);
    $em->flush();

    return $this->redirect($this->generateUrl(
      'blog_homepage',array()
    ));
  }
  

  return $this->render('BlogBundle:Post:update_post.html.twig', array(
    'form' => $form->createView()
  ));
}

}
