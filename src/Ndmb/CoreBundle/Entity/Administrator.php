<?php

namespace Ndmb\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrator
 *
 * @ORM\Table(name="administrators")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"administrator" = "Administrator"})
 * @ORM\Entity(repositoryClass="Ndmb\CoreBundle\Repository\AdministratorRepository")
 */
class Administrator extends User
{

    public function __construct() {
        parent::__construct();
        $this->role = 'ROLE_ADMIN';
    }

}
