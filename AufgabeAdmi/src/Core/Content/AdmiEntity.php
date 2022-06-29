<?php declare(strict_types=1);

namespace AufgabeAdmi\Core\Content;

use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class AdmiEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var string
     */

    protected $name;


    /**
     * @var string
     */

    protected $text;



    /**
     * @var CountryEntity|null
     */
    protected $country;



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }



    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }






    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return CountryEntity|null
     */
    public function getCountry(): ?CountryEntity
    {
        return $this->country;
    }

    /**
     * @param CountryEntity|null $country
     */
    public function setCountry(?CountryEntity $country): void
    {
        $this->country = $country;
    }
}
