<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="test")
	 */
    private $questions;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
    private $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\UserAnswer", mappedBy="test")
	 */
	private $userTests;

    public function __construct() {
        $this->questions = new ArrayCollection();
        $this->userTests = new ArrayCollection();
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getQuestions() {
		return $this->questions;
	}

	/**
	 * @param mixed $questions
	 */
	public function setQuestions( $questions ) {
		$this->questions = $questions;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}
}
