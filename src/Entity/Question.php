<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Test", inversedBy="questions")
     */

    private $test;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="question")
	 */
	private $answers;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $question;

	public function __construct() {
		$this->answers = new ArrayCollection();
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
	public function getTest() {
		return $this->test;
	}

	/**
	 * @param mixed $test
	 */
	public function setTest( $test ) {
		$this->test = $test;
	}

	/**
	 * @return mixed
	 */
	public function getAnswers() {
		return $this->answers;
	}

	/**
	 * @param mixed $answers
	 */
	public function setAnswers( $answers ) {
		$this->answers = $answers;
	}

	/**
	 * @return mixed
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * @param mixed $question
	 */
	public function setQuestion( $question ) {
		$this->question = $question;
	}

}
