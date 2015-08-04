<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="contacts__department")
 * @ORM\Entity
 */
class Department
{
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
     * @ORM\Column(name="name", type="string", length=128)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Mukhin\ContactsBundle\Entity\Department", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Mukhin\ContactsBundle\Entity\Department", mappedBy="parent")
     **/
    private $children;

    /**
     * @ORM\ManyToMany(targetEntity="Mukhin\ContactsBundle\Entity\Contact")
     * @ORM\JoinTable(
     *      name="contacts__department_have_contact",
     *      joinColumns={@ORM\JoinColumn(name="contact_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"position"="ASC", "id"="ASC"})
     **/
    protected $contacts;

    /**
     * @ORM\ManyToMany(targetEntity="Mukhin\ContactsBundle\Entity\Person")
     * @ORM\JoinTable(
     *      name="contacts__department_have_person",
     *      joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"position"="ASC", "id"="ASC"})
     **/
    protected $persons;

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
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return boolean
     */
    public function isMajor()
    {
        return is_null($this->parent);
    }

    /**
     * @return boolean
     */
    public function isMinor()
    {
        return !$this->isMajor();
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
     * Set type
     *
     * @param string $type
     * @return Department
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Department
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
     * Add children
     *
     * @param \Mukhin\ContactsBundle\Entity\Department $children
     * @return Department
     */
    public function addChild(\Mukhin\ContactsBundle\Entity\Department $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Mukhin\ContactsBundle\Entity\Department $children
     */
    public function removeChild(\Mukhin\ContactsBundle\Entity\Department $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add contacts
     *
     * @param \Mukhin\ContactsBundle\Entity\Contact $contacts
     * @return Department
     */
    public function addContact(\Mukhin\ContactsBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Mukhin\ContactsBundle\Entity\Contact $contacts
     */
    public function removeContact(\Mukhin\ContactsBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add persons
     *
     * @param \Mukhin\ContactsBundle\Entity\Person $persons
     * @return Department
     */
    public function addPerson(\Mukhin\ContactsBundle\Entity\Person $persons)
    {
        $this->persons[] = $persons;

        return $this;
    }

    /**
     * Remove persons
     *
     * @param \Mukhin\ContactsBundle\Entity\Person $persons
     */
    public function removePerson(\Mukhin\ContactsBundle\Entity\Person $persons)
    {
        $this->persons->removeElement($persons);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Department
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
     * @return Department
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

    /**
     * Set parent
     *
     * @param \Mukhin\ContactsBundle\Entity\Department $parent
     * @return Department
     */
    public function setParent(\Mukhin\ContactsBundle\Entity\Department $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Mukhin\ContactsBundle\Entity\Department
     */
    public function getParent()
    {
        return $this->parent;
    }
}
