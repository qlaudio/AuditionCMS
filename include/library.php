<?php
require __DIR__ . '\db';
$db = DB();
/*
 * Tutorial: PHP Login Registration system
 *
 * Page: Application library
 * */

class DemoLib
{

    /*
     * Register New User
     *
     * @param $name, $email, $userid, $password
     * @return ID
     * */
    public function Register($name, $email, $userid, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("INSERT INTO users(name, email, userid, password) VALUES (:name,:email,:userid,:password)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check userid
     *
     * @param $userid
     * @return boolean
     * */
    public function isuserid($userid)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT userid FROM userinfo WHERE userid=:userid");
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */


    /*
     * Login
     *
     * @param $userid, $password
     * @return $mixed
     * */
    public function Login($userid, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT userid FROM userinfo WHERE userid=:userid AND password=:password");
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
         
            $query->bindParam("password", $password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->userid;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * get User Details
     *
     * @param $userid
     * @return $mixed
     * */
    public function UserDetails($userid)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM userinfo WHERE userid=:userid");
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}