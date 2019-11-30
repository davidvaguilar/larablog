<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       // dd($exception);
        //return parent::render($request, $exception);

        echo env('APP_ENV');

        if(env('APP_ENV') == 'local'){
            return parent::render($request, $exception);
        }
        if( $exception instanceof NotFoundHttpException){
            return $this->errorResponse("Pagina no encontrada", $code = 404, $msj = "Pagina no encontrada");
        }
         
        if( $exception instanceof ModelNotFoundException){
            return $this->errorResponse("Recurso no encontrado", $code = 404, $msj = "Recurso no encontrada");
        }
        return parent::render($request, $exception);
    }
}
