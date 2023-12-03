<?php

namespace App\Containers\Conversation\Http\Controllers;

use App\Abstractions\Http\ResourceController;
use App\Abstractions\Serializer\DataArraySerializer;
use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Transformers\ConversationTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use League\Fractal\Serializer\ArraySerializer;

/**
 *
 */
class ConversationController extends ResourceController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $conversations = Conversation::query()
            ->whereHas('members', function (Builder $query) {
                $query->where('user_id', \Auth::id());
            })
            ->filter($this->getFilters($request));

        $conversations = $request->boolean('paginate', true)
            ? $conversations->paginate($request->input('per_page', 10))
            : $conversations->get();


        return fractal($conversations)
            ->withResourceName('data')
            ->parseIncludes($this->getIncludes($request))
            ->serializeWith(DataArraySerializer::class)
            ->transformWith(new ConversationTransformer())
            ->respond();
    }
}
