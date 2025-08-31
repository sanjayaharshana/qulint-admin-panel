<?php

namespace Qulint\Admin\Traits;

use Carbon\Carbon;

trait DefaultDatetimeFormat
{
    protected function serializeDate(\DateTimeInterface $date)
    {
        // Laravel 7+ uses Carbon's default format
        return $date->format(Carbon::DEFAULT_TO_STRING_FORMAT);
    }
}
