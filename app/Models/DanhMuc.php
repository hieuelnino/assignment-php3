<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh-muc';
    protected $fillable = [
        'name', 'logo'
    ];
    public function blog()
    {
        return $this->hasMany(BaiViet::class, 'danh-muc_id', 'id');
    }
}
