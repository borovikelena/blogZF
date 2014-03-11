<?php
namespace Blog\Entity;
 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
	/**
  	* @var int
  	* @ORM\Id
  	* @ORM\Column(type="integer")
  	* @ORM\GeneratedValue(strategy="AUTO")
  	*/
    protected $id;
    /**
  	* @var string
  	* @ORM\Column(type="string", length=255, nullable=false)
  	*/
    protected $author;
    /**
  	* @var string
  	* @ORM\Column(type="string", length=255, nullable=false)
  	*/
    protected $title;

    /** @ORM\Column(type="text") */
    protected $content;
     /**
  	* @var string
  	* @ORM\Column(type="string", nullable=true)
  	*/
    protected $date;

     /** @ORM\Column(type="text") */
    protected $description;

 	/**
  	* Get id.
  	*
  	* @return int
  	*/
  public function getId() {
		  return (int)$this->id;
	}

	public function setId($id) {
		$this->id = (int) $id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getContent() {
		return $this->content;
	}
	
	public function setContent($content) {
		$this->content = $content;
	}

  public function getDescription() {
    return $this->description;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

	public function getAuthor() {
		return $this->author;
	}
	
	public function setAuthor($author) {
		$this->author = $author;
	}

	public function getDate() {
		return $this->date;
	}
	
	public function setDate($date) {
		$this->date = $date;
	}

	/**
* Helper function.
*/
    public function exchangeArray($data)
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
    }

    /**
* Helper function
*/
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}