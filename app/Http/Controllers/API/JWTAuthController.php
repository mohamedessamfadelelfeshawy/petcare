<?php
 
namespace App\Http\Controllers\API;
 
use JWTAuth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller as controller;
 
class JwtAuthController extends Controller
{
    public $token = true;
  
    public function register(Request $request)
    {
 
         $validator = Validator::make($request->all(), 
                      [ 
                        'firstname' => ['required', 'string', 'max:255'],
                        'lastname' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8'],
                        'c_password' => 'required', 
                        'username' => 'required|unique:users',
                        'type' => 'required',  
                     ]);  
 
         if ($validator->fails()) {  
 
               return response()->json(['error'=>$validator->errors()], 401); 
 
            }   
 
 
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->contact_number = $request->contact_number;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();
  
        if ($this->token) {
            return $this->login($request);
        }
  
        return response()->json([
            'success' => true,
            'data' => $user
        ], Response::HTTP_OK);
    }
  
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
  
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = JWTAuth::user();

  
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user
        ]);
    }
  
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
  
        try {
            JWTAuth::invalidate($request->token);
  
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
  
    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
  
        $user = JWTAuth::authenticate($request->token);
  
        return response()->json(['user' => $user]);
    }

    public function vets(Request $request)
    {
        $vets=User::where('type','Vet')->get();

        return response()->json(['vets' => $vets]);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), 
        [ 
          'firstname' => ['required', 'string', 'max:255'],
          'lastname' => ['required', 'string', 'max:255'],
       ]);  

        if ($validator->fails()) {  

        return response()->json(['error'=>$validator->errors()], 401); 

        }   


        $user = JWTAuth::user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->save();
        return response()->json(['message' => 'success']);

    }

    public function changeImage (Request $request)
    {
        $file = $request->file('img');

        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'assets/images/uploads';

        // Upload file
        $file->move($location,$filename);

        $user = JWTAuth::user();

        $user->img='/uploads/'.$filename;
        $user->save();

        return response()->json(['message' => 'success']);

    }
}