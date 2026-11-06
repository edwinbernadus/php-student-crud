<?php

declare(strict_types=1);

require __DIR__ . '/../bootstrap.php';

use App\Auth\Auth;
use App\Auth\Credentials;
use App\Data\StudentRepository;
use App\Http\JsonResponse;
use App\Http\Request;
use App\Student\StudentValidator;

function respond(array $result): never
{
    if (isset($result['errors'])) {
        JsonResponse::send(['errors' => $result['errors']], 422);
    }

    JsonResponse::send($result);
}

$auth = new Auth(new Credentials());

if (!$auth->check()) {
    JsonResponse::send(['error' => 'Tidak terautentikasi.'], 401);
}

$request = new Request();
$students = new StudentRepository(new StudentValidator());
$id = (int) $request->query('id', 0);

switch ($request->method()) {
    case 'GET':
        JsonResponse::send(['data' => $students->all()]);

    case 'POST':
        if ($request->query('action') === 'reset') {
            $students->reset();
            JsonResponse::send(['data' => $students->all()]);
        }

        respond($students->create($request->json()));

    case 'PUT':
        respond($students->update($id, $request->json()));

    case 'DELETE':
        JsonResponse::send(['deleted' => $students->delete($id)]);

    default:
        JsonResponse::send(['error' => 'Metode tidak didukung.'], 405);
}
