<?php declare(strict_types=1);

namespace AufgabeAdmi\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1656000925 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1656000925;
    }

    /**
     * @throws Exception
     */
    public function update(Connection $connection): void
    {

        $connection->executeStatement('CREATE TABLE `aufgabe_admi` (
             `id` BINARY(16) UNIQUE NOT NULL,
             `active` TINYINT(1) NOT NULL DEFAULT 0,
             `last_sent` DATETIME NOT NULL,
             `last_received` DATETIME NOT NULL,
             `last_order_id` INT(11) NOT NULL,
             `orders_batch_size` INT(11) NOT NULL,
             `industry` INT(11) DEFAULT NULL,
             `response_token` VARCHAR(200) DEFAULT NULL,
             `cached_template` LONGTEXT DEFAULT NULL,
             PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            ');

    }


    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
