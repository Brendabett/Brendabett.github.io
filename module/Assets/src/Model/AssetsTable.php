<?php
namespace Assets\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Select;

class AssetsTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function addnewasset($data)
    { 
     return $this->tableGateway->insert($data); 
    }
    public function getAllAssets(){
    	return $this->tableGateway->select();
    }	
}
?>