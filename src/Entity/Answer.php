<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\UserAnswer", inversedBy="answers")
     */
    private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="answers")
	 */
	private $question;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $answer;

	/**
	 * @ORM\Column(type="boolean")
	 */
	private $isCorrect;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\UserAnswer", mappedBy="userAnswer")
	 */
	private $uAnswers;

	public function __construct() {
		$this->uAnswers = new ArrayCollection();
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
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * @param mixed $question
	 */
	public function setQuestion( $question ) {
		$this->question = $question;
	}

	/**
	 * @return mixed
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * @param mixed $answer
	 */
	public function setAnswer( $answer ) {
		$this->answer = $answer;
	}

	/**
	 * @return mixed
	 */
	public function getIsCorrect() {
		return $this->isCorrect;
	}

	/**
	 * @param mixed $isCorrect
	 */
	public function setIsCorrect( $isCorrect ) {
		$this->isCorrect = $isCorrect;
	}

}
