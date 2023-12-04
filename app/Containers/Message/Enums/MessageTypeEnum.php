<?php

namespace App\Containers\Message\Enums;

enum MessageTypeEnum: string
{
    case TEXT = 'text';

    case IMAGE = 'image';

    case VIDEO = 'video';

    case AUDIO = 'audio';

    case DOCUMENT = 'document';

    case LOCATION = 'location';

    case CONTACT = 'contact';
}
