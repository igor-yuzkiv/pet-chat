<?php

namespace App\Containers\Message\Http\Controllers;

use App\Abstractions\Http\ResourceController;
use App\Abstractions\Serializer\DataArraySerializer;
use App\Containers\Message\Models\Message;
use App\Containers\Message\Transformers\MessageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class MessagesController extends ResourceController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $messages = Message::query()
            ->orderBy('created_at', 'desc')
            ->filter($this->getFilters($request));

        $conversations = $request->boolean('paginate', true)
            ? $messages->paginate($request->input('per_page', 10))
            : $messages->get();

        return fractal($conversations)
            ->withResourceName('data')
            ->parseIncludes($this->getIncludes($request))
            ->serializeWith(DataArraySerializer::class)
            ->transformWith(new MessageTransformer())
            ->respond();
    }
}
