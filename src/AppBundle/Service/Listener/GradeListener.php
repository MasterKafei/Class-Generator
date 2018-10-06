<?php

namespace AppBundle\Service\Listener;

use AppBundle\Entity\Grade;
use AppBundle\Service\Util\AbstractContainerAware;
use Doctrine\ORM\Event\LifecycleEventArgs;

class GradeListener extends AbstractContainerAware
{
    public function prePersist(Grade $grade, LifecycleEventArgs $args)
    {
        $this->defineCurrentUserAsOwner($grade);
    }

    public function preUpdate(Grade $grade, LifecycleEventArgs $args)
    {
        $this->defineCurrentUserAsOwner($grade);
    }

    private function defineCurrentUserAsOwner(Grade $grade)
    {
        $grade->setUser($this->container->get('app.business.user')->getCurrentUser());
    }
}
