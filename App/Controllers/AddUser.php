<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;
/**
 * Add event controller
 *
 */
class AddUser extends \Core\Controller
{

    /**
     * Display the add user page
     *
     * @return void
     */
    public function viewAction()
    {
        View::renderTemplate('admin/addUser.html');
    }

    /**
     * Display the submit details page
     * Submit changes to user's contact details via form
     *
     * @return void
     */
    public function submitAction()
    {
        $this->addUser($_POST);

        View::renderTemplate('Admin/submit_admin.html', (array) $_POST);
    }

    /**
     * Function to edit contact details of a user
     * checks data submitted by user via form and passes them to User model
     *
     * @return void
     */
    private function addUser()
    {
        $user = new User;
        $id = $_SESSION['user_id'];
        $tableName = 'clients';
        $_POST = array_filter($_POST); //drop empty values

        if (empty($_POST)) {
            return;
        } else {
            $formData = $_POST;
            $user->addNewClient($formData['name'], $formData['surname'], $formData['street'], $formData['city'], $formData['postcode'], $formData['email'], $formData['phone']);
        }
    }
}