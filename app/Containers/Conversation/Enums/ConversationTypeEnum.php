<?php

namespace App\Containers\Conversation\Enums;

enum ConversationTypeEnum: string
{
    case PRIVATE = 'private';
    
    case GROUP = 'group';
}
