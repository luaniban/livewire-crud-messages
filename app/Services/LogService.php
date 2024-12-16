<?php

namespace App\Services;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogService
{
    public static function getPathLog()
    {
        $id = Auth::id();

        return storage_path('logs/user-'.($id < 10 ? "0{$id}" : $id).'.log');

    }

    public static function sendVincularProfessorLog($id): void
    {
        $prof_vinculo = Professor::findOrFail($id);

        $log = new Logger('vincularProfessor');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Aulas vinculadas {$prof_vinculo}");
    }

    public static function sendUpdateteQuadroLog($id): void
    {
        $log = new Logger('updateQuadro');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Quadro atualizada {$id}");
    }

    public static function sendDeleteQuadroLog($id, $name): void
    {
        $context = [
            'id' => $id,
            'name' => $name,
        ];

        $log = new Logger('deleteQuadro');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Excluiu Quadro: {$id} - {$name}", $context);
    }

    public static function sendCreateUserLog($id): void
    {
        $User = User::findOrFail($id);

        $log = new Logger('storeUser');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Usuário cadastrado {$User}");
    }

    public static function sendUpdateteUserLog($id): void
    {
        $log = new Logger('updateUser');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Cadastrso do usuário atualizado {$id}");
    }

    public static function sendDeleteUserLog($id, $name): void
    {
        $context = [
            'id' => $id,
            'name' => $name,
        ];

        $log = new Logger('deleteUser');
        $log->pushHandler(new StreamHandler(self::getPathLog()));
        $log->info("Excluiu cadastro do usuário: {$id} - {$name}", $context);
    }
}
