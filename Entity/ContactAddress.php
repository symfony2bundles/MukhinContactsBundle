<?php

namespace Mukhin\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="contacts__contact_address")
 * @ORM\Entity
 */
class ContactAddress extends Contact
{
    protected $defaultLabel = 'mukhin.contacts.address.label';

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=16)
     */
    protected $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=64)
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=128)
     */
    protected $street;

    /**
     * @var string
     *
     * @ORM\Column(name="build", type="string", length=16)
     */
    protected $build;

    public function __toString()
    {
        return sprintf(
            "%s %s, %s, %s",
            $this->getBuild(),
            $this->getStreet(),
            $this->getCity(),
            $this->getCountry()
        );
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return ContactAddress
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return ContactAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return ContactAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return ContactAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set build
     *
     * @param string $build
     * @return ContactAddress
     */
    public function setBuild($build)
    {
        $this->build = $build;

        return $this;
    }

    /**
     * Get build
     *
     * @return string
     */
    public function getBuild()
    {
        return $this->build;
    }

}
