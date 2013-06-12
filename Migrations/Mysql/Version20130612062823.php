<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130612062823 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
			// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer ADD activity VARCHAR(40) DEFAULT NULL, ADD team VARCHAR(40) DEFAULT NULL");
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer ADD CONSTRAINT FK_7E8FF41EAC74095A FOREIGN KEY (activity) REFERENCES scoutrace_scoutrace_domain_model_activity (persistence_object_identifier)");
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer ADD CONSTRAINT FK_7E8FF41EC4E0A61F FOREIGN KEY (team) REFERENCES scoutrace_scoutrace_domain_model_team (persistence_object_identifier)");
		$this->addSql("CREATE INDEX IDX_7E8FF41EAC74095A ON scoutrace_scoutrace_domain_model_answer (activity)");
		$this->addSql("CREATE INDEX IDX_7E8FF41EC4E0A61F ON scoutrace_scoutrace_domain_model_answer (team)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
			// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer DROP FOREIGN KEY FK_7E8FF41EAC74095A");
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer DROP FOREIGN KEY FK_7E8FF41EC4E0A61F");
		$this->addSql("DROP INDEX IDX_7E8FF41EAC74095A ON scoutrace_scoutrace_domain_model_answer");
		$this->addSql("DROP INDEX IDX_7E8FF41EC4E0A61F ON scoutrace_scoutrace_domain_model_answer");
		$this->addSql("ALTER TABLE scoutrace_scoutrace_domain_model_answer DROP activity, DROP team");
	}
}

?>