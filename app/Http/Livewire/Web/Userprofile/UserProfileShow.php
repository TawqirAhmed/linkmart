<?php

namespace App\Http\Livewire\Web\Userprofile;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

use App\Models\User;
use App\Models\UserProfile;
use Auth;
class UserProfileShow extends Component
{
    use PasswordValidationRules;

    public $user_id, $user_profile_id;

    public $name, $email;

    public $current_password, $new_password, $confirm_password;

    public $mobile, $city, $post_code, $address_line1, $address_line2;

    public function StoreUserInfo()
    {
        $data = User::find($this->user_id);

        $data->name = $this->name;
        $data->email = $this->email;

        $data->save();
        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Information Saved.']);
    }

    public function ChangeUserPassword()
    {
        // $data = User::find($this->user_id);

        // if (Hash::check($this->current_password, $data->password)) {
        //     if ($this->new_password === $this->confirm_password) {
        //         $data->password = Hash::make($this->confirm_password);

        //         $data->save();
        //         $this->dispatchBrowserEvent('alert', 
        //             ['type' => 'success',  'message' => 'Password Changed.']);
        //         $this->current_password = null;
        //         $this->new_password = null;
        //         $this->confirm_password = null;
        //     }else{
        //         $this->dispatchBrowserEvent('alert', 
        //             ['type' => 'error',  'message' => 'Password And Confirm Password Must be same.']);
        //         $this->new_password = null;
        //         $this->confirm_password = null;
        //     }
        // } else {
        //     $this->dispatchBrowserEvent('alert', 
        //             ['type' => 'error',  'message' => 'Given Current Password is Wrong.']);
        //     $this->current_password = null;
        //     $this->new_password = null;
        //     $this->confirm_password = null;
        // }

        //---------------------------------------------

        $user = User::find($this->user_id);

        $input = array();

        $input['current_password'] = $this->current_password;
        $input['password'] = $this->new_password;
        $input['password_confirmation'] = $this->confirm_password;

        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
                $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => 'The provided password does not match your current password.']);
            }
        })->validateWithBag('updatePassword');

        $done = $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
        
        if ($done) {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Password Changed.']);
        }
        

    }

    public function StoreUserProfile()
    {
        $data = UserProfile::find($this->user_profile_id);

        $data->mobile = $this->mobile;
        $data->city = $this->city;
        $data->post_code = $this->post_code;
        $data->address_line1 = $this->address_line1;
        $data->address_line2 = $this->address_line2;

        $data->save();

        $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => 'Information Saved.']);
    }

    public function mount($id)
    {
        $u_id = Auth::id();

        if ($id != $u_id) {
            return redirect()->route('web.home');
        }

        $user = User::where('id',$u_id)->first();

        $this->user_id = $user->id;


        $user_info = User::find($this->user_id);

        $this->name = $user_info->name;
        $this->email = $user_info->email;

        $user_profile_info = UserProfile::where('user_id',$user_info->id)->first();

        $this->user_profile_id = $user_profile_info->id;

        $this->mobile = $user_profile_info->mobile;
        $this->city = $user_profile_info->city;
        $this->post_code = $user_profile_info->post_code;
        $this->address_line1 = $user_profile_info->address_line1;
        $this->address_line2 = $user_profile_info->address_line2;
    }

    public function render()
    {
        return view('livewire.web.userprofile.user-profile-show')->layout('web.base.base');
    }
}
