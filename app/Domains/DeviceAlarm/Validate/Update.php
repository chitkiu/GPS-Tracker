<?php declare(strict_types=1);

namespace App\Domains\DeviceAlarm\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Update extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required'],
            'config' => ['bail', 'array'],
            'telegram' => ['bail', 'boolean'],
            'enabled' => ['bail', 'boolean'],
        ];
    }
}
