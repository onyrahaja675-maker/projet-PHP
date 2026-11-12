<?php

class Employe {

    public $matricule;
    public $nom;
    public $salaireBase;

    
    public function __construct($matricule, $nom, $salaireBase) {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->salaireBase = $salaireBase;
    }

    
    public function calculerSalaire() {
        return $this->salaireBase;
    }

   
    public function getType() {
        return "Employe";
    }

   
    public function afficher() {
        echo $this->matricule . " | ";
        echo $this->nom . " | ";
        echo $this->getType() . " | ";
        echo $this->calculerSalaire() . " Ar";
        echo "<br>";
    }
}


class Manager extends Employe {

    
    public $prime;

   
    public function __construct($matricule, $nom, $salaireBase, $prime) {
        
        parent::__construct($matricule, $nom, $salaireBase);

        
    }

    
    public function calculerSalaire() {
        $salaireDuPapa = parent::calculerSalaire();
        $salaireTotal = $salaireDuPapa + $this->prime;
        return $salaireTotal;
    }

    public function getType() {
        return "Manager";
    }

    
}


class Commercial extends Employe {

    public $ventes;
    public $taux;

    public function __construct($matricule, $nom, $salaireBase, $ventes, $taux) {
        
        parent::__construct($matricule, $nom, $salaireBase);

        
        $this->ventes = $ventes;
        $this->taux = $taux;
    }

    
    public function calculerSalaire() {
        $salaireDuPapa = parent::calculerSalaire();
        $commission = $this->ventes * $this->taux / 100;
        $salaireTotal = $salaireDuPapa + $commission;
        return $salaireTotal;
    }

    public function getType() {
        return "Commercial";
    }

} 


class Stagiaire extends Employe {

    
    public function calculerSalaire() {
        $salaireDuPapa = parent::calculerSalaire();
        $salaireTotal = $salaireDuPapa * 30 / 100;
        return $salaireTotal;
    }

    public function getType() {
        return "Stagiaire";
    }

    
}




$e1 = new Employe("E01", "Rabe", 600000);
$m1 = new Manager("M01", "Rakoto", 1200000, 400000);
$c1 = new Commercial("C01", "Rasoa", 500000, 8000000, 5);
$c2 = new Commercial("C02", "Hery", 500000, 3000000, 5);
$e2 = new Employe("E02", "Fara", 650000);
$s1 = new Stagiaire("S01", "Tiana", 600000);


$personnel = [$e1, $m1, $c1, $c2, $e2, $s1];


$masseSalariale = 0;
$nombreDeCommerciaux = 0;
$meilleurSalaire = 0;
$nomMieuxPaye = "";


echo "Matricule | Nom | Type | Salaire\n";


foreach ($personnel as $personne) {

    
    $personne->afficher();

    
    $salaireDeLaPersonne = $personne->calculerSalaire();
    $masseSalariale = $masseSalariale + $salaireDeLaPersonne;

    

    if ($personne instanceof Commercial) {
        $nombreDeCommerciaux = $nombreDeCommerciaux + 1;
    }


    if ($salaireDeLaPersonne > $meilleurSalaire) {
        $meilleurSalaire = $salaireDeLaPersonne;
        $nomMieuxPaye = $personne->nom;
    }
}


echo "<br>";
echo "Masse salariale : " . $masseSalariale . " Ar\n";
echo "Nombre de commerciaux : " . $nombreDeCommerciaux . \n;
echo "Salaire le plus eleve : " . $nomMieuxPaye . "\n";

?>