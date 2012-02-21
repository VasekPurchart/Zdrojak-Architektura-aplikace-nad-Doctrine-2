<?php

class ArticleController {

	/** @var ArticleFacade */
	private $articleFacade;

	/** @var int */
	private $topArticlesCount;

	public function __construct(ArticleFacade $articleFacade, $topArticlesCount) {
		// mapování do private proměnných
	}

	private function getTopArticles() {
		$now = new DateTime();
		return $this->articleFacade->getTopArticles($now->sub(new DateInterval('P1M')), $this->topArticlesCount);
	}

	private function publish($id) {
		$this->articleFacade->publish($id, new DateTime());
	}

	// další obslužné metody

}