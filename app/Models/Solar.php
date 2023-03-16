<!-- <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Planeet;

class Solar extends Model
{
    use HasFactory;
    protected $table = 'solar';
    public $timestamps = false;

    public function planeten()
    {
        return $this->hasMany(Planeet::class);
    }
} -->
