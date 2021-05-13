<?php

namespace Hooshid\Utils;

class ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $e
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public static function handle($request, $e)
    {
 
        // converts errors to JSON when required and when not a validation error
        if ($request->expectsJson() && method_exists($e, 'getStatusCode')) {
            return response()->json([
                'result' => [
                    'status' => 'error',
                    'code' => $e->getStatusCode(),
                    'description' => $e->getMessage(),
                ],
            ], $e->getStatusCode());
        }

        // catch only json requests
        if ($request->expectsJson()) {

            // 400 Bad Request
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 400,
                        'description' => 'Bad Request',
                    ],
                ], 400);
            }

            // 401 Unauthorized
            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 401,
                        'description' => 'Unauthorized',
                    ],
                ], 401);
            }

            // 404 Not Found
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 404,
                        'description' => 'Not Found',
                    ],
                ], 404);
            }

            // 422 Unprocessable Entity - Validation Form
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 422,
                        'description' => 'Unprocessable Entity',
                    ],
                    'errors' => $e->errors(),
                ], 422);
            }

            // 422 Unprocessable Entity
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 422,
                        'description' => 'Unprocessable Entity',
                    ],
                ], 422);
            }

            // 429 Too Many Attempts
            if ($e instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
                return response()->json([
                    'result' => [
                        'status' => 'error',
                        'code' => 429,
                        'description' => 'Too Many Attempts.',
                    ],
                ], 429);
            }
        }

    }
}
