<?php

namespace Mukhin\ContactsBundle\Manager;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\UnexpectedResultException;

use Sonata\CoreBundle\Model\BaseEntityManager;

class DepartmentManager extends BaseEntityManager
{
    function findMajor()
    {
        return $this->getRepository()
            ->createQueryBuilder('d')
            ->where('d.parent is NULL')
            ->getQuery()
            ->getResult()
        ;
    }
}
