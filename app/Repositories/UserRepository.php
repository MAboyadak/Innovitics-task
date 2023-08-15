<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function store($data)
    {
        $cardData = $this->getDataArray($data);
        User::create($cardData);
        return $cardData;
    }

    private function getDataArray($data)
    {
        return [
            'username'       => $data['username'],
            'pin'            => bcrypt($data['pin']),
            'card_number'    => random_int(10000000000000,99999999999999),
        ];
    }
}
?>