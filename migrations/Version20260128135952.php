<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260128135952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, reference VARCHAR(20) NOT NULL, date DATETIME NOT NULL, price NUMERIC(5, 2) NOT NULL, type VARCHAR(20) NOT NULL, status VARCHAR(20) NOT NULL, INDEX IDX_9065174419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_9065174419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE audit ADD invoice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF792989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('CREATE INDEX IDX_9218FF792989F1FD ON audit (invoice_id)');
        $this->addSql('ALTER TABLE certification ADD invoice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D752989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('CREATE INDEX IDX_6C3C6D752989F1FD ON certification (invoice_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audit DROP FOREIGN KEY FK_9218FF792989F1FD');
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D752989F1FD');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_9065174419EB6921');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP INDEX IDX_6C3C6D752989F1FD ON certification');
        $this->addSql('ALTER TABLE certification DROP invoice_id');
        $this->addSql('DROP INDEX IDX_9218FF792989F1FD ON audit');
        $this->addSql('ALTER TABLE audit DROP invoice_id');
    }
}
