<?php declare(strict_types=1);

namespace AufgabeAdmi\Core\Content;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                      add(AdmiCollection $entity)
 * @method void                      set(string $key, AdmiCollection $entity)
 * @method AdmiCollection[]    getIterator()
 * @method AdmiCollection[]    getElements()
 * @method AdmiCollection|null get(string $key)
 * @method AdmiCollection|null first()
 * @method AdmiCollection|null last()
 */
class AdmiCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return AdmiEntity::class;
    }
}
