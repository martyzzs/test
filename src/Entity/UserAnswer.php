<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAnswerRepository")
 */
class UserAnswer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userAnswers")
	 */
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\Answer", inversedBy="uAnswers")
	 */
	private $userAnswer;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\Test", inversedBy="userTests")
	 */
	private $test;

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
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param mixed $user
	 */
	public function setUser( $user ) {
		$this->user = $user;
	}

	/**
	 * @return mixed
	 */
	public function getUserAnswer() {
		return $this->userAnswer;
	}

	/**
	 * @param mixed $userAnswer
	 */
	public function setUserAnswer( $userAnswer ) {
		$this->userAnswer = $userAnswer;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

}
