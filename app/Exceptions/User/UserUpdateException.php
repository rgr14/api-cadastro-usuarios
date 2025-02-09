<?php

namespace App\Exceptions\User;

use Exception;

class UserUpdateException extends Exception
{
    protected $message = "Erro ao atualizar usuário.";

    public function __construct($message = null)
    {
        parent::__construct($message ?? $this->message);
    }

    public function render()
    {
        return response()->json([
            'message' => $this->getMessage(),
        ], 500);
    }
}
