<?php

/**
 * AddressBook rootnode 
 *
 * This object lists a collection of users, which can contain addressbooks.
 *
 * @package Sabre
 * @subpackage CardDAV
 * @copyright Copyright (C) 2007-2011 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/) 
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class Sabre_CardDAV_AddressBookRoot extends Sabre_DAVACL_AbstractPrincipalCollection {

    /**
     * Principal Backend 
     * 
     * @var Sabre_DAVACL_IPrincipalBackend
     */
    protected $principalBackend;

    /**
     * CardDAV backend 
     * 
     * @var Sabre_CardDAV_Backend_Abstract 
     */
    protected $carddavBackend;

    /**
     * Constructor 
     *
     * This constructor needs both a principal and a carddav backend.
     *
     * @param Sabre_DAVACL_IPrincipalBackend $principalBackend 
     * @param Sabre_CardDAV_Backend_Abstract $carddavBackend 
     */
    public function __construct(Sabre_DAVACL_IPrincipalBackend $principalBackend,Sabre_CardDAV_Backend_Abstract $carddavBackend) {

        $this->carddavBackend = $carddavBackend;
        parent::__construct($principalBackend);

    }

    /**
     * Returns the name of the node 
     * 
     * @return string 
     */
    public function getName() {

        return Sabre_CardDAV_Plugin::ADDRESSBOOK_ROOT;

    }

    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     * 
     * @param array $principal 
     * @return Sabre_DAV_INode 
     */
    public function getChildForPrincipal(array $principal) {

        return new Sabre_CardDAV_UserAddressBooks($this->carddavBackend, $principal['uri']);

    }

}
