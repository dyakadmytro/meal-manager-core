<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Nutrition extends Model
{

    public $timestamps = false;

    public function update(array $attributes = [], array $options = [])
    {
         throw new \Exception('You can`t update this model');
    }

    public function save(array $options = [])
    {
        throw new \Exception('You can`t save this model');
    }

    public function delete()
    {
        throw new \Exception('You can`t delete this model');
    }


}
