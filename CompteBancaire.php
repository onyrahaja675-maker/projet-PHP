
<?php

class CompteBancaire {

    public string $numero;
    public string $titulaire;
    public float $solde;

    public function __construct($numero, $titulaire, $solde) {
        $this->numero = $numero;
        $this->titulaire = $titulaire;
        $this->solde = $solde;
    }

    public function afficher(): void {
        echo $this->numero . " | " . $this->titulaire . " | " . $this->solde . " Ar\n";
    }

    public function deposer(float $montant): bool {
        if ($montant > 0) {
            $this->solde = $this->solde + $montant;
            return true;
        }

        return false;
    }

    public function retirer(float $montant): bool {
        if ($this->solde >= $montant && $montant > 0) {
            $this->solde = $this->solde - $montant;
            return true;
        }
        else {
            echo "Retrait refuse sur " . $this->numero . ": solde insuffisant\n";
            return false;
        }
    }

    public function virer(float $montant, CompteBancaire $dest): bool {
        if ($this->retirer($montant) == true) {
            $dest->deposer($montant);
            return true;
        }

        return false;
    }
}

// Creation d'objet

$c1 = new CompteBancaire("CPT-001", "Rakoto", 500000);
$c2 = new CompteBancaire("CPT-002", "Rasoa", 0);
$c3 = new CompteBancaire("CPT-003", "Randria", 120000);

$c2->deposer(200000);
$c1->retirer(150000);
$c3->retirer(300000);
$c1->virer(100000, $c2);
$c2->virer(50000, $c3);

// Tableau

$total = 0;
$comptes = [$c1, $c2, $c3];

foreach ($comptes as $compte) {
    $compte->afficher();
    $total = $total + $compte->solde;
}

echo "Nombre de compte : " . count($comptes) . "\n";
echo "Total des soldes : " . $total . " Ar\n";

?>
