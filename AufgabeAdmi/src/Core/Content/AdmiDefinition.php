<?php declare(strict_types=1);

namespace AufgabeAdmi\Core\Content;

use Shopware\Core\System\Country\CountryDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FloatField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;


class AdmiDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'aufgabe_admi';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return AdmiCollection::class;
    }

    public function getEntityClass(): string
    {
        return AdmiEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new BoolField('active', 'active'),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('text', 'text'))->addFlags(new Required()),
            new FkField('country_id', 'CountryId', CountryDefinition::class),
            new ManyToOneAssociationField(
                'country',
                'country_id',
                CountryDefinition::class,
                'id'
            )

        ]);
    }
}

