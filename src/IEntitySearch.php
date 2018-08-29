<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model;


interface IEntitySearch
{

	public function identificationSearch(
		string $query,
		array $options
	): \Pd\ElasticSearchModule\Model\ElasticQuery;


	public function contentSearch(
		string $query,
		array $options
	): \Pd\ElasticSearchModule\Model\ElasticQuery;


	public function searchAdmin(
		string $query,
		array $options
	): \Pd\ElasticSearchModule\Model\ElasticQuery;

}
