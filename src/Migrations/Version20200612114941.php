<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612114941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category_poi (category_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_5879B28C12469DE2 (category_id), INDEX IDX_5879B28C7EACE855 (poi_id), PRIMARY KEY(category_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period_offer (period_id INT NOT NULL, offer_id INT NOT NULL, INDEX IDX_187E0F5BEC8B7ADE (period_id), INDEX IDX_187E0F5B53C674EE (offer_id), PRIMARY KEY(period_id, offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review_poi (review_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_718C131F3E2E969B (review_id), INDEX IDX_718C131F7EACE855 (poi_id), PRIMARY KEY(review_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_contact (role_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_F0AF43C3D60322AC (role_id), INDEX IDX_F0AF43C3E7A1254A (contact_id), PRIMARY KEY(role_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_poi (tag_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_7C6585D4BAD26311 (tag_id), INDEX IDX_7C6585D47EACE855 (poi_id), PRIMARY KEY(tag_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_poi ADD CONSTRAINT FK_5879B28C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_poi ADD CONSTRAINT FK_5879B28C7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE period_offer ADD CONSTRAINT FK_187E0F5BEC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE period_offer ADD CONSTRAINT FK_187E0F5B53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review_poi ADD CONSTRAINT FK_718C131F3E2E969B FOREIGN KEY (review_id) REFERENCES review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review_poi ADD CONSTRAINT FK_718C131F7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_contact ADD CONSTRAINT FK_F0AF43C3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_contact ADD CONSTRAINT FK_F0AF43C3E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_poi ADD CONSTRAINT FK_7C6585D4BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_poi ADD CONSTRAINT FK_7C6585D47EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE area ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE area ADD CONSTRAINT FK_D7943D68F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_D7943D68F92F3E70 ON area (country_id)');
        $this->addSql('ALTER TABLE city ADD department_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234AE80F5DF ON city (department_id)');
        $this->addSql('ALTER TABLE comment ADD poi_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C7EACE855 ON comment (poi_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('ALTER TABLE contact ADD poi_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('CREATE INDEX IDX_4C62E6387EACE855 ON contact (poi_id)');
        $this->addSql('ALTER TABLE department ADD area_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18ABD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('CREATE INDEX IDX_CD1DE18ABD0F409C ON department (area_id)');
        $this->addSql('ALTER TABLE offer ADD poi_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E7EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E7EACE855 ON offer (poi_id)');
        $this->addSql('ALTER TABLE poi ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poi ADD CONSTRAINT FK_7DBB1FD68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_7DBB1FD68BAC62AF ON poi (city_id)');
        $this->addSql('ALTER TABLE price ADD offer_id INT DEFAULT NULL, ADD audience_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D953C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9848CC616 FOREIGN KEY (audience_id) REFERENCES audience (id)');
        $this->addSql('CREATE INDEX IDX_CAC822D953C674EE ON price (offer_id)');
        $this->addSql('CREATE INDEX IDX_CAC822D9848CC616 ON price (audience_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE category_poi');
        $this->addSql('DROP TABLE period_offer');
        $this->addSql('DROP TABLE review_poi');
        $this->addSql('DROP TABLE role_contact');
        $this->addSql('DROP TABLE tag_poi');
        $this->addSql('ALTER TABLE area DROP FOREIGN KEY FK_D7943D68F92F3E70');
        $this->addSql('DROP INDEX IDX_D7943D68F92F3E70 ON area');
        $this->addSql('ALTER TABLE area DROP country_id');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234AE80F5DF');
        $this->addSql('DROP INDEX IDX_2D5B0234AE80F5DF ON city');
        $this->addSql('ALTER TABLE city DROP department_id');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7EACE855');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526C7EACE855 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('ALTER TABLE comment DROP poi_id, DROP user_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387EACE855');
        $this->addSql('DROP INDEX IDX_4C62E6387EACE855 ON contact');
        $this->addSql('ALTER TABLE contact DROP poi_id');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18ABD0F409C');
        $this->addSql('DROP INDEX IDX_CD1DE18ABD0F409C ON department');
        $this->addSql('ALTER TABLE department DROP area_id');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E7EACE855');
        $this->addSql('DROP INDEX IDX_29D6873E7EACE855 ON offer');
        $this->addSql('ALTER TABLE offer DROP poi_id');
        $this->addSql('ALTER TABLE poi DROP FOREIGN KEY FK_7DBB1FD68BAC62AF');
        $this->addSql('DROP INDEX IDX_7DBB1FD68BAC62AF ON poi');
        $this->addSql('ALTER TABLE poi DROP city_id');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D953C674EE');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9848CC616');
        $this->addSql('DROP INDEX IDX_CAC822D953C674EE ON price');
        $this->addSql('DROP INDEX IDX_CAC822D9848CC616 ON price');
        $this->addSql('ALTER TABLE price DROP offer_id, DROP audience_id');
    }
}
