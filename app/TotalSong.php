<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalSong extends Model
{
    protected $table = 'totalsong';

    protected $fillable = [
        'songername', 'photo', 'title', 'time', 'size', 'style',
    ];
    
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
