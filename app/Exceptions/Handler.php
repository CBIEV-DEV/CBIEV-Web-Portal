<?php

namespace App\Exceptions;
use Throwable;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
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
    public function report(Throwable $exception)
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
    public function render($request, Throwable $exception)
    {
        $class = get_class($exception);

        switch($class) {
            case 'Illuminate\Auth\AuthenticationException':
                $guard = array_get($exception->guards(), 0);
                switch ($guard) {
                    case 'cbiev-staff':
                        $login = 'staff.login';
                        break;
                    case 'mentor-registration':
                        $login = 'mentor.temp.registration.login';
                        break;
                    default:
                        $login = 'login';
                        break;
                }

                return redirect()->route($login);
            break;
    }

        return parent::render($request, $exception);
    }

    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if(in_array('cbiev-staff', $exception->guards())){
    //         return redirect(route('staff.login.show'));
    //         return dd('staff');
    //     }else if(in_array('participant', $exception->guards())){
    //         return redirect(route('participant.login.show'));
    //         return dd('staff');
    //     }{
    //         return dd('web');
    //     }
    // }
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }
    //     if ($request->is('staff') || $request->is('staff/*')) {
    //         return redirect()->guest('/staff/login');
    //     }
    //     if ($request->is('writer') || $request->is('writer/*')) {
    //         return redirect()->guest('/login/writer');
    //     }
    //     return redirect()->guest(route('login'));
    // }
}
