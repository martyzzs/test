<?php
/**
 * Created by PhpStorm.
 * User: Mārtiņš Frīdenbergs
 * Date: 29/01/2018
 * Time: 00:59
 */

namespace App\Controller;


use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController {

	/**
	 * @Route("/" , name="start_page")
	 */

	public function start_page(Request $request){
		$name = $request->get('name');
		$test = $request->get('test');
		$answers = [
	        '{"answer":"Atbilde 1", "type":"correct"}',
			'{"answer":"Atbilde 2", "type":""}',
			'{"answer":"Atbilde 3", "type":""}',
			'{"answer":"Atbilde 4", "type":""}',
		];

		if($name & $test) {
			return $this->render( 'test/test-questions.html.twig', [
				'name' => $name,
				'test' => $test,
				'answers' => $answers,
			] );
		}


		return $this->render('test/test-start.html.twig ');
	}

	/**
	 * @Route("/{slug}/start_test", name = "start_test", methods={"POST"})
	 */

	public function start_test($slug, Request $request) {

		$name = $request->get('name');
		$test = $request->get('test');
		$questionNo = $request->get('questionNo');

		$answers = [
			["answer" => "Atbilde 1", "type" => "correct"],
			["answer" => "Atbilde 2", "type" => ""],
			["answer" => "Atbilde 3", "type" => ""],
			["answer" => "Atbilde 4", "type" => ""],
		];
		$questions = [0 => "Testa jautājums 1?", 1 => "Testa Jautājums 2"];

		if($name && $test && $questionNo < count($questions)) {
			$testPage = $this->render( 'test/test-questions.html.twig', [
				'name' => $name,
				'test' => $test,
				'answers' => $answers,
				'question' => $questions[$questionNo],
				'questionNo' => intval($questionNo)+1,
			] );

			$response = new JsonResponse([
				'status' => 'success',
				'name' => $name,
				'test' => $test,
				'question' => $questions[1],
				'content' => $testPage->getContent(),
				]);
		}
		else {
			$response = new JsonResponse([
				'status' => '' ]);
		}

		return $response;
	}

}