<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document;


class Alias
{

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int|null
	 */
	private $timestamp;

	/**
	 * @var int|null
	 */
	private $web;


	public function __construct(
		string $name,
		?int $web = NULL,
		?int $timestamp = NULL
	)
	{
		if (\strpos($name, '_')) {
			$exploded = \explode('_', $name);
			$timestamp = (int) \array_pop($exploded);
			$web = (int) \array_pop($exploded);
			$name = \implode('_', $exploded);
		}
		if ( ! $timestamp) {
			$timestamp = \time();
		}
		$this->name = $name;
		$this->timestamp = $timestamp;
		$this->web = $web;
	}


	public function getIndex(): string
	{
		return $this->name . '_' . $this->web . '_' . $this->timestamp;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function getTimestamp(): ?int
	{
		return $this->timestamp;
	}


	public function getWeb(): ?int
	{
		return $this->web;
	}

}
