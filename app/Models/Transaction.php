<?php

namespace App\Models;

use App\Transformers\TransactionTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    use HasFactory;

    use SoftDeletes;

    public $transformer = TransactionTransformer::class;

    protected $dates = ['deleted_at'];

    

    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];

    public function buyer() {
        return $this->belongsTo(Buyer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
