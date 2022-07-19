<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Http\Requests\Api\ProfileUpdate;
use Carbon\Carbon;

/**
 * Logged in User Profile
 *
 * @Resource("Profile", uri="/profile")
 */
class ProfileController extends ApiController
{

    public function show(Request $request)
    {
        return $this->response->item($this->user, new UserTransformer());
    }


    public function update(ProfileUpdate $request)
    {
        $user = $this->user;
        $user->fill($request->except(['password']));

        if ($user->save()) {
            return $this->response->item($user, new UserTransformer());
        } else {
            return $this->response->errorBadRequest('Unable to update user profile');
        }

    }


}
