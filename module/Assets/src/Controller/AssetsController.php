<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Assets\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AssetsController extends AbstractActionController
{
    private $assetsTable;
    public function __construct($assetsTable)
    {
        $this->assetsTable = $assetsTable;
    } 
    public function assetsAction()
    {
        $data = $this->assetsTable->getAllAssets();
        //var_dump($data->toArray());
        return new ViewModel([
            'asset_data' => $data
        ]);
    }
    public function addassetAction()
    {
        $data = $this->assetsTable->getAllAssets();
        //var_dump($data->toArray());
        return new ViewModel([
            'asset_data' => $data
        ]);
    }
    public function addnewassetAction()
    {
       if($_POST){
            $department = $_POST['department'];
            $item_description = $_POST['item_description'];
            $category = $_POST['category'];
            $serial_no = $_POST['serial_no'];
            $user = $_POST['user'];
            $date_bought = $_POST['date_bought'];
            $date_issued = $_POST['date_issued'];
            $status_of_asset = $_POST['status_of_asset'];
            $station = $_POST['station'];
        //sub data array   
    $data =[      
        'asset_id'=> rand(000000000,999999999),
        'department'=>$_POST['department'],
        'item_description'=>$_POST['item_description'],
        'category'=>$_POST['category'],
        'serial_no'=>$_POST['serial_no'],
        'user'=>$_POST['user'],
        'date_bought'=>$_POST['date_bought'],
        'date_issued'=>$_POST['date_issued'],
        'status_of_asset'=>$_POST['status_of_asset'],
        'station'=>$_POST['station'],
         ];   

        if($this->assetsTable->addnewasset($data)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Asset added Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            }else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> Asset not added. Check connection and Try again.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            }
        } 
        return true;

    }
}
       /*<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Subscriptions added Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>*/
