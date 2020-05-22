<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BeerRepository;

/**
 * @Route("/api/v1")
 */
class BeerController extends AbstractController
{
	private $list_fields = ["id", "name", "description"];

    /**
     * @Route("/beers", name="beer_list", methods={"GET"})
     */
    public function list(BeerRepository $beer_repository, Request $request) : JsonResponse
    {	
    	$filters = $this->getFilters($request);
     	return new JsonResponse($beer_repository->get($this->list_fields, $filters), Response::HTTP_OK);
    }


    // TODO: Make filters can be recovered from dinamic array of filters
    private function getFilters(Request $request) : Array
    {
    	$filters = [];

    	if ($filter_food = $request->query->get("food"))
    		$filters["food"] = str_replace(" ", "_", $filter_food);

    	return $filters;
    }
}