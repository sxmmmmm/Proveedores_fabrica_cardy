<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$u = \App\Models\User::where('email','admin@cardy.com')->first();
if ($u) {
    echo json_encode(['id' => $u->id, 'email' => $u->email, 'password' => 'hashed']);
} else {
    echo json_encode(null);
}
