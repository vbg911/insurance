<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;
/**
 * Add event controller
 *
 */
class AddInsurance extends \Core\Controller
{

    /**
     * Display the add insurance page
     *
     * @return void
     */
    public function viewAction()
    {
        View::renderTemplate('admin/addInsurance.html');
    }

    /**
     * Display the submit details page
     * Submit changes to user's contact details via form
     *
     * @return void
     */
    public function submitAction()
    {
        $this->addInsurance($_POST);

        View::renderTemplate('Admin/submit_insurance_admin.html', (array) $_POST);
    }

    /**
     * Function to edit contact details of a user
     * checks data submitted by user via form and passes them to User model
     *
     * @return void
     */
    private function addInsurance()
    {
        $user = new User;
        $_POST = array_filter($_POST); //drop empty values

        if (empty($_POST)) {
            return;
        } else {
            $formData = $_POST;
            $result = $user->findIdByEmail($formData['email']);

            $user->addNewInsurance($result, $formData['ins_number'], $formData['ins_cat'], $formData['startdate'], $formData['enddate'], $formData['ins_status']);
        }
    }
}