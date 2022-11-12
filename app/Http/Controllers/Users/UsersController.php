<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    private User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->with('roles')->whereNot('id',auth()->user()->id)->get();
        return view('users.index')->with(['users' => $users]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(UsersRequest $request)
    {
        DB::beginTransaction();
        try {
            $magePath = null;
            if($request->has('image')){
                $magePath = uploadFile($request->file('image'),$this->user->imagesPath,'public');
            }

            $user = $this->user->query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'image' => $magePath
            ]);

            $user->assignRole($request->role);

            DB::commit();
            return back()->with(['success' => 'The user was added successfully!']);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function toggleStatus(User $user){
        $user->is_active = !$user->is_active;
        if($user->save()){
            return response()->json([
                'message' => 'the status was updated successfully!',
                'user' => $user
            ]);
        }
        return response()->json([
            'message' => 'the status was not updated successfully!',
            'user' => $user
        ],500);

    }
}
