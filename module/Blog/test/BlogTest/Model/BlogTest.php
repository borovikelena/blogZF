<?php

namespace BlogTest\TestModel;
 
use Blog\Entity\Article;
use PHPUnit_Framework_TestCase;
 
class BlogTest extends PHPUnit_Framework_TestCase
{
    public function testArticleInitialState()
    {
        $article = new Article();

        $this->assertNull($article->getAuthor(), '"author" should initially be null');
        $this->assertNull($article->getTitle(), '"title" should initially be null');
        $this->assertNull($article->getContent(), '"content" should initially be null');
        $this->assertNull($article->getDescription(), '"content" should initially be null');
    }
 
    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $article = new Article();
        $data  = array('author' => 'some author',
                       'title'  => 'some title',
                       'content' => 'some content',
                       'description' => 'some description'
                );
 
        $article->exchangeArray($data);
 
        $this->assertSame($data['author'], $article->getAuthor(), '"author" was not set correctly');
        $this->assertSame($data['title'], $article->getTitle(), '"title" was not set correctly');
         $this->assertSame($data['description'], $article->getDescription(), '"description" was not set correctly');
        $this->assertSame($data['content'], $article->getContent(), '"content" was not set correctly');
    }
}