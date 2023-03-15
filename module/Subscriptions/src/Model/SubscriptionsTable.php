<?php
namespace Subscriptions\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Select;

class SubscriptionsTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function addSub($data)
    {
       return $this->tableGateway->insert($data);
    }
    public function getAllSubs(){
        return $this->tableGateway->Select();
    }
}
?>