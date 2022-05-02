<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502052107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, total_price BIGINT NOT NULL, total_quantity INT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_BA388B7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_item (id INT AUTO_INCREMENT NOT NULL, cart_id INT NOT NULL, product_item_id INT DEFAULT NULL, unit_price INT NOT NULL, total_price INT NOT NULL, quantity INT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_F0FE25271AD5CDBF (cart_id), INDEX IDX_F0FE2527C3B649EE (product_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discount (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, percent_value INT NOT NULL, amount_value INT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, available_start_date DATETIME NOT NULL, available_end_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, path VARCHAR(255) NOT NULL, type VARCHAR(25) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_472B783A4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, purchase_order_id INT NOT NULL, product_item_id INT NOT NULL, unit_price INT NOT NULL, total_price BIGINT NOT NULL, quantity INT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_52EA1F09A45D7E6A (purchase_order_id), UNIQUE INDEX UNIQ_52EA1F09C3B649EE (product_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, purchase_order_id INT NOT NULL, amount BIGINT NOT NULL, transaction_id VARCHAR(255) NOT NULL, currency_code VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_6D28840DA45D7E6A (purchase_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, unit_price BIGINT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_item (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, color_id INT DEFAULT NULL, size_id INT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, delete_at DATETIME NOT NULL, quantity INT NOT NULL, INDEX IDX_92F307BF4584665A (product_id), INDEX IDX_92F307BF7ADA1FB5 (color_id), INDEX IDX_92F307BF498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_order (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, cancel_by_id INT DEFAULT NULL, discount_id INT DEFAULT NULL, recipient_name VARCHAR(150) NOT NULL, recipient_email VARCHAR(255) NOT NULL, recipient_phone_number VARCHAR(11) NOT NULL, address_delivery VARCHAR(255) NOT NULL, total_quantity INT NOT NULL, total_price BIGINT NOT NULL, status INT NOT NULL, reason_cancel VARCHAR(255) DEFAULT NULL, title_cancel VARCHAR(25) DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, amount_discount INT DEFAULT NULL, INDEX IDX_21E210B2A76ED395 (user_id), INDEX IDX_21E210B25A835DB8 (cancel_by_id), INDEX IDX_21E210B24C7C611F (discount_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, delete_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(150) NOT NULL, phone_number VARCHAR(11) NOT NULL, address VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, delete_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart_item ADD CONSTRAINT FK_F0FE25271AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE cart_item ADD CONSTRAINT FK_F0FE2527C3B649EE FOREIGN KEY (product_item_id) REFERENCES product_item (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09A45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_order (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09C3B649EE FOREIGN KEY (product_item_id) REFERENCES product_item (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DA45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_order (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_item ADD CONSTRAINT FK_92F307BF4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_item ADD CONSTRAINT FK_92F307BF7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE product_item ADD CONSTRAINT FK_92F307BF498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE purchase_order ADD CONSTRAINT FK_21E210B2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase_order ADD CONSTRAINT FK_21E210B25A835DB8 FOREIGN KEY (cancel_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase_order ADD CONSTRAINT FK_21E210B24C7C611F FOREIGN KEY (discount_id) REFERENCES discount (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_item DROP FOREIGN KEY FK_F0FE25271AD5CDBF');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product_item DROP FOREIGN KEY FK_92F307BF7ADA1FB5');
        $this->addSql('ALTER TABLE purchase_order DROP FOREIGN KEY FK_21E210B24C7C611F');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A4584665A');
        $this->addSql('ALTER TABLE product_item DROP FOREIGN KEY FK_92F307BF4584665A');
        $this->addSql('ALTER TABLE cart_item DROP FOREIGN KEY FK_F0FE2527C3B649EE');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09C3B649EE');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09A45D7E6A');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DA45D7E6A');
        $this->addSql('ALTER TABLE product_item DROP FOREIGN KEY FK_92F307BF498DA827');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7A76ED395');
        $this->addSql('ALTER TABLE purchase_order DROP FOREIGN KEY FK_21E210B2A76ED395');
        $this->addSql('ALTER TABLE purchase_order DROP FOREIGN KEY FK_21E210B25A835DB8');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_item');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE discount');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_item');
        $this->addSql('DROP TABLE purchase_order');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
