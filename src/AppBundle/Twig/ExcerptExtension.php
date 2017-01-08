<?php
namespace AppBundle\Twig;

class ExcerptExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('excerpt', [$this, 'excerptFilter'])
        ];
    }

    /**
     * Truncate a string
     * @param $content
     * @param int $limit
     * @param string $ending
     * @return string
     */
    public function excerptFilter($content, $max_words = 100, $ending = "...")
    {
        $text = strip_tags($content);
        $words = explode(' ', $text);
        if (count($words) > $max_words) {
            return implode(' ', array_slice($words, 0, $max_words)) . $ending;
        }
        return $text;
    }

    public function getName()
    {
        return 'excerpt_extension';
    }
}