<?php

class ArticleFacade {

	/** @var Doctrine\ORM\EntityManager */
	private $entityManager;

	/** @var ArticleService */
	private $articleService;

	public function __construct(\Doctrine\ORM\EntityManager $entityManager, ArticleService $articleService) {
		// mapování do private proměnných
	}

	public function getTopArticles(DateTime $since, $maxResults) {
		$lastMonthArticles = $this->entityManager->getRepository('Article')->findArticlesSince($since);
		return $this->articleService->getTopArticlesByMagic($lastMonthArticles, $maxResults);
	}

	public function publish($id, DateTime $date) {
		$article = $this->entityManager->find('Article', $id);
		$article->setPublished($date);
		$this->entityManager->flush();
	}

}

