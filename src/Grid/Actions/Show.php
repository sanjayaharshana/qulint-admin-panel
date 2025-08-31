<?php

namespace Qulint\Admin\Grid\Actions;

use Qulint\Admin\Actions\RowAction;

class Show extends RowAction
{
    public $icon = 'icon-eye';

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('admin.show');
    }

    /**
     * @return string
     */
    public function href()
    {
        return "{$this->getResource()}/{$this->getKey()}";
    }
}
