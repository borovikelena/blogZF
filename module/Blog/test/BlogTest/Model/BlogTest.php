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
        $this->assertNull($article->getId(), '"id" should initially be null');
        $this->assertNull($article->getTitle(), '"title" should initially be null');
        $this->assertNull($article->getContent(), '"content" should initially be null');
    }
 
    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $article = new Article();
        $data  = array('author' => 'some author',
                       'id'     => 123,
                       'title'  => 'some title',
                       'content' => 'some content'
                );
 
        $article->exchangeArray($data);
 
        $this->assertSame($data['author'], $article->getAuthor(), '"author" was not set correctly');
        $this->assertSame($data['id'], $article->getId(), '"id" was not set correctly');
        $this->assertSame($data['title'], $article->getTitle(), '"title" was not set correctly');
    }
 
    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $article = new Article();
 
        $article->exchangeArray(array('author' => 'some author',
                                    'id'     => 123,
                                    'title'  => 'some title',
                                     'content' => 'some content'));
        $article->exchangeArray(array());
 
        $this->assertNull($article->getAuthor(), '"author" should have defaulted to null');
        $this->assertNull($article->getId(), '"id" should have defaulted to null');
        $this->assertNull($article->getTitle(), '"title" should have defaulted to null');
    }
}