<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Post controller.
 *
 */
class CategoryController extends Controller
{
    /**
     * Lists all posts belonging to this category
     *
     * @Route("/category/{slug}", name="category_show")
     * @Method("GET")
     * @param Category $category
     */
    public function showAction(Category $category) {
        $posts = $this->getDoctrine()->getRepository("AppBundle:Post")->findAllWithCategoryAndUser(function ($qb) use ($category) {
            return $qb->where('p.category = :category')->setParameter('category', $category->getId());
        });
        return $this->render(':category:show.html.twig', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

}