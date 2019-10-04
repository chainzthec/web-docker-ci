<?php

use PHPUnit\Framework\TestCase;
use Core\Resources\Database;
use Main\Models\User;
use Main\Models\Article;

class Queries extends TestCase
{
    public function testInsertUser()
    {
        $db = new Database("mysql", "blog_io", "utf8", "root", "mysql");
        $user = new User();
        $db->execute("
        CREATE TABLE `user` (
            `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
            `first_name` varchar(50) NOT NULL,
            `last_name` varchar(50) NOT NULL,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `level` int(2) NOT NULL DEFAULT '1'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ", null);
        $user->createUser($db, 'Frederic', 'Sananes', 'fsananes@test.com', sha1('1234'));
        $response = $db->query("SELECT * FROM user", null);
        $this->assertEquals(1, $response[0]['level']);
        $this->assertEquals("Frederic", $response[0]['first_name']);
        $this->assertEquals("Sananes", $response[0]['last_name']);
        $this->assertEquals("fsananes@test.com", $response[0]['email']);
        $this->assertEquals(sha1("1234"), $response[0]['password']);
        $this->assertEquals('1', $response[0]['level']);
    }

    public function testVerifyEmail(){
        $user = new User();
        $this->assertTrue($user->verifyEmail("test@test.com"));
        $this->assertFalse($user->verifyEmail("test@testcom"));
    }

    public function testInsertArticle(){
        $db = new Database("mysql", "blog_io", "utf8", "root", "mysql");
        $article = new Article();
        $db->execute("CREATE TABLE `article` (
        `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `content` longtext NOT NULL,
         `id_u` int(11) NOT NULL
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;", null);
        $article->createArticle($db,"test article","ceci est un test pour un article", 18);
        $response = $db->query("SELECT * FROM article", null);
        $this->assertEquals("test article", $response[0]['name']);
        $this->assertEquals("ceci est un test pour un article", $response[0]['content']);
        $this->assertEquals("18", $response[0]['id_u']);
    }

  /*  public function testGetArticle(){
        $db = new Database("mysql", "blog_io", "utf8", "root", "mysql");
        $article = new Article();
        $response = $article->getArticle($db,1);
        $this->assertEquals("test article", $response[0]['name']);
        $this->assertEquals("ceci est un test pour un article", $response[0]['content']);
        $this->assertEquals("18", $response[0]['id_u']);
    }*/
    public function testUpdateArticle(){
        $db = new Database("mysql", "blog_io", "utf8", "root", "mysql");
        $article = new Article();
        $article->updateArticle($db,1,['name' => "changement test", 'content' => "contenu changement"]);
        $response = $db->query("SELECT * FROM article", null);
        $this->assertEquals("changement test", $response[0]['name']);
        $this->assertEquals("contenu changement", $response[0]['content']);
        $this->assertEquals("18", $response[0]['id_u']);
    }

}
