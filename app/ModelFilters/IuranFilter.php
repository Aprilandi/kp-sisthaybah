<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class IuranFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */

    public function santri($id_santri)
    {
        if($id_santri){
            return $this->where('id_santri', $id_santri);
        }
    }

    public function biaya($id_biaya)
    {
        if($id_biaya){
            return $this->where('id_biaya', $id_biaya);
        }
    }

    public $relations = [];
}
