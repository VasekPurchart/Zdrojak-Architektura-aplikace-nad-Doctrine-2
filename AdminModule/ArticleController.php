<?php

class ArticleController {

	/** @var Doctrine\ORM\EntityManager */
	private $entityManager;

	/** @var int */
	private $topArticlesCount;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager, $topArticlesCount) {
		// mapování do private proměnných
	}

	private function getTopArticles() {
		return $this->entityManager->getRepository('Article')->findTopArticles($this->topArticlesCount);
	}

	private function publish($id) {
		$article = $this->entityManager->find('Article', $id);
		$article->setPublished(new DateTime());
		$this->entityManager->flush();
	}

	// další obslužné metody

}