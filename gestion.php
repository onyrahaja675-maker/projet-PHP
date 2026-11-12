<?php
 class Produit{
     public string $nom;
       public float $prix;
       public int $quantite;
    public function __construct($nom,$prix,$quantite){
        $this->nom=$nom;
        $this->prix=$prix;
        $this->quantite=$quantite;
    }
         
    public function valeurStock():float {
      return $this->prix * $this->quantite;
    }
    
    public function vendre(int $qte): void{
        if($this->quantite >= $qte){
             $this->quantite -= $qte;
        }
        
        elseif($this->prix <= 0){
            echo" prix invalide pour ".$this->nom
        }   
        else{
            echo "erreur: vente impossible".$this->nom;
        }
    } 
    
    function afficher(array $t):array{
        echo $this-> nom. "|".$this->prix."ar".$this->qte"|" $this->valeurStock                                                                                                                                                                         
    }
 }
    // creation
    $P1 = new Produit("Riz", 3500, 40);
    $P2 = new Produit("Huile", 9000, 12);
    $P3 = new Produit("Sucre",-2000, 25);
$P1->vendre(15);
echo $P2->vendre(20);
$P3->prix = 4200;

$produit =[$P1, $P2, $P3];
 foreach ($produit as $produits){
    $produits->afficher();
    $total +=$produits->valeurStock();
} 
echo $total."ar";
 