<?php

class ArticleRepository extends \Doctrine\ORM\EntityRepository {

	public function findArticlesSince(DateTime $date) {
		return $this->getEntityManager()->createQueryBuilder()
			->select('a')
			->from('Article', 'a')
			->where('a.status = ?1 AND a.publishDate > ?2')
			->getQuery()
			->setParameter(1, Article::STATUS_PUBLISHED)
			->setParameter(2, $date)
			->getResult();
	}

	// findTopArticles a další metody ...

}

