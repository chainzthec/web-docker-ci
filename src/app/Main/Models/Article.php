<?php


namespace Main\Models;


class Article
{
    public function getArticle($db, $id)
    {
        return $db->query("SELECT * FROM article WHERE id = ?", [$id]);
    }

    public function createArticle($db, $name, $content, $id)
    {
        $db->execute("INSERT INTO article (name,content,id_u) VALUES (?,?,?)", [$name, $content, $id]);
    }

    public function readArticle($db)
    {
        return $db->query("SELECT a.id, a.name, a.content, u.first_name, u.last_name  FROM article a, user u WHERE a.id_u = u.id ORDER BY a.id DESC", null);
    }

    public function updateArticle($db, $id, $values)
    {
        $name = $values['name'];
        $content = $values['content'];
        $db->execute("UPDATE article SET content = ? WHERE id = ?", [$content, $id]);
        $db->execute("UPDATE article SET name = ? WHERE id = ?", [$name, $id]);
    }

    public function deleteArticle($db, $id)
    {
        $db->execute("DELETE FROM article WHERE id = ?", [$id]);
    }
}