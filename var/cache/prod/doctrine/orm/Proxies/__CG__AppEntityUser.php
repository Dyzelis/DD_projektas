<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'login_name', '' . "\0" . 'App\\Entity\\User' . "\0" . 'login_pass', '' . "\0" . 'App\\Entity\\User' . "\0" . 'name', '' . "\0" . 'App\\Entity\\User' . "\0" . 'surname', '' . "\0" . 'App\\Entity\\User' . "\0" . 'phone', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'rankID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'addressID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'select_VisitID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'perform_PaymentID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'orders', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isActive'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\User' . "\0" . 'id', '' . "\0" . 'App\\Entity\\User' . "\0" . 'login_name', '' . "\0" . 'App\\Entity\\User' . "\0" . 'login_pass', '' . "\0" . 'App\\Entity\\User' . "\0" . 'name', '' . "\0" . 'App\\Entity\\User' . "\0" . 'surname', '' . "\0" . 'App\\Entity\\User' . "\0" . 'phone', '' . "\0" . 'App\\Entity\\User' . "\0" . 'email', '' . "\0" . 'App\\Entity\\User' . "\0" . 'rankID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'addressID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'select_VisitID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'perform_PaymentID', '' . "\0" . 'App\\Entity\\User' . "\0" . 'orders', '' . "\0" . 'App\\Entity\\User' . "\0" . 'isActive'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getLoginName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLoginName', []);

        return parent::getLoginName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLoginName(string $login_name): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLoginName', [$login_name]);

        return parent::setLoginName($login_name);
    }

    /**
     * {@inheritDoc}
     */
    public function getLoginPass(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLoginPass', []);

        return parent::getLoginPass();
    }

    /**
     * {@inheritDoc}
     */
    public function setLoginPass(string $login_pass): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLoginPass', [$login_pass]);

        return parent::setLoginPass($login_pass);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getSurname(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSurname', []);

        return parent::getSurname();
    }

    /**
     * {@inheritDoc}
     */
    public function setSurname(string $surname): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSurname', [$surname]);

        return parent::setSurname($surname);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', []);

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone(?string $phone): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', [$phone]);

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(?string $email): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getRankID(): ?\App\Entity\Rank
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRankID', []);

        return parent::getRankID();
    }

    /**
     * {@inheritDoc}
     */
    public function setRankID(?\App\Entity\Rank $rankID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRankID', [$rankID]);

        return parent::setRankID($rankID);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressID(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressID', []);

        return parent::getAddressID();
    }

    /**
     * {@inheritDoc}
     */
    public function addAddressID(\App\Entity\Address $addressID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAddressID', [$addressID]);

        return parent::addAddressID($addressID);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAddressID(\App\Entity\Address $addressID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAddressID', [$addressID]);

        return parent::removeAddressID($addressID);
    }

    /**
     * {@inheritDoc}
     */
    public function getSelectVisitID(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSelectVisitID', []);

        return parent::getSelectVisitID();
    }

    /**
     * {@inheritDoc}
     */
    public function addSelectVisitID(\App\Entity\Visit $selectVisitID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSelectVisitID', [$selectVisitID]);

        return parent::addSelectVisitID($selectVisitID);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSelectVisitID(\App\Entity\Visit $selectVisitID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSelectVisitID', [$selectVisitID]);

        return parent::removeSelectVisitID($selectVisitID);
    }

    /**
     * {@inheritDoc}
     */
    public function getPerformPaymentID(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPerformPaymentID', []);

        return parent::getPerformPaymentID();
    }

    /**
     * {@inheritDoc}
     */
    public function addPerformPaymentID(\App\Entity\Payment $performPaymentID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPerformPaymentID', [$performPaymentID]);

        return parent::addPerformPaymentID($performPaymentID);
    }

    /**
     * {@inheritDoc}
     */
    public function removePerformPaymentID(\App\Entity\Payment $performPaymentID): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePerformPaymentID', [$performPaymentID]);

        return parent::removePerformPaymentID($performPaymentID);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrders(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrders', []);

        return parent::getOrders();
    }

    /**
     * {@inheritDoc}
     */
    public function addOrder(\App\Entity\Order $order): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOrder', [$order]);

        return parent::addOrder($order);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOrder(\App\Entity\Order $order): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOrder', [$order]);

        return parent::removeOrder($order);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive(bool $isActive): \App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

}