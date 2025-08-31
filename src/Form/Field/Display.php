<?php

namespace Qulint\\Admin\Form\Field;

use Qulint\\Admin\Form\Field;

class Display extends Field
{
    public function prepare($value)
    {
        return $this->original();
    }
}
