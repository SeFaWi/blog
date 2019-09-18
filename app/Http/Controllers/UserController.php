<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()

            {
         //   $this->middleware('auth');
            }
    public function index(Request $request)
    {
        if ($request->has('name'))
        {
        $bla =  User::where('name', 'like', '%'. $request->name .'%')->get(['name','gender','email','image','Status']);



        return $bla;

        }

        return  User::all();
        /**
            شرح م.محمد علي بحث بصفه عامه
                    $user = User::query();
                    if($request->name)
                    {
                        $user->where('name',"like",$request->name);
                    }
                         return $user->get();
         */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  User::create($request->all());
     //   return "done";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         if( User::where('id' ,'=',$id)->get());
        return "Error false";
         return " Notfound";
*/
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


        public function update(Request $request,$id)
        {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, user with id ' . $id . ' cannot be found'
                ], 400);
            }

            $updated = $user->fill($request->all())
                ->save();

            if ($updated) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, user could not be updated'
                ], 500);
            }
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
