<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ForceDeleteAction extends AbstractAction
{

    public function getTitle()
    {
        return 'Force Delete';
    }

    public function getIcon()
    {
        return 'voyager-trash';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger',
            'onclick' => "return confirm('Are you sure you want to permanently delete this item?')"
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.' . $this->dataType->slug . '.forceDelete', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnRow($row)
    {
        return method_exists($row, 'trashed') && $row->trashed();
    }

    public function getPolicy()
    {
        return 'delete';
    }
}
