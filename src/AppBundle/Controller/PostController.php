<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     * @Route("/", name="root")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findAllWithCategoryAndUser();
        return $this->render('post/index.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/post/{slug}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {

        return $this->render('post/show.html.twig', array(
            'post' => $post,
        ));
    }
}
