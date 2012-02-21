<?php

class ArticleController {

	/** @var Doctrine\ORM\EntityManager */
	private $entityManager;

	/** @var ArticleService */
	private $articleService;

	/** @var int */
	private $topArticlesCount;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager, ArticleService $articleService, $topArticlesCount) {
		// mapování do private proměnných
	}

	private function getTopArticles() {
		$now = new DateTime();
		$lastMonthArticles = $this->entityManager->getRepository('Article')->findArticlesSince($now->sub(new DateInterval('P1M')));
		return $this->articleService->getTopArticlesByMagic($lastMonthArticles, $this->topArticlesCount);
	}

	private function publish($id) {
		$article = $this->entityManager->find('Article', $id);
		$article->setPublished(new DateTime());
		$this->entityManager->flush();
	}

	// další obslužné metody

}