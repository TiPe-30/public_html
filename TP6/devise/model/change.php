<?php

// Classe chargée de réaliser un change entre deux monnaies
Class Change {
  // Liste des taux indexés par deux IDF de taux séparé par un espace
  private array $rates = array();
  // Liste des IDF des devises
  // Est utile pour afficher les devises que l'on peut choisir
  private array $devises = array();

  // Constructeur
  function __construct(string $filename) {
    // Lecture des taux
    $this->load($filename);
  }

  // Charge la liste des Taux et des idf de devises
  private function load(string $filename) {
    // on charges les taux de changes
    $file = fopen($filename,"r");
    if ($file){
      echo "Fichier ouvert !";
      $buffer = fgets($file,4096);
      $tab_string = array();
      while(($buffer = fgets($file,4096)) !== false){
        $tab_string = explode(",",$buffer);
        $this->rates[$tab_string[0].' '.$tab_string[1]] = $tab_string[2];
        if(!in_array($tab_string[0], $this->devises))
          array_push($this->devises,$tab_string[0]);
        
        if(!in_array($tab_string[1], $this->devises))
          array_push($this->devises,$tab_string[1]);
        
      }
      fclose($file);
    }
  }

  // Calcul du taux entre deux IDF de devises
  function getRate(string $from,string $to) : float {
    if($from == $to){
      return 1;
    }
    if(isset($this->rates[$from.' '.$to])){
      return (float) $this->rates["$from $to"];
    }
    if(isset($this->rates[$to.' '.$from]))
      return (float) 1 / $this->rates["$to $from"];
    
    throw new Exception("ERREUR : taux de $from vers $to inconnu");
  }

  // Retourne toutes les devises disponibles dans un tableau de strings
  function getDevises() : array {
    return $this->devises;
  }

  // Calcul une conversion
  // Arrondit à 2 après la virgule
  function change(string $from, string $to,float $amount) : float {
    return round($this->getRate($from,$to)*$amount,2);
  }
}

?>
