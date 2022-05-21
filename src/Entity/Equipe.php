<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Dresseur::class, inversedBy: 'equipe')]
    private $dresseur;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipes')]
    public $pokemon_1;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipe_2')]
    public $pokemon_2;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipe_3')]
    public $pokemon_3;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipe_4')]
    public $pokemon_4;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipe_5')]
    public $pokemon_5;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'equipe_6')]
    public $pokemon_6;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDresseur(): ?Dresseur
    {
        return $this->dresseur;
    }

    public function setDresseur(?Dresseur $dresseur): self
    {
        $this->dresseur = $dresseur;

        return $this;
    }

    public function getPokemon1(): ?Pokemon
    {
        return $this->pokemon_1;
    }

    public function setPokemon1(?Pokemon $pokemon_1): self
    {
        $this->pokemon_1 = $pokemon_1;

        return $this;
    }

    public function getPokemon2(): ?Pokemon
    {
        return $this->pokemon_2;
    }

    public function setPokemon2(?Pokemon $pokemon_2): self
    {
        $this->pokemon_2 = $pokemon_2;

        return $this;
    }

    public function getPokemon3(): ?Pokemon
    {
        return $this->pokemon_3;
    }

    public function setPokemon3(?Pokemon $pokemon_3): self
    {
        $this->pokemon_3 = $pokemon_3;

        return $this;
    }

    public function getPokemon4(): ?Pokemon
    {
        return $this->pokemon_4;
    }

    public function setPokemon4(?Pokemon $pokemon_4): self
    {
        $this->pokemon_4 = $pokemon_4;

        return $this;
    }

    public function getPokemon5(): ?Pokemon
    {
        return $this->pokemon_5;
    }

    public function setPokemon5(?Pokemon $pokemon_5): self
    {
        $this->pokemon_5 = $pokemon_5;

        return $this;
    }

    public function getPokemon6(): ?Pokemon
    {
        return $this->pokemon_6;
    }

    public function setPokemon6(?Pokemon $pokemon_6): self
    {
        $this->pokemon_6 = $pokemon_6;

        return $this;
    }
}
