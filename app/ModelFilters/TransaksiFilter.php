<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TransaksiFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */

    public function kategori($id_kategori)
    {
        if($id_kategori){
            return $this->where('id_kk', $id_kategori);
        }
    }
    
    public $relations = [];
}
