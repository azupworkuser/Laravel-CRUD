<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\ApiForgetPasswordEvent;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Password\ForgetRequest;
use App\Http\Requests\Api\Password\ResetRequest;
use App\Http\Requests\Api\Password\SetRequest;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Codeception\Util\HttpCode;
use Illuminate\Support\Facades\Hash;
use Mail;
use Config;
use Illuminate\Support\Facades\DB;

class PasswordController extends ApiController
{

    public function forget(ForgetRequest $request)
    {

        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            if ($user->isActive()) {
                Mail::to($user)->send(new ForgetPasswordMail($user));
            } else {
                return response()->json(['status' => 204, 'message' => trans('messages.notActivated')]);
            }
            return response()->json(['status' => 200, 'message' => trans('messages.emailSent', ['mail' => $user->email])]);
        } else {
            return response()->json(['status' => 204, 'message' => trans('messages.notFound', ['model' => 'User'])]);
        }

    }

    public function reset(ResetRequest $request)
    {
        $user = $this->user;
        if (Hash::check($request->get('password'), $user->password)) {
            $user->password = bcrypt($request->get('new_password'));

            if ($user->save()) {
                return $this->response->array(['status' => HttpCode::OK, 'message' => 'Password successfully changed']);
            } else {
                return $this->response->errorInternal('Error occured while changing password');
            }
        } else {
            return $this->response->errorBadRequest('Current password does not match');
        }
    }

    public function set(SetRequest $request)
    {
        $password = DB::table('password_resets')->where('token', $request->get('token'))->first();

        if ($password) {
            $user = User::where('email', $password->email)->first();

            if (!$user) {
                return $this->response->array(['status' => 401, 'message' => trans('messages.notFound', ['model' => 'User'])]);
            }
            $user->password = bcrypt($request->get('password'));
            $user->save();

            DB::table('password_resets')->where('token', $request->get('token'))->delete();

            return $this->response->array(['status' => HttpCode::OK, 'message' => 'Password successfully set']);

        } else {
            return $this->response->array(['status' => 401, 'message' => trans('messages.notFound', ['model' => 'Token'])]);
        }
        return $this->response->errorInternal('Error occurred while setting your new password');
    }
}
