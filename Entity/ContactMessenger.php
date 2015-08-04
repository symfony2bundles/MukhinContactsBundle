<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table(name="contacts__contact_messenger")
 * @ORM\Entity
 */
class ContactMessenger extends Contact
{
    protected $defaultLabel = 'mukhin.contacts.messenger.label';

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=128)
     * @Assert\NotBlank
     */
    protected $login;

    /**
     * Set email
     *
     * @param string $login
     * @return ContactMessenger
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

}
