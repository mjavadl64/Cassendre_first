<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260126140129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, refrence VARCHAR(20) NOT NULL, declared_perimeter VARCHAR(100) NOT NULL, status VARCHAR(20) NOT NULL, synthesis LONGTEXT DEFAULT NULL, INDEX IDX_9218FF7919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(20) NOT NULL, title VARCHAR(100) NOT NULL, price NUMERIC(5, 2) NOT NULL, file_path VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_certification (client_id INT NOT NULL, certification_id INT NOT NULL, INDEX IDX_1B8A574119EB6921 (client_id), INDEX IDX_1B8A5741CB47068A (certification_id), PRIMARY KEY(client_id, certification_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, email VARCHAR(100) NOT NULL, phone_number VARCHAR(20) DEFAULT NULL, password VARCHAR(100) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_audit (user_id INT NOT NULL, audit_id INT NOT NULL, INDEX IDX_70DA0421A76ED395 (user_id), INDEX IDX_70DA0421BD29F359 (audit_id), PRIMARY KEY(user_id, audit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF7919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client_certification ADD CONSTRAINT FK_1B8A574119EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_certification ADD CONSTRAINT FK_1B8A5741CB47068A FOREIGN KEY (certification_id) REFERENCES certification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user_audit ADD CONSTRAINT FK_70DA0421A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_audit ADD CONSTRAINT FK_70DA0421BD29F359 FOREIGN KEY (audit_id) REFERENCES audit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD password VARCHAR(100) NOT NULL, ADD siret VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audit DROP FOREIGN KEY FK_9218FF7919EB6921');
        $this->addSql('ALTER TABLE client_certification DROP FOREIGN KEY FK_1B8A574119EB6921');
        $this->addSql('ALTER TABLE client_certification DROP FOREIGN KEY FK_1B8A5741CB47068A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user_audit DROP FOREIGN KEY FK_70DA0421A76ED395');
        $this->addSql('ALTER TABLE user_audit DROP FOREIGN KEY FK_70DA0421BD29F359');
        $this->addSql('DROP TABLE audit');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE client_certification');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_audit');
        $this->addSql('ALTER TABLE client DROP password, DROP siret');
    }
}
