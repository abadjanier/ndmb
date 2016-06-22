<?php

namespace Ndmb\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editor
 *
 * @ORM\Table(name="editors")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"editor" = "Editor"})
 * @ORM\Entity(repositoryClass="Ndmb\CoreBundle\Repository\EditorRepository")
 */
class Editor extends User
{

    public function __construct() {
        parent::__construct();
        $this->role = 'ROLE_EDITOR';
    }

}
