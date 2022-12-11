<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;
/**
 * Add event controller
 *
 */
class AddPayment extends \Core\Controller
{

    /**
     * Display the add event page
     *
     * @return void
     */
    public function viewAction()
    {
        View::renderTemplate('admin/addPayment.html');
    }

    /**
     * Display the submit details page
     * Submit changes to user's contact details via form
     *
     * @return void
     */
    public function submitAction()
    {
        $this->addEvent($_POST);

        View::renderTemplate('Admin/submit_payment_admin.html', (array) $_POST);
    }

    /**
     * Function to edit contact details of a user
     * checks data submitted by user via form and passes them to User model
     *
     * @return void
     */
    private function addEvent()
    {
        $user = new User;
        $_POST = array_filter($_POST); //drop empty values

        if (empty($_POST)) {
            return;
        } else {
            $formData = $_POST;
            $user_id = $user->findIdByEmail($formData['email']);
            $user->addNewPayment($user_id, $formData['ins_number'], $formData['amount'], $formData['payuntil'],  $formData['pay_via'],  $formData['freq'],  $formData['pay_to'], $formData['pay_status']);
        }
    }

}