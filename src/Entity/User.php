<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * Many Users have Many Groups.
	 * @ORM\ManyToMany(targetEntity="App\Entity\Question")
	 * @ORM\JoinTable(name="users_question",
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="question_id", referencedColumnName="id")}
	 *      )
	 */
	private $questions;

	/**
	 * @ORM\Column(type="string", length=30)
	 */
    private $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\UserAnswer", mappedBy="user")
	 */
	private $userAnswers;

	public function __construct() {
		$this->userAnswers = new ArrayCollection();
		$this->questions = new ArrayCollection();
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
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param Question $question
	 */
	public function addQuestion(Question $question) {
		if ( $this->questions->contains( $question ) ) {
			return;
		}
		$this->questions[] = $question;
	}

	/**
	 * @return mixed
	 */
	public function getQuestions() {
		return $this->questions;
	}

	/**
	 * @return mixed
	 */
	public function getUserAnswers() {
		return $this->userAnswers;
	}

}
