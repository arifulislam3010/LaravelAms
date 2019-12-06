<?php

namespace App\Modules\Settings\Http\Controllers;

use Exception;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//Models
use App\User;
use App\Models\Branch\Branch;
use App\Models\AccessLevel\Role;
use App\Models\AccessLevel\Modules;
use App\Models\AccessLevel\AccessLevel;

class UserWebController extends Controller
{
    public function index()
    {
        $id =  Auth::user()->id;

        $users = User::whereNotIn('id', [$id])->get();

        return view('settings::users.index', compact('users'));
    }

    public function create()
    {
        $branches = Branch::all();
        $roles = Role::all();

        return view('settings::users.create', compact('branches', 'roles'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//           'name'      => 'required',
//           'image'     => 'required',
//           'contact'   => 'required',
//           'note'      => 'required',
//           'email'     => 'required',
//           'password'  => 'required|confirmed',
//           'role_id'   => 'required',
//           'branch_id' => 'required',
//        ]);

        $user_data = $request->all();

        $user_id = Auth::user()->id;

        $user = new User;

        $user->name       = $user_data['name'];
        $user->contact    = $user_data['contact'];
        $user->note       = $user_data['note'];
        $user->email      = $user_data['email'];
        $user->password   = bcrypt($user_data['password']);
        $user->email      = $user_data['email'];
        $user->role_id    = $user_data['role_id'];
        $user->activated  = 1;
        $user->created_by = $user_id;
        $user->updated_by = $user_id;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $original_name = $image->getClientOriginalName();
            $image_name = substr($original_name, 0, strrpos($original_name, "."));
            $extension = $image->getClientOriginalExtension();
            $token = sha1(time());
            $new_image_name = $image_name.'_'.$token.'.'.$extension;
            $path = 'uploads/users';

            $success = $image->move($path,$new_image_name);

            if($success)
            {
                $user->image = $new_image_name;

                if($user->save())
                {
                    return redirect()
                        ->route('user_create')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'User Added Successfully!');
                }
                else
                {
                    return redirect()
                        ->route('user_create')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
                }
            }
            else
            {
                return redirect()
                    ->route('user_create')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
        }
        else
        {
            $user->image = 'user.jpg';

            if($user->save())
            {
                return redirect()
                    ->route('user_create')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'User Added Successfully!');
            }
            else
            {
                return redirect()
                    ->route('user_create')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $branches = Branch::all();
        $roles = Role::all();
        $user = User::find($id);

        return view('settings::users.edit', compact('branches', 'roles', 'user'));
    }

    public function update(Request $request, $id)
    {
//        $this->validate($request, [
//            'name'      => 'required',
//            'contact'   => 'required',
//            'note'      => 'required',
//            'email'     => 'required',
//            'password'  => 'required|confirmed',
//            'role_id'   => 'required',
//            'branch_id' => 'required',
//        ]);

        $user_data = $request->all();

        $user_id = Auth::user()->id;

        $user = User::find($id);

        $user->name       = $user_data['name'];
        $user->contact    = $user_data['contact'];
        $user->note       = $user_data['note'];
        $user->email      = $user_data['email'];
        $user->role_id    = $user_data['role_id'];
        $user->activated  = 1;
        $user->created_by = $user_id;
        $user->updated_by = $user_id;

        if($request->hasFile('image'))
        {
            $deletable = 'uploads/users/' . $user->image;

            if(File::delete($deletable))
            {
                $image = $request->file('image');

                $original_name = $image->getClientOriginalName();
                $image_name = substr($original_name, 0, strrpos($original_name, "."));
                $extension = $image->getClientOriginalExtension();
                $token = sha1(time());
                $new_image_name = $image_name.'_'.$token.'.'.$extension;
                $path = 'uploads/users';

                $success = $image->move($path,$new_image_name);

                if($success)
                {
                    $user->image = $new_image_name;

                    if($user->update())
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'User Updated Successfully!');
                    }
                    else
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
                    }
                }
                else
                {
                    if($user->update())
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'User Added Successfully!');
                    }
                    else
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
                    }
                }
            }
            else
            {
                $image = $request->file('image');

                $original_name = $image->getClientOriginalName();
                $image_name = substr($original_name, 0, strrpos($original_name, "."));
                $extension = $image->getClientOriginalExtension();
                $token = sha1(time());
                $new_image_name = $image_name.'_'.$token.'.'.$extension;
                $path = 'uploads/users';

                $success = $image->move($path,$new_image_name);

                if($success)
                {
                    $user->image = $new_image_name;

                    if($user->update())
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'User Updated Successfully!');
                    }
                    else
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
                    }
                }
                else
                {
                    if($user->update())
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'User Added Successfully!');
                    }
                    else
                    {
                        return redirect()
                            ->route('user_edit', ['id' => $id])
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
                    }
                }
            }
        }
        else
        {
            if($user->update())
            {
                return redirect()
                    ->route('user_edit', ['id' => $id])
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'User Added Successfully!');
            }
            else
            {
                return redirect()
                    ->route('user_edit', ['id' => $id])
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
            }
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $auth_user_type = Auth::user()->type;

        if ($auth_user_type == 0 && $user->type == 0)
        {
            return redirect()->back()
                ->with('alert.status', 'warning')
                ->with('alert.message', 'You don\'t have enough permission to perform this operation!');
        }
        else
        {
            if($user->delete())
            {
                return redirect()
                    ->route('user')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'User Deleted Successfully!');
            }
            else
            {
                return redirect()
                    ->route('user')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry! Cannot delete user!');
            }
        }
    }

    public function password($id)
    {
        return view('settings::users.password', compact('id'));
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $user_data = $request->all();

        $user = User::find($id);

        $user->password = bcrypt($user_data['password']);

        if($user->update())
        {
            return redirect()
                ->route('user_password', ['id' => $id])
                ->with('alert.status', 'success')
                ->with('alert.message', 'User Password Changed Successfully!');
        }
        else
        {
            return redirect()
                ->route('user_password', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Something went wrong! Cannot change password!');
        }
    }

    public function userRole($id)
    {
        $roles = Role::all();
        $user = User::find($id);

        return view('settings::users.role', compact('id', 'roles', 'user'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $this->validate($request, [
            'role_id' => 'required',
        ]);

        $user_data = $request->all();

        $user = User::find($id);

        $user->role_id = $user_data['role_id'];

        if($user->update())
        {
            return redirect()
                ->route('user_role', ['id' => $id])
                ->with('alert.status', 'success')
                ->with('alert.message', 'User Role Updated Successfully!');
        }
        else
        {
            return redirect()
                ->route('user_role', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Something went wrong! Cannot update role!');
        }
    }
}
