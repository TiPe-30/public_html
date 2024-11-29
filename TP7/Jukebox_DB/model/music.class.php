<?php
require_once(__DIR__ . "/dao.class.php");

// Description d'une musique
class Music
{
  private int $id;
  private string $author;
  private string $title;
  private string $cover;
  private string $mp3;
  private string $category;
  // Chemin URL à ajouter pour avoir l'URL du MP3 et du COVER
  private const URL = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/';

  function __construct(int $id, string $author, string $title, string $cover, string $mp3, string $category)
  {
    $this->cover = $cover;
    $this->title = $title;
    $this->author = $author;
    $this->id = $id;
    $this->mp3 = $mp3;
    $this->category = $category;
  }

  public function getId(): int{
    return $this->id;
  }

  public function getAuthor(): string{
    return $this->author;
  }

  public function getTitle(): string{
    return $this->title;
  }

  public function getCover(): string{
    return $this->cover;
  }

  public function getMp3(): string{
    return $this->mp3;
  }

  public function getCategory(): string{
    return $this->category;
  }


  /////////////////////// READ //////////////////////////////

  // Acces à une musique connaissant sa référence
  // $id : l'identifiant de la musique
  public static function read(int $id): Music
  {
    // Ouverture le la BD par création d'un DAO
    $dao = new DAO();
    $requete = $dao->prepare("SELECT * FROM music WHERE id=:id");
    $requete->execute([':id' => $id]);
    $data = $requete->fetchAll();

    return new Music($data[0]['id'],$data[0]['author'],$data[0]['title'],$data[0]['cover'],$data[0]['mp3'],$data[0]['category']);
  }

  // Max Id
  public static function maxId() : int
  { 
    return 554;
  }
}
