namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}