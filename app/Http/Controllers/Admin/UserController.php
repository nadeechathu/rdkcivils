<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use App\Models\EmailSender;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $hasPermission = Auth::user()->hasPermission('view_users');

        if($hasPermission){

            $searchKey = $request->searchKey;
            $users = User::getUsersForFilters($searchKey);
            $permissions = Permission::get()->groupBy('type')->toArray();
            $roles = Role::all();

            foreach($users as $user){
                $user->assigned_permissions = User::getUserPermissions($user->id);
            }

            return view('admin.users.all_users',compact('users','permissions','searchKey','roles'));


        }else{
            return redirect('admin/not_allowed');
        }


    }

    public function getAllClients(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_clients');

        if($hasPermission){

            $searchKey = $request->searchKey;
            $clients = User::getClientsForFilters($searchKey);
            $roles = Role::all();

            return view('admin.users.all_clients',compact('clients','searchKey','roles'));


        }else{
            return redirect('admin/not_allowed');
        }
    }

    public function update(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_users');

        if($hasPermission){

            $validated = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'digits:10'],
                'role' => ['required'],
            ]);

            $user = User::where('id',$request->user_id)->get()->first();

            if($user != null){
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->role_id = $request->role;

                if($request->file('image')){

                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images/uploads/users/'), $imageName);
                    $imageUrl = 'images/uploads/users/' . $imageName;

                    $user->user_image = $imageUrl;
                }

                $user->save();

                return back()->with('success','User updated successfully !');

            }else{
                return back()->with('error','Could not find the user');
            }


        }else{
            return redirect('admin/not_allowed');
        }


    }

    public function changeStatus($id){



        try{

            $hasPermission = Auth::user()->hasPermission('edit_users');

            if($hasPermission){

                $user = User::where('id',$id)->get()->first();

                if($user != null){
                    if($user->status == 1){
                        $user->status = User::INACTIVE;

                        $user->save();
                        return back()->with('success','User deactivated successfully !');
                    }else if($user->status == 0){
                        $user->status = User::ACTIVE;

                        $user->save();

                        return back()->with('success','User activated successfully !');
                    }
                }else{
                    return back()->with('error','Could not find the user');
                }



            }else{
                return redirect('admin/not_allowed');
            }


        }catch(\Exception $exception){
            return back()->with('error','Error occured - '.$exception->getMessage());
        }
    }

    public function userProfileUI(){

        $user = Auth::user();

        return view('admin.users.profile',compact('user'));
    }

    public function changeUserPassword(Request $request){



            $this->validate($request, [
                'password' => 'required|confirmed|min:8',
            ],
            [
                'password.required' => 'New password required.',
                'password.confirmed' => 'Password and confirm password does not match.',
                'password.min' => 'Minimum password length is 8 characters.',
            ]);

            $user = User::where('id',$request->user_id)->get()->first();

            if($user != null){

                $user->password = Hash::make($request->password);
                $user->save();

                return back()->with('success','Password changed successfully !');

            }else{

                return back()->with('error','Could not find the user.');

            }



    }



    public function subscribesUI(Request $request)
    {
        $searchKey = $request->searchKey;

        $subscriptions = UserSubscription::getSubscriptionsForFilters($searchKey);

        return view('admin.users.user_subscriptions',compact('subscriptions','searchKey'));

    }







    public function exportSubscriptions(){

        $userSubscriptions = UserSubscription::all();

        $fileName = date('Y_m_d').'_subscriptions.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('SUBSCRIPTION EMAIL', 'SUBSCRIBED ON');

        $callback = function() use($userSubscriptions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($userSubscriptions as $userSubscription) {

                $row['SUBSCRIPTION EMAIL']  = $userSubscription->email;
                $row['SUBSCRIBED ON']  = $userSubscription->created_at;


                fputcsv($file, array($row['SUBSCRIPTION EMAIL'], $row['SUBSCRIBED ON']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

}


    // Load client register UI
    public function registerClient(){
        return view('admin.users.client_register');
    }

    // ***  Client data store in user table
    public function storeClient(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_clients');
        if($hasPermission){

                $request->validate([
                    'first_name' => 'required | alpha',
                    'last_name' => 'alpha',
                    'postal_code' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:8|confirmed',
                    'contact_number' => 'required'
                ]);

                try{

                    $user = new User;
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email = $request->email;
                    $user->phone = $request->contact_number;
                    $user->username =  $request->email;
                    $user->postal_code =  $request->postal_code;
                    $user->site_address =  $request->site_address;
                    $user->correspondence_address =  $request->correspondence_address;
                    $user->role_id = 2;
                    $user->status = 1;
                    $user->password = Hash::make($request->password);
                    
                    $savedUser = User::create($user->toArray());

                    //sending registration email
                    EmailSender::sendRegistrationEmail($savedUser->id, $request->password, true);

                    return back()->with('success','Client data successfully saved !');

                }catch(\Exception $exception){

                    return back()->with('error','Error occurred - '.$exception->getMessage());
                }
        }else{
            return redirect('admin/not_allowed');
        }


    }

    //*** Edit client data */
    public function editClient(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_clients');

        if($hasPermission){

            $request->validate([
                'first_name' => 'required | alpha',
                'last_name' => 'alpha',
                'postal_code' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->user_id,
                'contact_number' => 'required'
            ]);

            $user = User::where('id',$request->user_id)->get()->first();

            if($user != null){

                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone = $request->contact_number;
                $user->username =  $request->email;
                $user->postal_code =  $request->postal_code;
                $user->site_address =  $request->site_address;
                $user->correspondence_address =  $request->correspondence_address;
                $user->role_id = 2;
                $user->status = 1;
                $user->save();

                return back()->with('success','Client updated successfully !');

            }else{

                return back()->with('error','Could not find the client');
            }
        }else{
            return redirect('admin/not_allowed');
        }
    }

    //Approve client registration
    public function approveClient($id){

        $hasPermission = Auth::user()->hasPermission('approve_clients');
        
        if($hasPermission){
           
            $user = User::where('id',$id)->get()->first();

            if($user != null){
                
                $user->is_approved = User::APPROVED;
                $user->save();

                EmailSender::sendRegistrationApprovalEmail($user->id);

                return back()->with('success','Client approved successfully !');

            }else{

                return back()->with('error','Could not find the client to approve');
            }
        }else{
            return redirect('admin/not_allowed');
        }

    }

}
