<?php

namespace App\Twig\Generation;

use App\Entity\Pokemon;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;


class GenerationFilter extends AbstractExtension
{

    public function getFilters()
    {
        return [
            new TwigFilter('generation', [$this, 'getGeneration']),
        ];
    }

    public function getGeneration(Pokemon $pokemon)
    {
        $id = $pokemon->getId();
        $id = $id / 150;
        switch (round($id, 0)) {
            case 0:
                return 1;
                break;
            case 1:
                return 2;
                break;
            case 2:
                return 3;
                break;
            case 3:
                return 4;
                break;
            case 4:
                return 5;
                break;
        }
    }

}
