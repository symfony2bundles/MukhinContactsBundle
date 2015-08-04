<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table(name="contacts__contact_phone")
 * @ORM\Entity
 */
class ContactPhone extends Contact
{
    protected $defaultLabel = 'mukhin.contacts.phone.label';

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=128)
     * @Assert\NotBlank
     */
    protected $phone;

    /**
     * Set phone
     *
     * @param string $phone
     * @return ContactPhone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

}
