<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928045602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, address VARCHAR(95) NOT NULL, apt_suite VARCHAR(10) DEFAULT NULL, city VARCHAR(35) NOT NULL, state VARCHAR(2) NOT NULL, zip_code INT NOT NULL, country VARCHAR(74) NOT NULL, address_type VARCHAR(8) NOT NULL, primary_address TINYINT(1) NOT NULL, INDEX IDX_D4E6F819395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, order_details_id INT NOT NULL, cart_name VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_BA388B78C0FA77 (order_details_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, dob DATE NOT NULL, gender VARCHAR(1) NOT NULL, primary_address INT DEFAULT NULL, primary_phone INT DEFAULT NULL, primary_email INT DEFAULT NULL, primary_payment INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, email VARCHAR(254) NOT NULL, email_type VARCHAR(10) NOT NULL, primary_email TINYINT(1) NOT NULL, INDEX IDX_E7927C749395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, payment_id INT NOT NULL, customer_id INT NOT NULL, payment_date DATE DEFAULT NULL, order_date DATE NOT NULL, ship_date DATE DEFAULT NULL, ship_method VARCHAR(30) NOT NULL, fullfillment_date DATE DEFAULT NULL, cancellation_date DATE DEFAULT NULL, return_date DATE DEFAULT NULL, INDEX IDX_845CA2C14C3A3BB (payment_id), INDEX IDX_845CA2C19395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, cc_number VARCHAR(16) NOT NULL, cc_type VARCHAR(20) NOT NULL, cc_name_different VARCHAR(100) DEFAULT NULL, cc_exp_month INT NOT NULL, cc_exp_year INT NOT NULL, cc_sec_code INT NOT NULL, primary_payment TINYINT(1) NOT NULL, INDEX IDX_6D28840D9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, country_code VARCHAR(3) NOT NULL, area_code VARCHAR(4) NOT NULL, phone_number VARCHAR(15) NOT NULL, extention VARCHAR(5) DEFAULT NULL, phone_type VARCHAR(8) NOT NULL, primary_phone TINYINT(1) NOT NULL, INDEX IDX_444F97DD9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_catalog (id INT AUTO_INCREMENT NOT NULL, product_name VARCHAR(50) NOT NULL, vendor_id INT NOT NULL, manufacturer_id VARCHAR(10) NOT NULL, color_id INT DEFAULT NULL, size_id INT DEFAULT NULL, unit_id INT DEFAULT NULL, price_per_unit INT DEFAULT NULL, weight_per_unit INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_catalog_cart (id INT AUTO_INCREMENT NOT NULL, cart_id INT NOT NULL, product_catalog_id INT NOT NULL, quantity INT NOT NULL, discount INT DEFAULT NULL, INDEX IDX_F3B21AAA1AD5CDBF (cart_id), INDEX IDX_F3B21AAA5F5B39D7 (product_catalog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F819395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B78C0FA77 FOREIGN KEY (order_details_id) REFERENCES order_details (id)');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C749395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C14C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C19395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE product_catalog_cart ADD CONSTRAINT FK_F3B21AAA1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE product_catalog_cart ADD CONSTRAINT FK_F3B21AAA5F5B39D7 FOREIGN KEY (product_catalog_id) REFERENCES product_catalog (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_catalog_cart DROP FOREIGN KEY FK_F3B21AAA1AD5CDBF');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F819395C3F3');
        $this->addSql('ALTER TABLE email DROP FOREIGN KEY FK_E7927C749395C3F3');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C19395C3F3');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D9395C3F3');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD9395C3F3');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B78C0FA77');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C14C3A3BB');
        $this->addSql('ALTER TABLE product_catalog_cart DROP FOREIGN KEY FK_F3B21AAA5F5B39D7');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE product_catalog');
        $this->addSql('DROP TABLE product_catalog_cart');
    }
}
