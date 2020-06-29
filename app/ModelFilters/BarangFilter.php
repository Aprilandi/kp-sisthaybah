<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BarangFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */

    public function lokasi($id_lokasi)
    {
        if($id_lokasi){
            return $this->where('id_lokasi', $id_lokasi);
        }
    }

    public function jenis($id_jenis)
    {
        if($id_jenis){
            return $this->where('id_jenis_barang', $id_jenis);
        }
    }

    public function sumber($id_sumber)
    {
        if($id_sumber){
            return $this->where('id_sumber_barang', $id_sumber);
        }
    }

    public $relations = [];
}
