<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table(name="contacts__contact_email")
 * @ORM\Entity
 */
class ContactEmail extends Contact
{
    protected $defaultLabel = 'mukhin.contacts.email.label';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    protected $email;

    /**
     * Set email
     *
     * @param string $email
     * @return ContactEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}
