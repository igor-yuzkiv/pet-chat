<?php

namespace App\Abstractions\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 *
 */
abstract class ResourceController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param Request $request
     * @return array
     */
    protected function getIncludes(Request $request): array
    {
        return explode(",", $request->input('includes', ""));
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getFilters(Request $request): array
    {
        $filters = $request->input("filters", []);

        if (!is_array($filters) || empty($filters)) {
            return [];
        }

        return $filters;
    }
}
