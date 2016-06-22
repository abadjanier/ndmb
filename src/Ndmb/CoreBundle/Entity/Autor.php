<?php

namespace Ndmb\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autor
 *
 * @ORM\Table(name="autors")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"autor" = "Autor"})
 * @ORM\Entity(repositoryClass="Ndmb\CoreBundle\Repository\AutorRepository")
 */
class Autor extends User
{

    public function __construct() {
        parent::__construct();
        $this->role = 'ROLE_AUTOR';
    }

}
