<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200223180908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC01896DBBDE');
        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC01B03A8386');
        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC01C76F1F52');
        $this->addSql('DROP INDEX IDX_6648DC01C76F1F52 ON base_entity');
        $this->addSql('DROP INDEX IDX_6648DC01B03A8386 ON base_entity');
        $this->addSql('DROP INDEX IDX_6648DC01896DBBDE ON base_entity');
        $this->addSql('ALTER TABLE base_entity ADD created_by INT DEFAULT NULL, ADD updated_by INT DEFAULT NULL, ADD deleted_by INT DEFAULT NULL, DROP created_by_id, DROP updated_by_id, DROP deleted_by_id');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC01DE12AB56 FOREIGN KEY (created_by) REFERENCES user (id)');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC0116FE72E1 FOREIGN KEY (updated_by) REFERENCES user (id)');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC011F6FA0AF FOREIGN KEY (deleted_by) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6648DC01DE12AB56 ON base_entity (created_by)');
        $this->addSql('CREATE INDEX IDX_6648DC0116FE72E1 ON base_entity (updated_by)');
        $this->addSql('CREATE INDEX IDX_6648DC011F6FA0AF ON base_entity (deleted_by)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC01DE12AB56');
        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC0116FE72E1');
        $this->addSql('ALTER TABLE base_entity DROP FOREIGN KEY FK_6648DC011F6FA0AF');
        $this->addSql('DROP INDEX IDX_6648DC01DE12AB56 ON base_entity');
        $this->addSql('DROP INDEX IDX_6648DC0116FE72E1 ON base_entity');
        $this->addSql('DROP INDEX IDX_6648DC011F6FA0AF ON base_entity');
        $this->addSql('ALTER TABLE base_entity ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD deleted_by_id INT DEFAULT NULL, DROP created_by, DROP updated_by, DROP deleted_by');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC01896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC01B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE base_entity ADD CONSTRAINT FK_6648DC01C76F1F52 FOREIGN KEY (deleted_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6648DC01C76F1F52 ON base_entity (deleted_by_id)');
        $this->addSql('CREATE INDEX IDX_6648DC01B03A8386 ON base_entity (created_by_id)');
        $this->addSql('CREATE INDEX IDX_6648DC01896DBBDE ON base_entity (updated_by_id)');
    }
}
