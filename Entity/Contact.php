<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contacts__contact")
 * @ORM\Entity
 *
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *    Contact::TYPE_CONTACT    = "Contact",
 *    Contact::TYPE_ADDRESS    = "ContactAddress",
 *    Contact::TYPE_PHONE      = "ContactPhone",
 *    Contact::TYPE_EMAIL      = "ContactEmail",
 *    Contact::TYPE_SOCIAL     = "ContactSocial",
 *    Contact::TYPE_MESSENGER  = "ContactMessenger"
 * })
 */
class Contact implements ContactInterface
{
    const TYPE_CONTACT   = 'contact';
    const TYPE_ADDRESS   = 'address';
    const TYPE_PHONE     = 'phone';
    const TYPE_EMAIL     = 'email';
    const TYPE_SOCIAL    = 'social';
    const TYPE_MESSENGER = 'messenger';

    protected $defaultLabel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=256, nullable=true)
     */
    protected $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=128, nullable=true)
     */
    protected $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    protected $position = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    protected $enabled = true;

    /**
     * @return string
     */
    public function getType()
    {
        $type = explode('\\', get_class($this));
        $type = end($type);
        $type = substr($type, strlen('Contact'));
        $type = strtolower($type);

        if (!$type) $type = 'base';

        return $type;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Contact
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label ?: $this->defaultLabel;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Contact
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Contact
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Contact
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
