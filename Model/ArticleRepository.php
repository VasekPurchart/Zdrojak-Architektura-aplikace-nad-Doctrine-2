<?php

class ArticleRepository extends \Doctrine\ORM\EntityRepository {

	public function findTopArticles($maxResultsCount) {
		return $this->getEntityManager()->createQueryBuilder()
			->select('a')
			->from('Article', 'a')
			->where('a.status = ?1')
			->orderBy('a.viewCount DESC')
			->setMaxResults($maxResultsCount)
			->getQuery()
			->setParameter(1, Article::STATUS_PUBLISHED)
			->getResult();
	}

}

