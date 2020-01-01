<?php


namespace App\Util;


class CharacterMaker
{
    public function characterMaker (int $partySize): array
    {

        $names = [
            "Abrielle", "Adair", "Adara", "Adriel", "Aiyana", "Alissa", "Alixandra", "Altair", "Amara", "Anatola", "Anya", "Arcadia", "Ariadne", "Arianwen", "Aurelia", "Aurelian", "Aurelius", "Avalon", "Acalia", "Alaire", "Auristela", "Bastian", "Breena", "Brielle", "Briallan", "Briseis", "Cambria", "Cara", "Carys", "Caspian", "Cassia", "Cassiel", "Cassiopeia", "Cassius", "Chaniel", "Cora", "Corbin", "Cyprian", "Daire", "Darius", "Destin", "Drake", "Drystan", "Dagen", "Devlin", "Devlyn", "Eira", "Eirian", "Elysia", "Eoin", "Evadne", "Eliron", "Evanth", "Fineas", "Finian", "Fyodor", "Gareth", "Gavriel", "Griffin", "Guinevere", "Gaerwn", "Ginerva", "Hadriel", "Hannelore", "Hermione", "Hesperos", "Iagan", "Ianthe", "Ignacia", "Ignatius", "Iseult", "Isolde", "Jessalyn", "Kara", "Kerensa", "Korbin", "Kyler", "Kyra", "Katriel", "Kyrielle", "Leala", "Leila", "Lilith", "Liora", "Lucien", "Lyra", "Leira", "Liriene", "Liron", "Maia", "Marius", "Mathieu", "Mireille", "Mireya", "Maylea", "Meira", "Natania", "Nerys", "Nuriel", "Nyssa", "Neirin", "Nyfain", "Oisin", "Oralie", "Orion", "Orpheus", "Ozara", "Oleisa", "Orinthea", "Peregrine", "Persephone", "Perseus", "Petronela", "Phelan", "Pryderi", "Pyralia", "Pyralis", "Qadira", "Quintessa", "Quinevere", "Raisa", "Remus", "Rhyan", "Rhydderch", "Riona", "Renfrew", "Saoirse", "Sarai", "Sebastian", "Seraphim", "Seraphina", "Sirius", "Sorcha", "Saira", "Sarielle", "Serian", "Séverin", "Tavish", "Tearlach", "Terra", "Thalia", "Thaniel", "Theia", "Torian", "Torin", "Tressa", "Tristana", "Uriela", "Urien", "Ulyssia", "Vanora", "Vespera", "Vasilis", "Xanthus", "Xara", "Xylia", "Yadira", "Yseult", "Yakira", "Yeira", "Yeriel", "Yestin", "Zaira", "Zephyr", "Zora", "Zorion", "Zaniel", "Zarek"
        ];
        $group = [];
        $character = [];
        for ($i = 0; $i < $partySize; $i++) {
            $rand = random_int(0, count($names)-1);
            $character['name'] = $names[$rand];
            unset($names[$rand]);
            $character['stats'] = $this->statMaker();
            $character['class'] = $this->classMaker();
            $character['dead'] = false;
            $group[] = $character;
        }
        return $group;
    }

    public function statMaker (): array
    {

        $stats = [
            'hp' => rand(25, 30),
            'mp' => rand(5, 10),
        ];
        return $stats;
    }

    public function classMaker (): array
    {

        $class = ["Fighter", "Mage", "Assassin", "Healer", "Ranger"];

        $figherMoves = ['Punch', 'Kick'];
        $mageMoves = ['Blast', 'Shield'];
        $assassinMoves = ['Q-strike', 'Stealth'];
        $healerMoves = ['Holy', 'Heal'];
        $rangerMoves = ['A-shot', 'Slash'];

        $rand = rand(0, count($class)-1);
        $name = $class[$rand];

        $moves =  [];

        switch ($rand):
            case 0:
                $moves[] = $figherMoves;
                break;
            case 1:
                $moves[] = $mageMoves;
                break;
            case 2:
                $moves[] = $assassinMoves;
                break;
            case 3:
                $moves[] = $healerMoves;
                break;
            case 4:
                $moves[] = $rangerMoves;
                break;
            default:
                $move[] = 'special';
                break;
        endswitch;


        $class = [
            'name' => $name,
            'moves' => $moves,
        ];

        return $class;
    }

}
