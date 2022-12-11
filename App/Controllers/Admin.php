<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;
/**
 * Admin controller
 *
 */
class Admin extends \Core\Controller
{

    /**
     * Display the admin index page
     *
     * @return void
     */
    public function viewAction()
    {
        View::renderTemplate('admin/index.html');
    }

}