<?php

namespace App\Utils;

use Illuminate\Support\Carbon;

/**
 *
 */
class TransformersUtil
{
    /**
     * @param Carbon $carbon
     * @return string
     */
    public static function dateTimeFormatted(Carbon $carbon, string $format = 'd. M. Y h:i'): string
    {
        if ($carbon->diffInHours() >= 24) {
            return $carbon->format("d. M. Y h:i");
        } else {
            return $carbon->diffForHumans();
        }
    }

    /**
     * @param string|null $value
     * @return string
     */
    public static function getInitials(?string $value = null): string
    {
        if (!$value) {
            return '';
        }

        $name = explode(' ', $value);
        $initials = '';
        foreach ($name as $n) {
            $initials .= mb_substr($n, 0, 1);

            if (mb_strlen($initials) == 2) {
                break;
            }
        }
        return $initials;
    }

    /**
     * @param int|null $size
     * @param int $precision
     * @param string $default
     * @return string
     */
    public static function formatBytes(?int $size, int $precision = 2, string $default = ''): string
    {
        if (!$size) {
            return $default;
        }

        if ($size > 0) {
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $default;
        }
    }
}
