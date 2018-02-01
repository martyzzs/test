<?php
/**
 * Created by PhpStorm.
 * User: Mārtiņš Frīdenbergs
 * Date: 29/01/2018
 * Time: 00:59
 */

namespace App\Controller;


use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Test;
use App\Entity\User;
use App\Entity\UserAnswer;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestPageController extends AbstractController {

	/**
	 * @Route("/" , name="test_page")
	 */

	public function start_page(){

		$repository = $this->getDoctrine()->getRepository(Test::class);

		return $this->render('test/test-start.html.twig ',array('tests' => $repository->findAll()));
	}

	/**
	 * @Route("/start_test", name = "start_test")
	 */

	public function start_test(Request $request) {

		$name = $request->get('name');
		$test = $request->get('test');
		$questionNo = $request->get('questionNo');
		$answer = $request->get('answer');
		$testStage = $request->get('testStage');
		$question_id = $request->get('question');

		$repository = $this->getDoctrine()->getRepository(Question::class);
		$questions = $repository->getQuestions($test);

		$this->createOrUpdateUser($name,$answer, $question_id);

		if($name && $test && $questionNo < count($questions)) {
			$testPage = $this->render( 'test/test-questions.html.twig', [
				'name' => $name,
				'test' => $test,
				'testName' => $this->getDoctrine()->getRepository( Test::class )->findOneBy( [ "id" => $test]),
				'questions' => $questions,
				'questionNo' => intval($questionNo),
			] );

			$response = new JsonResponse([
				'status' => 'success',
				'content' => $testPage->getContent(),
				'answer' => $answer,
				'questionNo' => intval($questionNo),
				]);

		}
		else if($questionNo>= count($questions)){
			$user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["name"=>$name]);
			$answers = $this->getDoctrine()->getRepository(UserAnswer::class)->findBy(["user" => $user->getId(), "test" => $test]);
			$answ = $this->getDoctrine()->getRepository(Answer::class)->findAll();

			$this->createOrUpdateUser($name,$answer, $question_id);

			$testEnd = $this->render('test/test-end.html.twig',[
				'name' => $name,
				'test' => $test,
				'questions' => $questions,
				'answers' => $answers,
				'answ' => $answ,
			]);

			$response = new JsonResponse([
				'status' => 'success',
				'content' => $testEnd->getContent(),
				'answer' => $answer,
			]);

		}

		//Handle errors
		/*name*/
		$errors = [];

		if(!$name){
			$error = [
				'field' => 'name',
				'msg' => "Lūdzu ievadiet savu vārdu",
			];
			array_push($errors,$error);
		}else if(strlen($name) < 3){
			$error = [
				'field' => 'name',
				'msg' => "Vārdam jābūt vismaz 3 simbolus garam.",
			];
			array_push($errors,$error);
		}

		if(!$answer && $testStage == 'questions'){
			$error = [
				'field' => 'answer',
				'msg' => "Lūdzu izvēlieties atbildi",
			];
			array_push($errors,$error);
		}

		if(count($errors)){
			$response = new JsonResponse([
				'status' => 'error',
				'errors' => $errors,
			]);
		}


		return $response;
	}


	private function createOrUpdateUser($name,$answer_id, $question_id = null){
		$em = $this->getDoctrine()->getManager();

		$user = new User();
		$user->setName($name);

		$repository = $this->getDoctrine()->getRepository(User::class);
		$checkUser = $repository->findOneBy(['name' => $name]);

		/*
		 * Principā izlemjot vai dati ir jāatjaunina vai jāveido jauns lietotājs
		 * vajadzētu parbaudīt pēc id nevis vārda, bet tā kā šim projektam nav
		 * sistēmas lietotāju reģistrācijai un pārbaudei vai lietotājs jau ir reģistrēts
		 * limitēju, ka lietotāja vārdam jābūt unikālam, lai par to izveidotu ierakstu.
		 *
		 * Ja būtu kaut kāda reģistrācijas sistēma tad šeit pārbaude jāveic pēc id
		 */

		if(!count($checkUser)){
			$em->persist( $user );
			$em->flush();
		}

		$user = $checkUser;

		if($question_id && $answer_id) {
			$question = $this->getDoctrine()->getRepository( Question::class )->findOneBy( [ "id" => $question_id ] );
			$user->addQuestion( $question );
			$answers = $question->getAnswers();

			//I know this is bad but it's almost 1am and I have to finish this in 11 hrs...
			$updated = false;
			foreach($answers as $answer) {
				$id = $answer->getID();
				$userAnswers = $this->getDoctrine()->getRepository(UserAnswer::class)->findBy([
					"userAnswer" => $id,
					"user" => $user->getId()
				]);
				if(count($userAnswers)) {
					$userAnswers[0]->setUserAnswer( $this->getDoctrine()->getRepository( Answer::class )->findOneBy( [ "id" => $answer_id ] ) );
					$em->flush();
					$updated = true;
				}
			}

			if($answer_id && !$updated){
				$userAnswer = new UserAnswer();
				$userAnswer->setUser($user);
				$userAnswer->setUserAnswer($this->getDoctrine()->getRepository(Answer::class)->findOneBy(["id" => $answer_id]));
				$userAnswer->setTest($this->getDoctrine()->getRepository(Test::class)->findOneBy(["id" => $question->getTest()]));

				$em->persist($userAnswer);
				$em->flush();
			}
		}


		return; $this->render('test/test.html.twig', array('test' => $user));
	}
}