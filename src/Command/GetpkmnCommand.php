<?php

namespace App\Command;

use App\Entity\Pokemon;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\PokemonRepository;


#[AsCommand(
    name: 'app:getpkmn',
    description: 'Add a short description for your command',
)]
class GetpkmnCommand extends Command
{

    public function __construct(PokemonRepository $repo)
    {
        parent::__construct(self::$defaultName);
        $this->repo = $repo;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
//            $doctrine = null;
//            $repository = $doctrine->getRepository(Pokemon::class);
            $repository = $this->repo;
            $io->note(sprintf('You passed an argument: %s', $arg1));
            $json = file_get_contents($arg1);
            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($json, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
            foreach ($jsonIterator as $key => $val) {
                if (is_array($val)) {
                    echo($val["name"] . " ajouté \n");
                    $pokemon = new Pokemon();
                    $pokemon->setNom($val["name"]);
                    $pokemon->setDescription($val["description"]);
                    $pokemon->setPoids(floatval($val["weight"]));
                    $pokemon->setType1($val["type1"]);
                    $pokemon->setType2($val["type2"]);
                    $pokemon->setSprite("https://img.pokemondb.net/sprites/black-white/anim/normal/" . strtolower($val["name"]) . ".gif");
                    $pokemon->setShinySprite("https://img.pokemondb.net/sprites/black-white/anim/shiny/" . strtolower($val["name"]) . ".gif");

                    $repository->add($pokemon, true);
                } else {

//                    echo($key . ' : ' . $val . "\n");
                }
            }
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('Impecc!');

        return Command::SUCCESS;
    }
}
