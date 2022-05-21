<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $type_2;

    #[ORM\Column(type: 'float')]
    private $poids;

    #[ORM\Column(type: 'string', length: 255)]
    private $sprite;

    #[ORM\OneToMany(mappedBy: 'pokemon_1', targetEntity: Equipe::class)]
    private $equipes;

    #[ORM\OneToMany(mappedBy: 'pokemon_2', targetEntity: Equipe::class)]
    private $equipe_2;

    #[ORM\OneToMany(mappedBy: 'pokemon_3', targetEntity: Equipe::class)]
    private $equipe_3;

    #[ORM\OneToMany(mappedBy: 'pokemon_4', targetEntity: Equipe::class)]
    private $equipe_4;

    #[ORM\OneToMany(mappedBy: 'pokemon_5', targetEntity: Equipe::class)]
    private $equipe_5;

    #[ORM\OneToMany(mappedBy: 'pokemon_6', targetEntity: Equipe::class)]
    private $equipe_6;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $shiny_sprite;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
        $this->equipe_2 = new ArrayCollection();
        $this->equipe_3 = new ArrayCollection();
        $this->equipe_4 = new ArrayCollection();
        $this->equipe_5 = new ArrayCollection();
        $this->equipe_6 = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType1(): ?string
    {
        return $this->type_1;
    }

    public function setType1(string $type_1): self
    {
        $this->type_1 = $type_1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type_2;
    }

    public function setType2(?string $type_2): self
    {
        $this->type_2 = $type_2;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getSprite(): ?string
    {
        return $this->sprite;
    }

    public function setSprite(string $sprite): self
    {
        $this->sprite = $sprite;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes[] = $equipe;
            $equipe->setPokemon1($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getPokemon1() === $this) {
                $equipe->setPokemon1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe2(): Collection
    {
        return $this->equipe_2;
    }

    public function addEquipes2(Equipe $equipes2): self
    {
        if (!$this->equipe_2->contains($equipes2)) {
            $this->equipe_2[] = $equipes2;
            $equipes2->setPokemon2($this);
        }

        return $this;
    }

    public function removeEquipe2(Equipe $equipe2): self
    {
        if ($this->equipe_2->removeElement($equipe2)) {
            // set the owning side to null (unless already changed)
            if ($equipe2->getPokemon2() === $this) {
                $equipe2->setPokemon2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe3(): Collection
    {
        return $this->equipe_3;
    }

    public function addEquipe3(Equipe $equipe3): self
    {
        if (!$this->equipe_3->contains($equipe3)) {
            $this->equipe_3[] = $equipe3;
            $equipe3->setPokemon3($this);
        }

        return $this;
    }

    public function removeEquipe3(Equipe $equipe3): self
    {
        if ($this->equipe_3->removeElement($equipe3)) {
            // set the owning side to null (unless already changed)
            if ($equipe3->getPokemon3() === $this) {
                $equipe3->setPokemon3(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe4(): Collection
    {
        return $this->equipe_4;
    }

    public function addEquipe4(Equipe $equipe4): self
    {
        if (!$this->equipe_4->contains($equipe4)) {
            $this->equipe_4[] = $equipe4;
            $equipe4->setPokemon4($this);
        }

        return $this;
    }

    public function removeEquipe4(Equipe $equipe4): self
    {
        if ($this->equipe_4->removeElement($equipe4)) {
            // set the owning side to null (unless already changed)
            if ($equipe4->getPokemon4() === $this) {
                $equipe4->setPokemon4(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe5(): Collection
    {
        return $this->equipe_5;
    }

    public function addEquipe5(Equipe $equipe5): self
    {
        if (!$this->equipe_5->contains($equipe5)) {
            $this->equipe_5[] = $equipe5;
            $equipe5->setPokemon5($this);
        }

        return $this;
    }

    public function removeEquipe5(Equipe $equipe5): self
    {
        if ($this->equipe_5->removeElement($equipe5)) {
            // set the owning side to null (unless already changed)
            if ($equipe5->getPokemon5() === $this) {
                $equipe5->setPokemon5(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe6(): Collection
    {
        return $this->equipe_6;
    }

    public function addEquipe6(Equipe $equipe6): self
    {
        if (!$this->equipe_6->contains($equipe6)) {
            $this->equipe_6[] = $equipe6;
            $equipe6->setPokemon6($this);
        }

        return $this;
    }

    public function removeEquipe6(Equipe $equipe6): self
    {
        if ($this->equipe_6->removeElement($equipe6)) {
            // set the owning side to null (unless already changed)
            if ($equipe6->getPokemon6() === $this) {
                $equipe6->setPokemon6(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShinySprite(): ?string
    {
        return $this->shiny_sprite;
    }

    public function setShinySprite(?string $shiny_sprite): self
    {
        $this->shiny_sprite = $shiny_sprite;

        return $this;
    }
}
