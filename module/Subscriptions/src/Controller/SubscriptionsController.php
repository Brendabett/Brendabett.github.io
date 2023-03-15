<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Subscriptions\Controller; 

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class SubscriptionsController extends AbstractActionController
{
	private $subTable;
    public function __construct($subTable){
        $this->subTable = $subTable;

    }
    public function subAction()
    {
        $data = $this->subTable->getAllSubs();
        //var_dump($data->toArray());

        return new ViewModel([
            'sub_data' =>  $data
        ]);
    }
    public function addnewsubAction()
    {
        $data = $this->subTable->getAllSubs();
        //var_dump($data->toArray());

        return new ViewModel([
            'sub_data' =>  $data
        ]);
    }
    public function processnewsubAction()
    {
    	if($_POST){
    		$sub_name = $_POST['subname'];
            $company_name = $_POST['companyname'];
            $s_name = $_POST['sname'];
    		$f_name = $_POST['fname'];
    		$stat =$_POST['station'];
    		$dept = $_POST['department'];
            $installation_date = $_POST['installation_date'];
            $expiry_date = $_POST['expiry_date'];
            $expiry = $_POST['expiry'];
            //sub data array
            $data = [
                'sub_id' => '78678968976',  
                'subscription_name' => $_POST['subname'],
                'company_name' => $_POST['companyname'],
                'first_name' => $_POST['fname'],
                'second_name' => $_POST['sname'],
                'station' => $_POST['station'],
                'department' => $_POST['department'],
                'installation_date' => $_POST['installation_date'],
                'expiry_date' => $_POST['expiry_date'],
                'expiry' => $_POST['expiry'],

            ];

            if($this->subTable->addSub($data)){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Subscriptions added Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            }else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> Subscription not added. Try again.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            }
            /*
                id  sub_id  subscription_name   first_name  second_name station department  installation_date   expiry_date company_name    validity    */
    	}
    	return true;
    }
}
