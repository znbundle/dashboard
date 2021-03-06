<?php

namespace ZnBundle\Dashboard\Domain\Services;

use ZnBundle\Dashboard\Domain\Interfaces\Services\DashboardServiceInterface;
use ZnCore\Domain\Base\BaseService;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;

class DashboardService extends BaseService implements DashboardServiceInterface
{

    private $config;

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function setConfig($config): void
    {
        $this->config = $config;
    }

    /*public function getEntityClass() : string
    {
        return DashboardEntity::class;
    }*/

    public function all()
    {
        return $this->config;
    }
}
