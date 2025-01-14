<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\CoreBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211221152344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE `assets_metadata`
            CHANGE `cid` `cid` int(11) unsigned NOT NULL,
            ADD CONSTRAINT `fk_assets_metadata_assets`
            FOREIGN KEY (`cid`)
            REFERENCES `assets` (`id`)
            ON UPDATE NO ACTION
            ON DELETE CASCADE;');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE `assets_metadata`
            DROP FOREIGN KEY `fk_assets_metadata_assets`,
            CHANGE `cid` `cid` int(11) NOT NULL;');
    }
}
