<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model;


class Document
{

	/**
	 * @var string|null
	 */
	private $index;

	/**
	 * @var null|int
	 */
	private $id;

	/**
	 * @var null|\Pd\ElasticSearchModule\Model\Document\IBody
	 */
	private $body;

	/**
	 * @var null|string
	 */
	private $type;

	/**
	 * @var array|null
	 */
	private $options;


	public function __construct(
		?string $index,
		?\Pd\ElasticSearchModule\Model\Document\IBody $body = NULL,
		?string $type = NULL,
		?int $id = NULL,
		?array $options = NULL
	)
	{
		$this->index = $index;
		$this->body = $body;
		$this->type = $type;
		$this->id = $id;
		$this->options = $options;
	}


	public function toArray(): array
	{
		$array = [];

		if ($this->index) {
			$array['index'] = $this->index;
		}
		if ($this->type) {
			$array['type'] = $this->type;
		}
		if ($this->body) {
			$array['body'] = $this->body->toArray();
		}
		if ($this->id) {
			$array['id'] = (string) $this->id;
		}
		if ($this->options) {
			$array = \array_merge($array, $this->options);
		}

		return $array;
	}

}
