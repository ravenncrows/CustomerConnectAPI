<?php

namespace App\Object\Other;

use App\Object\CC\CCEdit as Edit ;


class CCEdit extends Edit
{
    public function convertData($objectModel)
    {
        $objectModel->item;
        $objectModel->Entity;
        return $objectModel;
    }
}