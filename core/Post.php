<?php
require_once('Database.php');

/**
 * Post
 */
class Post extends Database
{
    private $db = null;
    private ?string $table = "posts";
    private ?string $title = null;
    private ?string $content = null;
    private ?string $slug = null;
    private ?string $picture_one = null;
    private ?string $picture_two = null;
    private ?string $picture_three = null;
    private ?string $categories = null;
    private ?string $tags = null;
    private int $user_id;

    public function __construct()
    {
        $this->db = new Database();
        $this->user_id = 1;
    }

        
    /**
     * Method add
     *
     * Add Post to Database
     * 
     * @return array
     */
    public function add(): array
    {
        return $this->db->query("INSERT INTO $this->table(title, content, slug, picture_one, picture_two, picture_three, categories, tags, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)", [$this->title, $this->content, $this->slug, $this->picture_one, $this->picture_two, $this->picture_three, $this->categories, $this->tags, $this->user_id]);
    }

    public function getAll(): array
    {
        return $this->db->fetchAll("SELECT title, content, slug, picture_one, picture_two, picture_three, categories, tags, added_date FROM $this->table");
    }

    public function getBySlug(string $slug): array
    {
        return $this->db->fetch("SELECT title, content, slug, picture_one, picture_two, picture_three, categories, tags, added_date FROM $this->table WHERE slug = ?", [$slug]);
    }

    public function getRecents(int $limit=4): array
    {
        return $this->db->fetchAll("SELECT title, content, slug, picture_one, picture_two, picture_three, categories, tags, added_date FROM $this->table ORDER BY added_date DESC LIMIT $limit");
    }
    
    /**
     * Method createSlug
     * 
     * Creat slug from a string
     * 
     * @param string $string [explicite description]
     *
     * @return string
     */
    private function createSlug(string $string):string
    {
        $string = strtolower($string); // Convertir la chaîne en minuscules
        $string = preg_replace('/[\s-]+/', '-', $string); // Remplacer les espaces et tirets par un tiret
        $string = preg_replace('/[^A-Za-z0-9-]/', '', $string); // Supprimer les caractères spéciaux
        return trim($string, '-'); // Supprimer les tirets des extrémités
    }


    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */
    public function setSlug()
    {
        $this->slug = $this->createSlug($this->title);;

        return $this;
    }

     /**
     * Get the value of picture_one
     */ 
    public function getPicture_one()
    {
        return $this->picture_one;
    }

    /**
     * Set the value of picture_one
     *
     * @return  self
     */ 
    public function setPicture_one($picture_one)
    {
        $this->picture_one = $picture_one;

        return $this;
    }

    /**
     * Get the value of picture_two
     */
    public function getPicture_two()
    {
        return $this->picture_two;
    }

    /**
     * Set the value of picture_two
     *
     * @return  self
     */
    public function setPicture_two($picture_two)
    {
        $this->picture_two = $picture_two;

        return $this;
    }

    /**
     * Get the value of picture_three
     */
    public function getPicture_three()
    {
        return $this->picture_three;
    }

    /**
     * Set the value of picture_three
     *
     * @return  self
     */
    public function setPicture_three($picture_three)
    {
        $this->picture_three = $picture_three;

        return $this;
    }

    /**
     * Get the value of categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}