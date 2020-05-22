<?php

namespace App\Repository;

use Symfony\Component\HttpClient\HttpClient;

class BeerRepository 
{
	private $client;
	private $response;
	private const API_BEER_RESOURCE_URL = "https://api.punkapi.com/v2/beers/";

	private function executeRequest(string $url, array $filters = [])
	{
		$this->client = HttpClient::create();
		$this->response = $this->client->request('GET', $url,[
			'query' => $filters,
		]);
	}

	private function getResponse()  : Array
	{
		return $this->response->toArray();
	}

	public function get(array $fields = [], array $filters = []) : Array
	{
		$this->executeRequest(self::API_BEER_RESOURCE_URL, $filters);
		return $this->getProcessedResponse($fields);
	}

	public function getByPk(int $beer_id, array $fields = []) : Array
	{
		// TODO: make method for build URL
		$this->executeRequest(self::API_BEER_RESOURCE_URL . $beer_id);
		return $this->getProcessedResponse($fields)[0];// ins´t a list is a single json object
	}

	private function getProcessedResponse($fields) : Array
	{
		$processed_response = [];
		$response = $this->getResponse();

		if (count($fields) == 0)
			return $response;

		foreach ($response as $beer) {
			// array_flip convert key on values and values on key
			// array_intersect_key return an array wich the keys exist on all arrays
			$processed_response[] = array_intersect_key($beer, array_flip($fields));
		}

		return $processed_response;
	}
}