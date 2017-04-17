<?php


namespace app\models;


use vendor\core\base\Model;

class Post extends Model
{
    public $title,
        $text,
        $author,
        $author_name,
        $logo,
        $created_at;


    function __construct()
    {
        parent::__construct();
        $this->table = 'post';
    }

    public function findAll()
    {
        $sql = "SELECT `{$this->table}`.*, `user`.`login` as author_name  FROM {$this->table}
        JOIN `user` on user.id = {$this->table}.author ORDER BY {$this->table}.id DESC 
        ";
        return $this->pdo->query($sql);
    }

      public function findAllByAuthor($author_id)
    {
        $sql = "SELECT `{$this->table}`.*, `user`.`login` as author_name  FROM {$this->table}
        JOIN `user` on user.id = {$this->table}.author 
        WHERE author= :author_id
        ORDER BY {$this->table}.id DESC 
        ";
        $bindParams = [
            ':author_id' => $author_id,
        ];
        return $this->pdo->query($sql,$bindParams);
    }

    public function save()
    {
        $sql = "INSERT INTO {$this->table}(title, text, author, logo) VALUES (:title, :text, :author, :logo)";

        $bindParams = [
            ':title' => $this->title,
            ':text' => $this->text,
            ':author' => $this->author,
            ':logo' => $this->logo,
        ];
        $stmt = $this->pdo->queryBindParams($sql, $bindParams);

        return $stmt;
    }

    public function findOne($id, $field='')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT `{$this->table}`.*, `user`.`login` as author_name  FROM {$this->table}
 JOIN `user` on user.id = {$this->table}.author
 WHERE `{$this->table}`.$field=? LIMIT 1;";
        return $this->pdo->queryOneRow( $sql, [$id]);
    }

    public function validate()
    {
        $this->title = trim($this->title);
        $this->text = trim($this->text);
        $errors=[];
        if (empty($this->title)) {
            $errors['title']['required'] = "Title is required, please enter title";
        }
        if (empty($this->text)) {
            $errors['text']['required'] = "Text is required, please enter text";
        }

        foreach ($errors as $key => $field_error){
            $errors[$key] = implode('/n', $field_error);
        }
        return $errors;
    }

}