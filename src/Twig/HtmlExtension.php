<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class HtmlExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('figure', [$this, 'figureFilter']),
        ];
    }

    public function figureFilter($img, $desc)
    {
        $filter = "<figure>
                        <img src=$img>
                        <figcaption>$desc</figcaption>
                   </figure>";
        return $filter;
    }
}