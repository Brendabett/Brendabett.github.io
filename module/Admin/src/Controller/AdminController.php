<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Admin\Controller; 

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AdminController extends AbstractActionController

{
	private $assetsTable;
	public function __construct($assetsTable){
		$this->assetsTable = $assetsTable;
	}
	
    public function admindashAction()
    {
    	$data = $this->assetsTable->getAllAssets();
        //var_dump($data->toArray());
        return new ViewModel([
            'asset_data' => $this->assetsTable->getAllAssets()
        ]);
    } 

}