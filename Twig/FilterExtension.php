<?php

namespace Mukhin\ContactsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class FilterExtension extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            // root_departments
            // new \Twig_SimpleFilter('departments_*', array($this, 'departmentsRoots')),
            // new \Twig_SimpleFilter('departments_childs', array($this, 'departmentsChilds')),

            new \Twig_SimpleFilter('contacts_include', array($this, 'contactsFilterInclude')),
            new \Twig_SimpleFilter('contacts_exclude', array($this, 'contactsFilterExclude')),
            new \Twig_SimpleFilter('contacts_has', array($this, 'contactsFilterHas'))
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            // new \Twig_SimpleFunction('contact_render', array($this, 'contactRender')),
            'contact_render'=>new \Twig_Function_Method($this, "contactRender", array("is_safe" => array("html"))),
        );
    }

    /**
     * @param Contact[] $contact
     * @param string[] $types Types to include
     *
     * @return string
     */
    public function contactsFilterInclude($contacts, $types)
    {
        // \Symfony\Component\VarDumper\VarDumper:dump($postfix);
        // die();

        if (!is_array($types)) $types = array($types);
        $result = array();
        foreach ($contacts as $contact) {
            if (in_array($contact->getType(), $types)) {
                $result[] = $contact;
            }
        }

        return $result;
    }

    /**
     * @param Contact[] $contact
     * @param string[] $types Types to exclude
     *
     * @return string
     */
    public function contactsFilterExclude($contacts, $types)
    {
        if (!is_array($types)) $types = array($types);
        $result = array();
        foreach ($contacts as $contact) {
            if (!in_array($contact->getType(), $types)) {
                $result[] = $contact;
            }
        }

        return $result;
    }

    /**
     * Return true if $contacts has given type
     * and false otherwise
     *
     * @param Contact[] $contact
     * @param string[] $types Types to exclude
     *
     * @return string
     */
    public function contactsFilterHas($contacts, $types)
    {
        if (!is_array($types)) $types = array($types);
        foreach ($contacts as $contact) {
            if (in_array($contact->getType(), $types)) return true;
        }

        return false;
    }

    /**
     * @param  Contact $contact
     * @return string
     */
    public function contactRender($contact, $options = array())
    {
        $twig = $this->container->get('templating');

        $template = sprintf(
            "MukhinContactsBundle:Contact:%s.html.twig",
            // "Mukhin/ContactsBundle/Resources/views/Contact/%s.html.twig",
            $contact->getType()
        );

        if (!$twig->exists($template)) {
            // $template = "Mukhin/ContactsBundle/Resources/views/Contact/base.html.twig";
            $template = "MukhinContactsBundle:Contact:base.html.twig";
        }

        return $twig->render($template, array(
            'contact'=>$contact,
            'class'=>isset($options['class']) ? $options['class'] : ''
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'filter_extension';
    }
}
