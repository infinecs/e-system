<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Profile;
use App\Models\assetList;
use App\Models\Brand;
use App\Models\location;
use App\Models\Status;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Models\jobapplication;
Use Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function index()
    {
        $user=Auth::user();
        return view('admin/index')->with('user',$user);
    }

    // Profile Module Start
    public function profile($id = null)
    {
        
        if ($id){
            $user=User::find($id);
            $profile = Profile::where('user_id',$id)->first();
            return view('admin/profile')->with('user',$user)->with('profile',$profile);

        }else{
            $user=Auth::user();
            $userID = Auth::user()->id;
            $profile = Profile::where('user_id',$userID)->first();
            return view('admin/profile')->with('user',$user)->with('profile',$profile);
        }
       
    }
    public function profileEdit()
    {
        $userID = Auth::user()->id;
        $user = Auth::user();
        $profile = Profile::where('user_id', $userID)->first();
    
        return view('admin/profileEdit', compact('user', 'profile'));
    }
    
    public function update(Request $request)
    {
        $userID = Auth::user()->id;
        $profile = Profile::where('user_id', $userID)->first();
    
        // Validate the request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'address1' => 'required', // Make sure the field name matches your form
            'username' => 'required',
            'email' => 'required',
            'company' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'about' => 'required',
        ]); 
        
        // Check if validation fails
        if ($validator->fails()) {
            toast('Failed to update Profile: Please fill in all spaces', 'error');
            
            return redirect('/admin/profileEdit')
                ->withErrors($validator)
                ->withInput();
        }
        // Update the profile
        $profile->firstname = $request->input('firstname');
        $profile->lastname = $request->input('lastname');
        $profile->address1 = $request->input('address1');
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');
        $profile->company = $request->input('company');
        $profile->city = $request->input('city');
        $profile->country = $request->input('country');
        $profile->postcode = $request->input('postcode');
        $profile->about = $request->input('about');
    
        $profile->save();
    
        if($profile->wasChanged()) {
            // Asset updated successfully
            toast('Profile Updated !', 'success');
        } else {
            // Handle the case where asset update failed
            toast('Failed to update Profile', 'error');
        }
    
        return redirect('/admin/profileEdit')->with('success', 'Profile Updated');
    }


//profile photo
    public function profilephoto()
    {
        $userID = Auth::user()->id;
        $user = Auth::user();
        $profile = Profile::where('user_id',$userID)->first();
        
        return view('admin/profilephoto')->with('user',$user)->with('profile',$profile);;
    }


    public function upload(Request $request)
{
    $request->validate([
        'avatars' => 'required|image|mimes:jpeg,png,jpg,gif', // Validate uploaded image
    ]);

    $userID = Auth::user()->id;
    $user = Auth::user();
    $profile = Profile::where('user_id', $userID)->first();

    // Delete old profile picture if exists
    if ($profile->avatar) {
        // Delete old profile picture file
        if (file_exists(public_path($profile->avatar))) {
            unlink(public_path($profile->avatar));
        }
    }

    // Store uploaded image in the public/profile_avatar directory
    $avatar = $request->file('avatars');
    $avatarName = 'avatar_image.' . $avatar->getClientOriginalExtension();
    $avatar->move(public_path('profile_avatar'), $avatarName);

    // Update profile with the new image path
    $profile->avatar = 'profile_avatar/' . $avatarName;
    $profile->save();

    // Return the updated profile with the image URL
    return redirect()->back()->with('success', 'Avatar updated successfully!')->with('profile', $profile->fresh());
}

    //User module Start
    public function userList()
    {
        $user = Auth::user();
        $userData =  User::where('id', '!=', Auth::user()->id)->get();

        return view('admin/userList')->with('user',$user)->with('userData',$userData);
    }
    public function userAdd()
    {
        $user = Auth::user();
        $userData =  User::where('id', '!=', Auth::user()->id)->get();

        
        
        return view('admin/userAdd')->with('user',$user)->with('userData',$userData);
    }

    
    public function userStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'status' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('admin/userAdd') // Change this to the appropriate URL for your registration page
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('status');
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();

            $user = Auth::user();
            $userData =  User::where('id', '!=', Auth::user()->id)->get();
            toast('User Added !','success');
             return view('admin/userList')->with('user',$user)->with('userData',$userData);
        }
    }

    public function userEditStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'status' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back() // Change this to the appropriate URL for your registration page
                ->withErrors($validator)
                ->withInput();
        }else{
            $user =User::find($request->input('id'));
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('status');
            $user->created_at = now();
            $user->updated_at = now();
            $user->update();

            $user = Auth::user();        
            $userData =  User::where('id', '!=', Auth::user()->id)->get();
            toast('User Updated !','warning');
             return view('admin/userList')->with('user',$user)->with('userData',$userData);
        }
    }


    public function userEdit($id = null){

        if ($id){
            $user = User::find($id);    
            $userData = User::All();
    
            return view('admin/userEdit')->with('user',$user)->with('userData',$userData);
        }else{
            $user = User::find(Auth::user()->id); 
            $userData = User::All();
    
            return view('admin/userEdit')->with('user',$user)->with('userData',$userData);
        }
        
        
    }
    

    public function userDelete($id){
        $user = User::find($id);
        if ($user){
            $user->delete();
            $user = Auth::user();        
            $userData =  User::where('id', '!=', Auth::user()->id)->get();


            toast('User Deleted !','error');
            return view('admin/userList')->with('user',$user)->with('userData',$userData)->with('success','Successfully Deleted!');
        }
        else{
            $user = Auth::user();
            $userData =  User::where('id', '!=', Auth::user()->id)->get();

            return view('admin/userList')->with('user',$user)->with('userData',$userData)->with('error','Something Went Wrong!');
        }
        

        

    }



// Controller method
public function jobApplication(Request $request)
{
    $jobapplicationData = JobApplication::query();
    
    // Apply filtering based on request parameters
    if ($request->filled('jobType')) {
        $jobapplicationData->where('JobType', $request->input('jobType'));
    }
    if ($request->filled('qualification')) {
        $jobapplicationData->where('Qualification', $request->input('qualification'));
    }
    if ($request->filled('position')) {
        $jobapplicationData->where('PositionApplied', $request->input('position'));
    }
    if ($request->filled('dateFrom') && $request->filled('dateTo')) {
        $jobapplicationData->whereBetween('DateCreate', [$request->input('dateFrom'), $request->input('dateTo')]);
    }
    $filteredJobApplications = $jobapplicationData->get();
    
    // Retrieve authenticated user
    $user = Auth::user();

    // Pass filtered data and user to the view
    return view('admin.jobApplication', [
        'jobapplicationData' => $filteredJobApplications,
        'user' => $user
    ]);
}


public function getApplicationDetails($applicationId)
    {
        // Retrieve the job application data based on the provided application ID
        $jobApplication = JobApplication::find($applicationId);

        // Check if the job application exists
        if ($jobApplication) {
            // If it exists, return the data as JSON
            return response()->json($jobApplication);
        } else {
            // If it doesn't exist, return an error response
            return response()->json(['error' => 'Job application not found.'], 404);
        }
    }




    public function addJobApplication()
{
    $user = Auth::user();
    $userData = User::where('id', '!=', Auth::user()->id)->get();
    $jobApplication = new JobApplication(); // Assuming you're creating a new JobApplication object
    return view('admin/addJobApplication', ['user' => $user, 'userData' => $userData, 'jobApplication' => $jobApplication]);
}
    
       

public function applicationStore(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'Nationality' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
        'ContactNo' => 'required|string|max:20',
        'PositionApplied' => 'required|string|max:255',
        'JobType' => 'required|string|in:Experienced,FreshGraduate,Internship',
        'DateCreate' => 'required|date',
        'FieldOfStudy' => 'required|string',
        'UniversityInstitute' => 'required|string',
        'Qualification' => 'required|string',
        'UploadResume' => '|file|mimes:pdf|max:2048',
    ]);

    // Check if a file was uploaded
    if ($request->hasFile('UploadResume')) {
        $uploadResume = $request->file('UploadResume');

        // Generate a unique name for the resume file
        $resumeName = time() . '_' . $uploadResume->getClientOriginalName();

        // Move the uploaded resume file to the public/resume directory with the new name
        $uploadResume->move(public_path('Resume'), $resumeName);
    } else {
        // If no file was uploaded, set $resumeName to null
        $resumeName = null;
    }

    // Create a new job application record
    $jobApplication = new JobApplication();
    $jobApplication->FirstName = $validatedData['FirstName'];
    $jobApplication->LastName = $validatedData['LastName'];
    $jobApplication->Nationality = $validatedData['Nationality'];
    $jobApplication->Email = $validatedData['Email'];
    $jobApplication->ContactNo = $validatedData['ContactNo'];
    $jobApplication->PositionApplied = $validatedData['PositionApplied'];
    $jobApplication->JobType = $validatedData['JobType'];
    $jobApplication->DateCreate = $validatedData['DateCreate'];
    $jobApplication->FieldOfStudy = $validatedData['FieldOfStudy'];
    $jobApplication->UniversityInstitute = $validatedData['UniversityInstitute'];
    $jobApplication->Qualification = $validatedData['Qualification'];
    $jobApplication->UploadResume = $resumeName; // Save the file name, or null if no file is uploaded

    // Save the job application
    if ($jobApplication->save()) {
        // Job application saved successfully
        toast('Job Application Added!', 'success');
    } else {
        // Failed to save job application
        toast('Failed to add job application!', 'error');
    }

    // Redirect back to the form page
    return redirect()->back();
}



public function applicationDelete($ApplicationID)
{
    $jobapplication = JobApplication::find($ApplicationID);

    if ($jobapplication) {
        $jobapplication->delete();
        $user = Auth::user();
        $jobapplicationData = JobApplication::all(); // Fetch updated list of job applications

        toast('Job Application Deleted!', 'success');
        return view('admin.jobApplication', ['user' => $user, 'jobapplicationData' => $jobapplicationData])->with('success', 'Successfully Deleted!');
    } else {
        $user = Auth::user();
        $jobapplicationData = JobApplication::all(); // Fetch updated list of job applications

        toast('Something Went Wrong!', 'error');
        return view('admin.jobApplication', ['user' => $user, 'jobapplicationData' => $jobapplicationData])->with('error', 'Something Went Wrong!');
    }
}
public function showEditForm($ApplicationID)
{
    $user = Auth::user();
    // Find the job application by ID
    $application = JobApplication::findOrFail($ApplicationID);

    // Pass the job application data to the view
    return view('admin.editJobApplication', ['user' => $user,'application' => $application]);
}

public function editJobApplication(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
        'ContactNo' => 'required|string|max:20',
        'PositionApplied' => 'required|string|max:255',
        'JobType' => 'required|string|in:Experienced,FreshGraduate,Internship',
        'Nationality' => 'required|string|max:255',
        'DateCreate' => 'required|date_format:Y-m-d',
        'FieldOfStudy' => 'required|string',
        'UniversityInstitute' => 'required|string',
        'Qualification' => 'required|string',
        'UploadResume' => 'file|mimes:pdf|max:2048',
        // Add validation rules for other fields as needed
    ]);

    // Retrieve the job application instance from the database
    $jobApplication = JobApplication::findOrFail($request->input('ApplicationID'));


    // Handle file upload
    if ($request->hasFile('UploadResume')) {
        $file = $request->file('UploadResume');
        
        // Save file with original name
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/Resume', $fileName);

        // Update database record with new filename
        $jobApplication->UploadResume = $fileName;
    }

    // Update the job application with the new data
    
    $jobApplication->update([
        'FirstName' => $request->input('FirstName'),
        'LastName' => $request->input('LastName'),
        'Email' => $request->input('Email'),
        'ContactNo' => $request->input('ContactNo'),
        'PositionApplied' => $request->input('PositionApplied'),
        'JobType' => $request->input('JobType'),
        'Nationality' => $request->input('Nationality'),
        'DateCreate' => $request->input('DateCreate'),
        'FieldOfStudy' => $request->input('FieldOfStudy'),
        'UniversityInstitute' => $request->input('UniversityInstitute'),
        'Qualification' => $request->input('Qualification'),
        // Update other fields as needed
    ]);

    if ($jobApplication->wasChanged()) {
        // Success: Job application was updated
        toast('Job application updated successfully.', 'success');
    } else {
        // Error: Job application was not updated
        toast('Failed to update job application.', 'error');
    }

    return redirect()->route('showEditForm', ['ApplicationID' => $jobApplication->ApplicationID]);

}



    //Asset Module Start
    public function assetList()
    {
        $user = Auth::user();
    
        $assetData = DB::table('asset_list')
            ->join('category', 'asset_list.category', '=', 'category.id')
            ->join('status', 'asset_list.status', '=', 'status.id')
            ->join('brand', 'asset_list.brand', '=', 'brand.id')
            ->join('location', 'asset_list.location', '=', 'location.id')
            ->join('users', 'asset_list.checked_out_to', '=', 'users.employee_id')
            ->select('asset_list.*', 'brand.name as brand_name', 'category.name as category_name', 'status.name as status_name', 'location.name as location_name', 'users.name as employee_name')
            ->get();
    
        return view('admin/assetList')->with('user', $user)->with('assetData', $assetData);
    }
    

    

    
    public function assetAdd()
    {
        $user = Auth::user();
        $brand = Brand::all();
        $Category = category::all();
        $Status = Status::all();
        $Location = location::all();

        $UserAll = User::whereNotNull('employee_id')->get();
        
        
        return view('admin/assetAdd')
        ->with('user',$user)
        ->with('brand',$brand)
        ->with('category',$Category)
        ->with('status',$Status)
        ->with('location',$Location)
        ->with('userAll',$UserAll);
    }


    public function assetStore(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'assetTag' => 'required',
            'serialNumber' => 'required',
            'brand' => 'required',
            'modelName' => 'required',
            'category' => 'required',
            'status' => 'required',
            'checkedOutTo' => 'required',
            'location' => 'required',
            'currentMarketValue' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('admin/assetAdd') // Change this to the appropriate URL for your registration page
                ->withErrors($validator)
                ->withInput();
        }else{
            $asset = new assetList;
            $asset->asset_tag = $request->input('assetTag');
            $asset->serial = $request->input('serialNumber');
            $asset->brand = $request->input('brand');
            $asset->model = $request->input('modelName');
            $asset->category = $request->input('category');
            $asset->checked_out_to = $request->input('checkedOutTo');
            $asset->location = $request->input('location');
            $asset->current_value = $request->input('currentMarketValue');
            $asset->status = $request->input('status');
            $asset->created_at = now();
            $asset->updated_at = now();
            $asset->save();

            $user = Auth::user();
            
            $assetData = DB::table('asset_list')
                ->join('category', 'asset_list.category', '=', 'category.id')
                ->join('status', 'asset_list.status', '=', 'status.id')
                ->join('brand', 'asset_list.brand', '=', 'brand.id')
                ->join('location', 'asset_list.location', '=', 'location.id')
                ->join('users', 'asset_list.checked_out_to', '=', 'users.employee_id')
                ->select('asset_list.*', 'brand.name as brand_name' ,'category.name as category_name', 'status.name as status_name', 'location.name as location_name', 'users.name as employee_name')
                ->get();

            toast('Asset Added !','success');
            return view('admin/assetList')->with('user',$user)->with('assetData',$assetData);
        }
    }


    public function checkAssetTag(Request $request)
    {
        $assetTag = $request->input('asset_tag');

        // Check if the asset tag already exists
        $exists = assetList::where('asset_tag', $assetTag)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function checkSerialNumber(Request $request)
    {
        $serialNumber = $request->input('serial_number');

        // Check if the asset tag already exists
        $exists = assetList::where('serial', $serialNumber)->exists();

        return response()->json(['exists' => $exists]);
    }
    

    public function assetDelete($id)
    {
        assetList::where('asset_tag', $id)->delete();

        $user = Auth::user();
        $assetData = DB::table('asset_list')
                ->join('category', 'asset_list.category', '=', 'category.id')
                ->join('status', 'asset_list.status', '=', 'status.id')
                ->join('brand', 'asset_list.brand', '=', 'brand.id')
                ->join('location', 'asset_list.location', '=', 'location.id')
                ->join('users', 'asset_list.checked_out_to', '=', 'users.employee_id')
                ->select('asset_list.*', 'brand.name as brand_name' ,'category.name as category_name', 'status.name as status_name', 'location.name as location_name', 'users.name as employee_name')
                ->get();
            toast('Asset Deleted !','warning');
            return view('admin/assetList')->with('user',$user)->with('assetData',$assetData);
    }

    public function assetEdit($id){
        $asset = DB::table('asset_list')
                ->join('category', 'asset_list.category', '=', 'category.id')
                ->join('status', 'asset_list.status', '=', 'status.id')
                ->join('brand', 'asset_list.brand', '=', 'brand.id')
                ->join('location', 'asset_list.location', '=', 'location.id')
                ->join('users', 'asset_list.checked_out_to', '=', 'users.employee_id')
                ->select('asset_list.*', 'brand.name as brand_name', 'brand.id as brand_id' ,'category.name as category_name','category.id as category_id', 'status.name as status_name' ,'status.id as status_id', 'location.name as location_name', 'location.id as location_id', 'users.name as employee_name', 'users.employee_id as employee_id')
                ->where('asset_list.asset_tag',$id)
                ->get();

        $brand = Brand::all();
        $Category = category::all();
        $Status = Status::all();
        $Location = location::all();
        $UserAll = User::whereNotNull('employee_id')->get();
        
        $user = Auth::user();
        return view('admin/assetEdit')->with('user',$user)
        ->with('asset',$asset)
        ->with('brand',$brand)
        ->with('category',$Category)
        ->with('status',$Status)
        ->with('location',$Location)
        ->with('userAll',$UserAll);
    }


    public function assetEditCommit(Request $request){

        $request->validate([
            'assetTag' => 'required',
            'serialNumber' => 'required',
            'brand' => 'required',
            'modelName' => 'required',
            'category' => 'required',
            'status' => 'required',
            'checkedOutTo' => 'required',
            'location' => 'required',
            'currentMarketValue' => 'required',
        ]);
    
        $asset = assetList::where('asset_tag', $request->input('assetTag'))->first();
    
        if (!$asset) {
            // Handle the case where asset with the given tag does not exist
            return redirect('admin/assetEdit')->with('error', 'Asset not found');
        }
    
        // Check if a new image is uploaded
        if ($request->hasFile('deviceimage')) {
            $request->validate([
                'deviceimage' => 'image|mimes:jpeg,png,jpg,gif', // Validate uploaded image
            ]);
    
            // Delete old profile picture if exists
            if ($asset->device_image && file_exists(public_path($asset->device_image))) {
                unlink(public_path($asset->device_image));
            }
    
            $deviceimage = $request->file('deviceimage');
            $assetName = $asset->id . '_asset_image.' . $deviceimage->getClientOriginalExtension();
            $deviceimage->move(public_path('asset_image'), $assetName);
    
            $asset->device_image = 'asset_image/' . $assetName;
        }
    
        // Update asset details
        $asset->update([
            'serial' => $request->input('serialNumber'),
            'brand' => $request->input('brand'),
            'model' => $request->input('modelName'),
            'category' => $request->input('category'),
            'checked_out_to' => $request->input('checkedOutTo'),
            'location' => $request->input('location'),
            'current_value' => $request->input('currentMarketValue'),
            'status' => $request->input('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        if($asset->wasChanged()) {
            // Asset updated successfully
            toast('Asset Updated !', 'success');
        } else {
            // Handle the case where asset update failed
            toast('Failed to update asset', 'error');
        }
    
        $user = Auth::user();
        $assetData = DB::table('asset_list')
            ->join('category', 'asset_list.category', '=', 'category.id')
            ->join('status', 'asset_list.status', '=', 'status.id')
            ->join('brand', 'asset_list.brand', '=', 'brand.id')
            ->join('location', 'asset_list.location', '=', 'location.id')
            ->join('users', 'asset_list.checked_out_to', '=', 'users.employee_id')
            ->select('asset_list.*', 'brand.name as brand_name' ,'category.name as category_name', 'status.name as status_name', 'location.name as location_name', 'users.name as employee_name')
            ->get();
    
        return view('admin.assetList', compact('user', 'assetData'));
    }
    
    
    
    

    public function assetPrintPreview()
{
    // Fetch the authenticated user
    $user = Auth::user();
    
    // Fetch data from the asset_list table
    $asset_list = AssetList::first(); // You can adjust this query according to your needs

    // Pass the retrieved data and the user to your view
    return view('admin.assetPrintPreview', compact('user', 'asset_list'));
}




    //Setting Module Start
    public function setting()
    {
        $user = Auth::user();
        return view('admin/setting')->with('user',$user);
    }


    public function logout(Request $request): RedirectResponse
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}
