<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181009185602 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, dni VARCHAR(10) NOT NULL, birth_date DATE NOT NULL, notes LONGTEXT DEFAULT NULL, father_full_name VARCHAR(255) NOT NULL, mother_full_name VARCHAR(255) NOT NULL, father_phone VARCHAR(20) NOT NULL, mother_phone VARCHAR(20) NOT NULL, father_fixed_phone VARCHAR(20) DEFAULT NULL, mother_fixed_phone VARCHAR(20) DEFAULT NULL, family_address VARCHAR(100) NOT NULL, postal_code VARCHAR(7) NOT NULL, dni_signing_authority VARCHAR(10) NOT NULL, authority_email VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_B723AF33A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE student');
    }
}
