<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Api\V1\Post\Like\LikeController;
use App\Http\Controllers\Api\V1\Post\PostController;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|-----------------
| API Version
|-----------------
*/
Route::prefix('v1')->group(function () {

    /*
    |-----------------
    | Auth Sanctum Group
    |-----------------
    */
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/user/tokens/delete', function (Request $request) {
            $request->user()->tokens()->delete();
            return response()->json([
                'message' => 'You are noew unauthenticated 🚶'
            ], 401);
        });
    });

    /*
    |-----------------
    | Guest
    |-----------------
    */
    Route::middleware('guest')->group(function () {
        Route::post('/register', function (Request $request) {
            (new CreateNewUser())->create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'The user was successfully created'
            ], 200);
        })->name('api.register');

        Route::post('/tokens/create', function (Request $request) {
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validation->fails()) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Validation Errors.',
                    'errors' => $validation->errors()
                ], 422);
            }

            if(
                !Auth::attempt(
                    $request->only([
                        'email',
                        'password'
                    ])
                )
            ) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Bad Creadentials.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("token")->plainTextToken
            ]);
        })->name('api.tokens.create.store');
    });

    Route::middleware('auth:sanctum')
        ->get('/users/{user:username}', [UserController::class, 'index'])->name('api.users.index');

    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('api.posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('api.posts.create');
        Route::post('/', [PostController::class, 'store'])->name('api.posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('api.posts.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('api.posts.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('api.posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('api.posts.destroy');

        Route::get('/{post}/likes', [LikeController::class, 'index'])->name('api.posts.likes.index');
        Route::post('/{post}/likes', [LikeController::class, 'store'])->name('api.posts.likes.store');
        Route::delete('/{post}/likes', [LikeController::class, 'destroy'])->name('api.posts.likes.destroy');
    });
});
