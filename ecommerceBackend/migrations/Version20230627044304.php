<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627044304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_by_role_id_id INT NOT NULL, created_at DATE NOT NULL, status VARCHAR(15) NOT NULL, INDEX IDX_F5299398B6E2084E (user_by_role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_detail (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, order_id_id INT NOT NULL, INDEX IDX_ED896F46DE18E50B (product_id_id), INDEX IDX_ED896F46FCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, description VARCHAR(100) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_detail (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, category_id_id INT NOT NULL, product_type_id_id INT NOT NULL, size INT NOT NULL, color VARCHAR(10) NOT NULL, INDEX IDX_4C7A3E37DE18E50B (product_id_id), INDEX IDX_4C7A3E379777D11E (category_id_id), INDEX IDX_4C7A3E37E22F468B (product_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, description VARCHAR(100) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_by_role (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, role_id_id INT NOT NULL, INDEX IDX_390BCDDD9D86650F (user_id_id), INDEX IDX_390BCDDD88987678 (role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(20) NOT NULL, address VARCHAR(30) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398B6E2084E FOREIGN KEY (user_by_role_id_id) REFERENCES user_by_role (id)');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F46DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F46FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE product_detail ADD CONSTRAINT FK_4C7A3E37DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_detail ADD CONSTRAINT FK_4C7A3E379777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_detail ADD CONSTRAINT FK_4C7A3E37E22F468B FOREIGN KEY (product_type_id_id) REFERENCES product_type (id)');
        $this->addSql('ALTER TABLE user_by_role ADD CONSTRAINT FK_390BCDDD9D86650F FOREIGN KEY (user_id_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE user_by_role ADD CONSTRAINT FK_390BCDDD88987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398B6E2084E');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F46DE18E50B');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F46FCDAEAAA');
        $this->addSql('ALTER TABLE product_detail DROP FOREIGN KEY FK_4C7A3E37DE18E50B');
        $this->addSql('ALTER TABLE product_detail DROP FOREIGN KEY FK_4C7A3E379777D11E');
        $this->addSql('ALTER TABLE product_detail DROP FOREIGN KEY FK_4C7A3E37E22F468B');
        $this->addSql('ALTER TABLE user_by_role DROP FOREIGN KEY FK_390BCDDD9D86650F');
        $this->addSql('ALTER TABLE user_by_role DROP FOREIGN KEY FK_390BCDDD88987678');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_detail');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_detail');
        $this->addSql('DROP TABLE product_type');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user_by_role');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
