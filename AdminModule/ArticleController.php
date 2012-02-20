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
		return $this->entityManager->createQueryBuilder()
			->select('a')
			->from('Article', 'a')
			->where('a.status = ?1')
			->orderBy('a.viewCount DESC')
			->setMaxResults($this->topArticlesCount)
			->getQuery()
			->setParameter(1, Article::STATUS_PUBLISHED)
			->getResult();
	}

	private function publish($id) {
		$article = $this->entityManager->find('Article', $id);
		$article->setPublishDate(new DateTime());
		$article->setStatus(Article::STATUS_PUBLISHED);
		$this->entityManager->flush();
	}

	// další obslužné metody

}