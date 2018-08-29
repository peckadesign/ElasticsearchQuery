<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class FunctionScore
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\FunctionCollection
	 */
	private $function;


	public function __construct(
		?\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\FunctionCollection $function = NULL
	)
	{
		$this->function = $function ?: new \Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\FunctionCollection();
	}


	public function toArray(array $queryPart): array
	{
		$functions = [];
		foreach ($this->function() as $function) {
			$functions[] = $function->toArray();
		}

		$array = [
			'function_score' => [
				'query' => $queryPart,
				'functions' => $functions,
			],
		];

		return $array;
	}


	public function function(): \Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\FunctionCollection
	{
		return $this->function;
	}

}
