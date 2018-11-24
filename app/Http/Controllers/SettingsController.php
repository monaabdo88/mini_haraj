<?php
namespace App\Http\Controllers;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::findOrfail(1);
        return view('admin.settings.index')->with('settings',$settings);
    }
    public function update(Request $request)
    {
        $this->validate($request,[
           'site_name'      => 'required|min:3',
           'site_mail'      => 'required|email',
           'site_phone'     => 'required',
           'site_facebook'  => 'required',
           'site_twitter'   => 'required',
           'site_git'       => 'required',
           'site_linkedin'  => 'required',
           'site_desc'      => 'required',
           'site_tags'      => 'required',
           'site_status'    => 'required',
           'site_close'     => 'required',
           'site_copyright' => 'required',
           'site_logo'      => 'required|image|mimes:jpg,png,jpeg,gif|max:1000',
       ]);
        if($request->hasFile('site_logo')) {
            $logo = $request->site_logo;
            $logo_new = time() . '_' . $logo->getClientOriginalName();
            $logo->move('uploads', $logo_new);
        }
        $data = [
            'site_name'      => $request->site_name,
            'site_mail'      => $request->site_mail,
            'site_phone'     => $request->site_phone,
            'site_facebook'  => $request->site_facebook,
            'site_twitter'   => $request->site_twitter,
            'site_git'       => $request->site_git,
            'site_linkedin'  => $request->site_linkedin,
            'site_desc'      => $request->site_desc,
            'site_tags'      => $request->site_tags,
            'site_status'    => $request->site_status,
            'site_close'     => $request->site_close,
            'site_copyright' => $request->site_copyright,
            'site_logo'      => $logo_new,
        ];
        $setting = Settings::where('id',1)->update($data);
        Session::flash('success','Site Settings Updated Successfully');
        return redirect()->back();
    }
}
