<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 14.04.17
 * Time: 11:52
 */

namespace app\models;

use vendor\core\Db;
use vendor\core\base\Model;

class User extends Model
{

    public $id,
        $login,
        $f_name,
        $l_name,
        $password,
        $hash;

    function __construct($data = ['login' => "", 'hash' => "", 'f_name' => "", 'l_name' => "", 'password' => "", 'id' => 0])
    {
        parent::__construct();
        $this->table = 'user';

        $this->id = $data['id'];
        $this->login = $data['login'];
        $this->f_name = $data['f_name'];
        $this->l_name = $data['l_name'];
        $this->password = $data['password'];
        $this->hash = $data['hash'];
    }

    public function fetchModel()
    {
        $this->login = (isset($_POST['login']))? $_POST['login'] : "";
        $this->f_name = (isset($_POST['f_name']))? $_POST['f_name'] : "";
        $this->l_name = (isset($_POST['l_name']))? $_POST['l_name'] : "";
        $this->password = (isset($_POST['password']))? $_POST['password'] : "";
    }

    public function save()
    {
        $sql = "INSERT INTO {$this->table}(login, f_name, l_name, password) VALUES (:login, :f_name, :l_name, :password)";

        $bindParams = [
            ':login' => $this->login,
            ':f_name' => $this->f_name,
            ':l_name' => $this->l_name,
            ':password' =>md5($this->password) ,
        ];
        $stmt = $this->pdo->queryBindParams($sql, $bindParams);

        return $stmt;

    }

    public static function findByLogin($login)
    {
        $pdo = Db::instance();
        $req = $pdo->queryOneRow("SELECT * FROM `user` where login = ? limit 1", [$login]);
        if (!$req) return false;
        return new User([
            'id' => $req->id,
            'login' => $req->login,
            'f_name' => $req->f_name,
            'l_name' => $req->l_name,
            'password' => $req->password,
            'hash' => $req->hash,
        ]);
    }

    public function updateHash($hash, $id = 0)
    {
        $id = ($id == 0) ? $this->id : $id;
        $db = Db::instance();
        $sql = "UPDATE `user` SET hash = ? WHERE id = ?";
        return $db->execute($sql, [$hash, $id]);
    }

    public function search($searchStr)
    {
        $sql = "SELECT id, login, f_name, l_name FROM `user` 
                where login LIKE :searchStr OR f_name LIKE :searchStr OR l_name LIKE :searchStr ";
        $bindParams = [
            ':searchStr' => "%$searchStr%",
        ];
        $stmt = $this->pdo->query($sql, $bindParams);
        return $stmt;

    }

    private function loginExists()
    {
        return (User::findByLogin($this->login)) ? true : false;

    }

    public function validate()
    {
        $this->login = trim($this->login);
        $this->f_name = trim($this->f_name);
        $errors = [];
        if (empty($this->login)) {
            $errors['login']['required'] = "Login is required, please enter login";
        }
        if ($this->loginExists()) {
            $errors['login']['exists'] = "This login already exists, please choose another one";
        }
        if (empty($this->f_name)) {
            $errors['f_name']['required'] = "First name is required, please enter your name";
        }
        if(empty($this->password) || empty($_POST['password_confirmation'])){
            $errors['password']['required'] = "Please enter password in both fields";
        }
        else if ($this->password !== $_POST['password_confirmation']){
            $errors['password']['match'] = "Password confirmation do not match with password";
        }

        foreach ($errors as $key => $field_error){
            $errors[$key] = implode('/n', $field_error);
        }
        return $errors;
    }
}