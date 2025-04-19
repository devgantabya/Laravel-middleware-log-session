Route::middleware('auth')->group(function() {
    Route::get('/members', [MemberController::class, 'members'])->name('members');
    Route::get('/member', [MemberController::class, 'member'])->name('member');
    Route::get('/memberid/{id}', [MemberController::class, 'memberId'])->name('member.id');
});

Route::get('/throttletest', [MemberController::class, 'throttleTest'])->middleware('throttle:2,1')->name('throttletest'); //throttle:request/minute


Route::get('demo1', [SessionController::class, 'demo1']);
Route::get('demo2', [SessionController::class, 'demo2']);
Route::get('demo3', [SessionController::class, 'demo3']);
Route::get('demo4', [SessionController::class, 'demo4']);

## Laravel Middleware, Logging, and Session

### Middleware
Middleware in Laravel acts as a bridge between a request and a response. It is used to filter HTTP requests entering your application. For example, the `auth` middleware ensures that only authenticated users can access certain routes. Middleware can be applied globally, to specific routes, or to route groups.

Example:
```php
Route::middleware('auth')->group(function() {
    Route::get('/members', [MemberController::class, 'members'])->name('members');
});
```

### Logging
Laravel provides a robust logging system powered by the Monolog library. Logs can be written to various channels such as files, databases, or external services. You can configure logging in the `config/logging.php` file. Use the `Log` facade to write custom log messages.

Example:
```php
use Illuminate\Support\Facades\Log;

Log::info('This is an informational message.');
Log::error('This is an error message.');
```

### Session
Sessions in Laravel provide a way to store user data across multiple requests. By default, Laravel supports several session drivers like file, cookie, database, and Redis. You can configure the session driver in the `config/session.php` file. The `Session` facade or the `session()` helper can be used to interact with session data.

Example:
```php
// Storing data in session
session(['key' => 'value']);

// Retrieving data from session
$value = session('key');

// Removing data from session
session()->forget('key');
```

Middleware, logging, and session management are essential components of Laravel, enabling developers to build secure, maintainable, and feature-rich applications.
