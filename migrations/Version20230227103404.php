<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227103404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blocklist (id INT AUTO_INCREMENT NOT NULL, user_sender_fk_id INT NOT NULL, user_recipient_fk_id INT NOT NULL, INDEX IDX_6B2828D83A9E0C4A (user_sender_fk_id), INDEX IDX_6B2828D8E386AEE4 (user_recipient_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, type_event_fk_id INT NOT NULL, story_fk_id INT DEFAULT NULL, city_fk_id INT NOT NULL, title VARCHAR(255) NOT NULL, date DATETIME NOT NULL, photo VARCHAR(255) NOT NULL, private_event_status TINYINT(1) NOT NULL, pro_status TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, description VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, max_participants INT NOT NULL, required_validation TINYINT(1) NOT NULL, INDEX IDX_3BAE0AA7AF757F6D (type_event_fk_id), INDEX IDX_3BAE0AA77937B973 (story_fk_id), INDEX IDX_3BAE0AA7E6FDBE87 (city_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_tag (event_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_1246725071F7E88B (event_id), INDEX IDX_12467250BAD26311 (tag_id), PRIMARY KEY(event_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE follow (id INT AUTO_INCREMENT NOT NULL, user_sender_fk_id INT NOT NULL, user_recipient_fk_id INT NOT NULL, INDEX IDX_683444703A9E0C4A (user_sender_fk_id), INDEX IDX_68344470E386AEE4 (user_recipient_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_messaging (id INT AUTO_INCREMENT NOT NULL, user_sender_fk_id INT NOT NULL, event_recipient_fk_id INT NOT NULL, date DATETIME NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_2EA6E6803A9E0C4A (user_sender_fk_id), INDEX IDX_2EA6E6803889A65B (event_recipient_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_message (id INT AUTO_INCREMENT NOT NULL, user_sender_fk_id INT NOT NULL, user_recipient_fk_id INT NOT NULL, date DATETIME NOT NULL, content VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_4744FC9B3A9E0C4A (user_sender_fk_id), INDEX IDX_4744FC9BE386AEE4 (user_recipient_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reaction (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reward (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, pro_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE story (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, media VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, pro_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url_badge VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, user_city_fk_id INT NOT NULL, user_settings_fk_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, age INT NOT NULL, bio VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, online_status TINYINT(1) NOT NULL, pro_status TINYINT(1) NOT NULL, level INT NOT NULL, return_api_value VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649419A786B (user_city_fk_id), UNIQUE INDEX UNIQ_8D93D649762B80C0 (user_settings_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_tag (user_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_E89FD608A76ED395 (user_id), INDEX IDX_E89FD608BAD26311 (tag_id), PRIMARY KEY(user_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user_notification (user_id INT NOT NULL, user_notification_id INT NOT NULL, INDEX IDX_C787B1E3A76ED395 (user_id), INDEX IDX_C787B1E3FDC6F10B (user_notification_id), PRIMARY KEY(user_id, user_notification_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_reward (user_id INT NOT NULL, reward_id INT NOT NULL, INDEX IDX_2B83696EA76ED395 (user_id), INDEX IDX_2B83696EE466ACA1 (reward_id), PRIMARY KEY(user_id, reward_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_event (id INT AUTO_INCREMENT NOT NULL, reaction_fk_id INT DEFAULT NULL, role_fk_id INT NOT NULL, user_fk_id INT NOT NULL, event_id INT NOT NULL, participe_is_valid TINYINT(1) NOT NULL, bookmark TINYINT(1) NOT NULL, invite TINYINT(1) NOT NULL, invite_date DATETIME NOT NULL, alert TINYINT(1) NOT NULL, INDEX IDX_D96CF1FFF00A7461 (reaction_fk_id), INDEX IDX_D96CF1FF52ABF1FF (role_fk_id), INDEX IDX_D96CF1FF47B5E288 (user_fk_id), INDEX IDX_D96CF1FF71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_notification (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_settings (id INT AUTO_INCREMENT NOT NULL, mail_notif TINYINT(1) NOT NULL, sms_notif TINYINT(1) NOT NULL, invisible_status TINYINT(1) NOT NULL, blocklist_notif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE word_filter (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blocklist ADD CONSTRAINT FK_6B2828D83A9E0C4A FOREIGN KEY (user_sender_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE blocklist ADD CONSTRAINT FK_6B2828D8E386AEE4 FOREIGN KEY (user_recipient_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7AF757F6D FOREIGN KEY (type_event_fk_id) REFERENCES type_event (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA77937B973 FOREIGN KEY (story_fk_id) REFERENCES story (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7E6FDBE87 FOREIGN KEY (city_fk_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE event_tag ADD CONSTRAINT FK_1246725071F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_tag ADD CONSTRAINT FK_12467250BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_683444703A9E0C4A FOREIGN KEY (user_sender_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470E386AEE4 FOREIGN KEY (user_recipient_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE group_messaging ADD CONSTRAINT FK_2EA6E6803A9E0C4A FOREIGN KEY (user_sender_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE group_messaging ADD CONSTRAINT FK_2EA6E6803889A65B FOREIGN KEY (event_recipient_fk_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE private_message ADD CONSTRAINT FK_4744FC9B3A9E0C4A FOREIGN KEY (user_sender_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE private_message ADD CONSTRAINT FK_4744FC9BE386AEE4 FOREIGN KEY (user_recipient_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649419A786B FOREIGN KEY (user_city_fk_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649762B80C0 FOREIGN KEY (user_settings_fk_id) REFERENCES user_settings (id)');
        $this->addSql('ALTER TABLE user_tag ADD CONSTRAINT FK_E89FD608A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_tag ADD CONSTRAINT FK_E89FD608BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user_notification ADD CONSTRAINT FK_C787B1E3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user_notification ADD CONSTRAINT FK_C787B1E3FDC6F10B FOREIGN KEY (user_notification_id) REFERENCES user_notification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reward ADD CONSTRAINT FK_2B83696EA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reward ADD CONSTRAINT FK_2B83696EE466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FFF00A7461 FOREIGN KEY (reaction_fk_id) REFERENCES reaction (id)');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FF52ABF1FF FOREIGN KEY (role_fk_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FF47B5E288 FOREIGN KEY (user_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FF71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blocklist DROP FOREIGN KEY FK_6B2828D83A9E0C4A');
        $this->addSql('ALTER TABLE blocklist DROP FOREIGN KEY FK_6B2828D8E386AEE4');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7AF757F6D');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA77937B973');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7E6FDBE87');
        $this->addSql('ALTER TABLE event_tag DROP FOREIGN KEY FK_1246725071F7E88B');
        $this->addSql('ALTER TABLE event_tag DROP FOREIGN KEY FK_12467250BAD26311');
        $this->addSql('ALTER TABLE follow DROP FOREIGN KEY FK_683444703A9E0C4A');
        $this->addSql('ALTER TABLE follow DROP FOREIGN KEY FK_68344470E386AEE4');
        $this->addSql('ALTER TABLE group_messaging DROP FOREIGN KEY FK_2EA6E6803A9E0C4A');
        $this->addSql('ALTER TABLE group_messaging DROP FOREIGN KEY FK_2EA6E6803889A65B');
        $this->addSql('ALTER TABLE private_message DROP FOREIGN KEY FK_4744FC9B3A9E0C4A');
        $this->addSql('ALTER TABLE private_message DROP FOREIGN KEY FK_4744FC9BE386AEE4');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649419A786B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649762B80C0');
        $this->addSql('ALTER TABLE user_tag DROP FOREIGN KEY FK_E89FD608A76ED395');
        $this->addSql('ALTER TABLE user_tag DROP FOREIGN KEY FK_E89FD608BAD26311');
        $this->addSql('ALTER TABLE user_user_notification DROP FOREIGN KEY FK_C787B1E3A76ED395');
        $this->addSql('ALTER TABLE user_user_notification DROP FOREIGN KEY FK_C787B1E3FDC6F10B');
        $this->addSql('ALTER TABLE user_reward DROP FOREIGN KEY FK_2B83696EA76ED395');
        $this->addSql('ALTER TABLE user_reward DROP FOREIGN KEY FK_2B83696EE466ACA1');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FFF00A7461');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FF52ABF1FF');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FF47B5E288');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FF71F7E88B');
        $this->addSql('DROP TABLE blocklist');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_tag');
        $this->addSql('DROP TABLE follow');
        $this->addSql('DROP TABLE group_messaging');
        $this->addSql('DROP TABLE private_message');
        $this->addSql('DROP TABLE reaction');
        $this->addSql('DROP TABLE reward');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE story');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE type_event');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_tag');
        $this->addSql('DROP TABLE user_user_notification');
        $this->addSql('DROP TABLE user_reward');
        $this->addSql('DROP TABLE user_event');
        $this->addSql('DROP TABLE user_notification');
        $this->addSql('DROP TABLE user_settings');
        $this->addSql('DROP TABLE word_filter');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
