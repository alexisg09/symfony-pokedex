<?php

namespace App\Twig\Type;

use App\Entity\Pokemon;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;


class Type2Filter extends AbstractExtension
{

    public function getFilters(): array
    {
        return [
            new TwigFilter('type2', [$this, 'getType2']),
        ];
    }

    public function getType2(Pokemon $pokemon): string
    {
        return match ($pokemon->getType2()) {
            'Grass' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/grass.png',
            'Fire' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/fire.png',
            'Water' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/water.png',
            'Poison' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/poison.png',
            'Steel' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/steel.png',
            'Flying' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/flying.png',
            'Bug' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/bug.png',
            'Normal' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/normal.png',
            'Electric' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/electric.png',
            'Ground' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/ground.png',
            'Fighting' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/fighting.png',
            'Psychic' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/psychic.png',
            'Rock' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/rock.png',
            'Ghost' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/ghost.png',
            'Dark' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/dark.png',
            'Dragon' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/dragon.png',
            'Ice' => 'https://raw.githubusercontent.com/msikma/pokesprite/master/misc/type-logos/gen8/ice.png',
            default => 'No Type',
        };
    }

}
