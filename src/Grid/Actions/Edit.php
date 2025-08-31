<?php

namespace Qulint\Admin\Grid\Actions;

use Qulint\Admin\Actions\RowAction;

class Edit extends RowAction
{
    public $icon = 'icon-pen';

    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('admin.edit');
    }

    /**
     * @return string
     */
    public function href()
    {
        return "{$this->getResource()}/{$this->getKey()}/edit";
    }
}
