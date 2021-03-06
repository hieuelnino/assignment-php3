<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BaiViet extends Model
{
    use HasFactory;
    protected $table = 'bai-viet';
    public function cate()
    {
        return $this->belongsTo(DanhMuc::class, 'danh-muc_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
    protected $fillable = [
        'title',
        'author_id',
        'danh-muc_id',
        'content',
        'short_desc',
        'image'
    ];
}
