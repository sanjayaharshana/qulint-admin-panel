<?php

namespace Qulint\Admin\Grid\Selectable;

use Qulint\Admin\Grid\Displayers\AbstractDisplayer;

class Checkbox extends AbstractDisplayer
{
    public function display($key = '')
    {
        $value = $this->getAttribute($key);

        return <<<HTML
<input type="checkbox" name="item" class="form-check-input" value="{$value}"/>
HTML;
    }
}
