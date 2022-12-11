<?php

namespace App\Models;

use PDO;

/**
 * User model
 */
class User extends \Core\Model
{

    /**
     * Connects to the database and add new insurance into table
     *
     * @param $client_id
     * @param $ins_number
     * @param $ins_cat
     * @param $startdate
     * @param $enddate
     * @param $ins_status
     * @return void
     */
    public function addNewInsurance($client_id, $ins_number, $ins_cat, $startdate, $enddate, $ins_status)
    {
        $sql2 =  'INSERT INTO ins_app.insurances (client_id, ins_number, ins_cat, startdate, enddate, ins_status) VALUES (:client_id, :ins_number, :ins_cat, :startdate, :enddate, :ins_status);
';
        $db = static::getDB();
        $stmt = $db->prepare($sql2);
        $stmt->bindValue(':client_id', $client_id, PDO::PARAM_INT);
        $stmt->bindValue(':ins_number', $ins_number, PDO::PARAM_INT);
        $stmt->bindValue(':ins_cat', $ins_cat, PDO::PARAM_INT);
        $stmt->bindValue(':startdate', $startdate, PDO::PARAM_STR);
        $stmt->bindValue(':enddate', $enddate, PDO::PARAM_STR);
        $stmt->bindValue(':ins_status', $ins_status, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Connects to the database and add new insurance into table
     *
     * @param $client_id
     * @param $ins_number
     * @param $ins_cat
     * @param $startdate
     * @param $enddate
     * @param $ins_status
     * @return void
     */
    public function addNewPayment($client_id, $ins_id, $pay_ammount, $pay_until, $pay_via, $frequency, $pay_to, $pay_status)
    {
        $sql2 =  'INSERT INTO ins_app.payments (client_id, ins_id, pay_ammount, pay_until, pay_via, frequency, pay_to, pay_status) VALUES (:client_id, :ins_id, :pay_ammount, :pay_until, :pay_via, :frequency, :pay_to, :pay_status)';
        $db = static::getDB();
        $stmt = $db->prepare($sql2);
        $stmt->bindValue(':client_id', $client_id, PDO::PARAM_INT);
        $stmt->bindValue(':ins_id', $ins_id, PDO::PARAM_INT);
        $stmt->bindValue(':pay_ammount', $pay_ammount, PDO::PARAM_INT);
        $stmt->bindValue(':pay_until', $pay_until, PDO::PARAM_STR);
        $stmt->bindValue(':pay_via', $pay_via, PDO::PARAM_INT);
        $stmt->bindValue(':frequency', $frequency, PDO::PARAM_INT);
        $stmt->bindValue(':pay_to', $pay_to, PDO::PARAM_STR);
        $stmt->bindValue(':pay_status', $pay_status, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Find a user model by email address
     * @param string $email email address to search for
     * @return mixed User object if found, false otherwise
     */
    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM clients WHERE email = :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Find a user model by email address
     * @param string $email email address to search for
     * @return mixed User object if found, false otherwise
     */
    public function findInsIdByNumber($number)
    {
        $sql = 'SELECT ins_id FROM insurances WHERE ins_number = :ins_number';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ins_number', $number, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        foreach ($stmt as $row) {
            return $row[0];
        }
    }

    /**
     * Connects to the database and add new insurance into table
     *
     * @param $client_id
     * @param $ins_number
     * @param $ins_cat
     * @param $startdate
     * @param $enddate
     * @param $ins_status
     * @return void
     */
    public function addNewEvent($client_id, $ins_id, $event_num, $event_date, $event_status)
    {
        $sql2 =  'INSERT INTO ins_app.events (client_id, ins_id, event_num, event_date, status) VALUES (:client_id, :ins_id, :event_num, :event_date, :status)';
        $db = static::getDB();
        $stmt = $db->prepare($sql2);
        $stmt->bindValue(':client_id', $client_id, PDO::PARAM_INT);
        $stmt->bindValue(':ins_id', $ins_id, PDO::PARAM_INT);
        $stmt->bindValue(':event_num', $event_num, PDO::PARAM_INT);
        $stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
        $stmt->bindValue(':status', $event_status, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Find a user model by email address
     * @param string $email email address to search for
     * @return mixed User object if found, false otherwise
     */
    public function findIdByEmail($email)
    {
        $sql = 'SELECT client_id FROM clients WHERE email = :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        foreach ($stmt as $row) {
            return $row[0];
        }
    }

    /**
     * Authenticate login of user
     * @param string $email
     * @param string $password
     * @return mixed $user The user object or false if authentication fails
     */
    public function checkLogin($email, $password)
    {
        $user = $this->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->password_hash)) {
                return $user;
            } //else return $this->errors='Chybně zadaný email.';
        }
        return false;
    }

    /**
     * Connects to database and fetch data from the clients table
     *
     * @param int $id  ID number of client
     * @param string $tableName  DB table name
     * @param string $searchBy DB table column name
     * @param string $query  DB table rows to be fetched
     * @return void
     */
    private function fetchClientData($id, $tableName, $searchBy, $query = '*')
    {
        $sql = 'SELECT ' . $query . ' FROM ' . $tableName . ' WHERE ' . $searchBy . ' = :id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_NAMED);
        $stmt->execute();
        $userData = $stmt->fetchAll();
        return $userData;
    }


    /**
     * Returns data from database to be viewed
     * calls fetchClientData function
     *
     * @param int $id  user id from current session
     * @param string $tableName  name of the database table
     * @param string $query  DB table rows to be fetched
     * @return void
     */
    public function getClientData($id, $tableName, $searchBy = 'client_id', $query = '*')
    {
        $userData = $this->fetchClientData($id, $tableName, $searchBy, $query);

        return $userData;
    }

    /**
     * Connects to the database and updates clients table
     *
     * @param int $id user id from current session
     * @param string $tableName name of the database table
     * @param string $sqlQuery
     * @return void
     */
    private function updateClientData($id, $tableName, $sqlQuery)
    {
        $sql = 'UPDATE ' . $tableName . ' SET ' . $sqlQuery . ' WHERE client_id = :id';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Connects to the database and add new client into table
     *
     * @param $name
     * @param $surmame
     * @param $street
     * @param $city
     * @param $postcode
     * @param $email
     * @param $phone
     * @return void
     */
    public function addNewClient($name, $surmame, $street, $city, $postcode, $email, $phone)
    {
        $sql2 =  'INSERT INTO ins_app.clients (name, surname, street, city, zipcode, email, phone, password_hash) VALUES (:name, :surname, :street, :city, :zipcode, :email, :phone, :password_hash)';
        $db = static::getDB();
        $stmt = $db->prepare($sql2);
        $password_hash = password_hash("insapp", PASSWORD_DEFAULT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':surname', $surmame, PDO::PARAM_STR);
        $stmt->bindValue(':street', $street, PDO::PARAM_STR);
        $stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $postcode, PDO::PARAM_INT);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_INT);
        $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * Sends client data to the database to be updated
     * calls updateClientData function
     *
     * @param int $id user id from current session
     * @param string $tableName name of the database table
     * @param array $formData submitted by user via form
     * @return void
     */
    public function setClientData($id, $tableName, $formData)
    {
        $sqlQuery = $this->formatForSQL($formData);

        $this->updateClientData($id, $tableName, $sqlQuery);
    }

    /**
     * Formats $_POST data to SQL string 
     *
     * @param array $formdata
     * @return string
     */
    private function formatForSQL($formData)
    {
        $queryString = '';
        foreach ($formData as $Key => $Value) {
            $queryString .= $Key . '=' . '\'' . $Value . '\'' . ', ';
        }
        return rtrim($queryString, " ,"); // returns string key='value', key='value' etc.
    }


    
    /**
     * Sends client data to the database to update password
     * calls verifyPassword function
     *
     * @param int $id user id from current session
     * @param string $tableName name of the database table
     * @param string $searchBy database column name for SQL query
     * @param string $query $sqlQuery
     * @param string $enteredPswd value entered by client as a password to be evaluated
     * @param string $newPswd new password entered by user
     * @return string Message of verification status - error or success
     */
    public function setClientPassword($id, $tableName, $searchBy, $query, $enteredPswd, $newPswd)
    {
        $verified = $this->verifyPassword($id, $tableName, $searchBy, $query, $enteredPswd);

        if ($verified === 'Пароль подтвержден') {

            $this->updateClientPassword($id, $tableName, $newPswd);

            return $verified = 'Пароль успешно изменен.';
        }
        else {

            $errorMsg = 'Исходный пароль был введен неправильно.';

            return $errorMsg;
        }
    }


    /**
     * Connects to the database and updates client's password
     *
     * @param int $id user id from current session
     * @param string $tableName name of the database table
     * @param string $newPswd new password entered by user
     * @return void
     */
    private function updateClientPassword($id, $tableName, $newPswd)
    {
        $pswd = password_hash($newPswd, PASSWORD_DEFAULT);

        $qlQuery = 'password_hash=' . '\'' . $pswd . '\'';

        $this->updateClientData($id, $tableName, $qlQuery);
    }


    /**
     * Connects to the database and verifies client's password
     *
     * @param int $id user id from current session
     * @param string $tableName name of the database table
     * @param string $searchBy database column name for SQL query
     * @param string $query $sqlQuery
     * @param string $enteredPswd value entered by client as a password to be evaluated
     * @return string Message of verification status - error or success
     */
    private function verifyPassword($id, $tableName, $searchBy, $query, $enteredPswd)
    {

        $passwordHash = $this->fetchClientData($id, $tableName, $searchBy, $query);

        $hash = $passwordHash[0]['password_hash'];

        if ($hash) {
            if (password_verify($enteredPswd, $hash)) {
                $verified = 'Пароль подтвержден';
                return $verified;
            }
            else {
                $errorMsg = 'Пароль введен неправильно';
                return $errorMsg;
            }
        }
        else {
            $errorMsg = ('Пароль не удалось подтвердить');
            return $errorMsg;
        }
    }
}
