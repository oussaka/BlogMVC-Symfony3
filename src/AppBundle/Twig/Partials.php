<?php
namespace AppBundle\Twig;


use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Partials {


    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function sidebar () {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $posts = $em->getRepository('AppBundle:Post')->findBy(
            [],
            ['createdAt' => 'DESC'],
            2,
            0
        );

        return $this->container->get('templating')->render('partials/sidebar.html.twig', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

}