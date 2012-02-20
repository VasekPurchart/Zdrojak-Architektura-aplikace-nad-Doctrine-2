<?php

/**
 * @Entity
 */
class Article {

	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;

	/** @Column(type="integer") */
	private $status;

	/** @Column(type="date") */
	private $publishDate;

	/** @Column(type="integer") */
	private $viewCount;

	// další properties

	public function __construct() {
		$this->status = static::STATUS_DRAFT;
		$this->viewCount = 0;
	}

	public function setPublished(DateTime $date) {
		$this->status = static::STATUS_DRAFT;
		$this->publishDate = $date;
	}

	// další gettery a settery (settery by měly obsahovat validaci vstupů)

}