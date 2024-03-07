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
        $profile = Profile::where('user_id',$userID)->first();


        return view('admin/profileEdit')->with('user',$user)->with('profile',$profile);
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
        ->select('asset_list.*', 'brand.name as brand_name' ,'category.name as category_name', 'status.name as status_name', 'location.name as location_name', 'users.name as employee_name')
        ->get();


        return view('admin/assetList')->with('user',$user)->with('assetData',$assetData);
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
            return redirect('admin/assetEdit') // Change this to the appropriate URL for your page
                ->withErrors($validator)
                ->withInput();
        }else{
            $id = assetList::where('asset_tag', $request->input('assetTag'))->value('id');
            $asset = assetList::find($id);
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
            $commit = $asset->save();
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
        if($commit){
            toast('Asset Updated !','success');
            return view('admin/assetList')->with('user',$user)->with('assetData',$assetData);
        }else{
            toast('Something went wrong','warning');
            return view('admin/assetList')->with('user',$user)->with('assetData',$assetData);
        }
    }


    public function assetPrintPreview()
    {
        $user = Auth::user();
        return view('admin/assetPrintPreview')->with('user',$user);
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
