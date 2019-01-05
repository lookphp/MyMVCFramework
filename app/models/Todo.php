<?php
/**
 * Created by PhpStorm.
 * User: liuxingwang
 * Date: 2019/1/6
 * Time: 00:57
 */

namespace app\models;

use Pheasant\Types;

class Todo extends BaseModel
{
    public function properties()
    {
        return array(
            'id'   => new Types\SequenceType(),
            'title'    => new Types\StringType(255, 'required'),
            'status'   => new Types\BooleanType(),
        );
    }

}