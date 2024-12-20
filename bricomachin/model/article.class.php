<?php
require_once(__DIR__ . '/dao.class.php');
require_once(__DIR__ . '/categorie.class.php');

// Un article en vente 
class Article
{
  private int $ref;         // Référence unique
  private string $libelle;     // Nom de l'article
  private Categorie $categorie; // La catégorie de cet attribut
  private float $prix;        // Le prix
  private string $image;       // Nom du fichier image
  // URL absolue pour les images
  private const URL = 'https://www-info.iut2.univ-grenoble-alpes.fr/intranet/enseignements/ProgWeb/data/bricomachin/img/';

  // Constructeur
  public function __construct(
    int $ref = -1,
    string $libelle = '',
    Categorie $categorie = NULL,
    float $prix = 0.0,
    string  $image = ''
  ) {
    $this->ref = $ref;
    $this->libelle = $libelle;
    // On ne peux pas affecter NULL à un attribut de type Categorie
    if ($categorie === NULL) {
      $this->categorie = new Categorie();
    } else {
      $this->categorie = $categorie;
    }
    $this->prix = $prix;
    $this->image = $image;
  }

  // Getters
  public function getRef(): int{
    return $this->ref;
  }

  public function getLibelle(): string{
    return $this->libelle;
  }

  public function getCategorie(): Categorie{
    return $this->categorie;
  }

  public function getPrix(): float{
    return $this->prix;
  }

  public function getImage(): string{
    return $this->image;
  }

  // Retourne l'URL complete de l'image pour une utilisation dans la vue.
  public function getImageURL(): string{
    return self::URL.''.$this->image;
  }

  ////////////// Gestion de la persistance (méthodes CRUD) ////////////////

  // Retourne le nombre total d'articles dans la base
  // Est utilisé pour calculer le nombre de pages
  public static function count(): int{
    $dao = DAO::get();
    // Prépare la requête SQL
    $query = $dao->prepare('SELECT count(*) as nb_categorie FROM article');
    // Exécute la requête SQL en lui passant les paramètres
    $query->execute();
    // Récupère le résultat
    $table = $query->fetchAll();
    // Il ne doit y avoir qu'un seul résultat dans la table
    if (count($table) == 0) {
      throw new Exception('Aucun article trouvé dans la base !');
    }
    // Les données de cette catégorie
    // Crée l'instance
    //
    if (count($table) > 1) {
      throw new Exception("Incohérence:  Il doit y avoir un nombre unique qui est retournée");
    }
    return $table[0]['nb_categorie'];
  }

  ////////////// READ /////////////////////////////////////////////

  // Acces à un article connaissant sa référence
  // $ref : la référence de l'article
  public static function read(int $ref): Article{
    $dao = DAO::get();
    // Prépare la requête SQL
    $query = $dao->prepare('SELECT * FROM article WHERE ref = :reference');
    // Exécute la requête SQL en lui passant les paramètres
    $query->execute([':reference' => $ref]);
    // Récupère le résultat
    $table = $query->fetchAll();
    if (count($table) == 0){
      throw new Exception('Aucun article trouvé dans la base !');
    }
    if (count($table) > 1){
      throw new Exception("Incohérence:  Article $ref existe en ".count($table)." exemplaires");
    }
    return new Article($table[0]['ref'],$table[0]['libelle'],Categorie::read($table[0]['categorie']),$table[0]['prix'],$table[0]['image']);
  }

  // Récupère des articles étant donné un No de page
  // Les articles sont triés par No de référence
  // $page : le No de page qui débute à 1
  // $pageSize : le nombre de référence d'articles par pages
  public static function readPage(int $page, int $pageSize): array{
    $dao = DAO::get();
    // Prépare la requête SQL
    $query = $dao->prepare('SELECT * FROM article LIMIT :sizeP OFFSET :decalage');
    // Exécute la requête SQL en lui passant les paramètres
    $query->execute([':sizeP' => $pageSize,':decalage' => ($page < 2 ? 0:($page-1)*$pageSize)]);
    // Récupère le résultat
    $table = $query->fetchAll();

    if (count($table) == 0)
      throw new Exception('Aucun article trouvé dans la base !');
    
    $article_page = [];
    // on ajoute les articles au tableau
    foreach($table as $article)
      array_push($article_page,new Article($article['ref'],$article['libelle'],Categorie::read($article['categorie']),$article['prix'],$article['image']));
    
    return $article_page;
  }

  // Récupère des articles étant donné un No de page et une catégorie
  // Les articles sont triés par No de référence
  // $page : le No de page qui débute à 1
  // $pageSize : le nombre de référence d'articles par pages
  // $categorie : la categorie qui sert de filtre
  public static function readPageCategorie(int $page, int $pageSize, Categorie $categorie): array{
    $dao = DAO::get();
    // Prépare la requête SQL
    $query = $dao->prepare('SELECT * FROM article WHERE categorie = :idCat LIMIT :sizeP OFFSET :decalage');
    // Exécute la requête SQL en lui passant les paramètres
    $query->execute([':sizeP' => $pageSize,':decalage' => ($page < 2 ? 0:$page-1*$pageSize),':idCat' => $categorie->getId()]);
    // Récupère le résultat
    $table = $query->fetchAll();

    if (count($table) == 0)
      throw new Exception('Aucun article trouvé dans la base !');
    
    $article_page = [];
    // on ajoute les articles au tableau
    foreach($table as $article)
      array_push($article_page,new Article($article['ref'],$article['libelle'],Categorie::read($article['categorie']),$article['prix'],$article['image']));
    
    return $article_page;
  }
}
