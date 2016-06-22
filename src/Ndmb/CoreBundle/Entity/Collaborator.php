<?php

namespace Ndmb\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collaborator
 *
 * @ORM\Table(name="collaborators")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"collaborator" = "Collaborator"})
 * @ORM\Entity(repositoryClass="Ndmb\CoreBundle\Repository\CollaboratorRepository")
 */
class Collaborator extends User
{

    public function __construct() {
        parent::__construct();
        $this->role = 'ROLE_COLLABORATOR';
    }

}
