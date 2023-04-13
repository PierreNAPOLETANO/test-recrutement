<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * Pour savoir si le rover doit effectuer une rotration ou un déplacement
     * j'ai décider d'utiliser un ternaire pour avoir un code plus concis
     * plus lisible, plus performant
     */
    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            ($command === "l" || $command === "r") ? $this->rotateRover() : $this->displaceRover();
        }
    }

    /**
     * J'ai créer une méthode private, car cela me permet de sécurisé ma
     * classe Rover en évitant de l'éditer à l'extérieure de cette classe
     * 
     * J'ai décidé d'isoler les instructions pour la rotation du rover
     * pour pouvoir avoir un endroit dans mon code permettant d'effectuer
     * l'action de rotation du Rover et de pouvoir le modifier à tout moment
     * si besoin
     * 
     * J'ai également utiliser les ternaires car cela me permet de réduire le
     * bloc if-else, d'optimiser mon code et d'améliorer la lisibilité
     * 
     * J'ai utiliser un switch cela me permet d'avoir un code encore plus clair
     * car le "if" va vérifier toutes les conditions alors que le "switch" va s'arrété 
     * quand il aura trouver la bonne condition.
     */
    private function rotateRover(): void
    {
        switch ($this->direction) {
            case "N":
                $this->direction = $command === "r" ? "E" : "W";
            case "S":
                $this->direction = $command === "r" ? "W" : "E";
            case "W":
                $this->direction = $command === "r" ? "N" : "S";
            default:
                $this->direction = $command === "r" ? "S" : "N";
        }
    }

    /**
     * J'ai créer une méthode private, car cela me permet de sécurisé ma
     * classe Rover en évitant de l'éditer à l'extérieure de cette classe
     * 
     * J'ai décidé d'isoler les instructions pour le déplacement du rover
     * pour pouvoir avoir un endroit dans mon code permettant d'effectuer
     * l'action de déplacement du Rover et de pouvoir le modifier à tout moment
     * si besoin
     * 
     * J'ai utiliser un switch cela me permet d'avoir un code encore plus clair
     * car le "if" va vérifier toutes les conditions alors que le "switch" va s'arrété 
     * quand il aura trouver la bonne condition.
     */
    private function displaceRover(): void
    {        
        $displacement1 = -1;

        if ($command === "f") {
            $displacement1 = 1;
        }

        $displacement = $displacement1;

        switch ($this->direction) {
            case "N":
                $this->y += $displacement;
            case "S":
                $this->y -= $displacement;
            case "W":
                $this->x -= $displacement;
            default:
                $this->x += $displacement;
        }
    }
}