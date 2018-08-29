<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class Highlight
{
	/**
	 * @var array
	 */
	private $preTags;

	/**
	 * @var array
	 */
	private $postTags;

	/**
	 * @var array
	 */
	private $fields;


	public function __construct(
		array $preTags,
		array $postTags,
		array $fields
	)
	{
		$this->preTags = $preTags;
		$this->postTags = $postTags;
		$this->fields = $fields;
	}


	public function toArray() : array
	{
		$array = [
			'pre_tags' => $this->preTags,
			'post_tags' => $this->postTags,
		];

		foreach ($this->fields as $key) {
			$array['fields'][$key] = ['number_of_fragments' => 0];
		}

		return $array;
	}

}
