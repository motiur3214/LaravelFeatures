<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public function authenticate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
//            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{

            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
    public function logout(Request $request):JsonResponse
    {
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->revoke();
            return $this->sendResponse(null, 'User is logout');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'] , Response::HTTP_UNAUTHORIZED);

        }
    }

}
