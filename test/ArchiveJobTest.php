<?php
require "../database.php";

require "../function.php";

use PHPUnit\Framework\TestCase;

class ArchivejobTest extends \PHPUnit\Framework\TestCase {

    // set up a mock PDO object for testing
    private $pdo;

    public function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
    }

    public function testArchiveJob()
    {
        // set up mock statement and execute method
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
            ->method('execute')
            ->with(['id' => 1]);
        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with('UPDATE job SET status = 0 WHERE id = :id')
            ->willReturn($stmt);

        // set up a mock $_POST array
        $_POST = ['job' => 1, 'submit' => 'Archive'];

        // include the script for testing
        require 'path/to/script.php';

        // check that the job with id 1 was updated to have a status of 0
        $this->assertEquals(0, getJobStatus($this->pdo, 1));
    }

    private function getJobStatus(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare('SELECT status FROM job WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn();
    }
}
