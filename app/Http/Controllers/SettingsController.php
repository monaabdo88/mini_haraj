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
           'site_subaddress'=> 'required',
           'site_address'   => 'required',
           'site_desc'      => 'required',
           'site_tags'      => 'required',
           'site_status'    => 'required',
           'site_close'     => 'required',
        ]);

        $data = [
            'site_name'      => $request->site_name,
            'site_mail'      => $request->site_mail,
            'site_phone'     => $request->site_phone,
            'site_address'   => $request->site_address,
            'site_subaddress'=> $request->site_subaddress,
            'site_desc'      => $request->site_desc,
            'site_tags'      => $request->site_tags,
            'site_status'    => $request->site_status,
            'site_close'     => $request->site_close,
        ];
        $setting = Settings::where('id',1)->update($data);
        Session::flash('success','Site Settings Updated Successfully');
        return redirect()->back();
    }
}
