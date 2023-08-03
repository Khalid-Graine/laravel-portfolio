<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServicesController extends Controller
{
    private const Duration = '1';

    public function services()
    {

        $services = Cache::remember('Services', self::Duration, function ()  {
            return Service::latest()->paginate(4);
        });
        return view('frontend.pages.services', compact('services'));
    }

    public function service_details($id)
    {

        $service = Cache::remember('Services_'.$id, self::Duration, function () use($id) {
            return Service::findOrFail($id);
        });
        return view('frontend.pages.service_details', compact('service'));
    }

    public function all()
    {

        $Services = Cache::remember('Services', self::Duration, function () {
            return Service::all();
        });
        return view('backend.services.services_all', compact('Services'));
    }

    public function index()
    {
        return view('backend.services.new_service');
    }

    public function store(Request $request)
    {

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = 'upload/services/icons/services_light_icon01.png';

        if ($request->hasFile('image')) {
            $path = 'upload/services';
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            $service->image = $path . '/' . $fileName;
        }

        $service->save();


        $notification = array(
            'message' => 'you have created new service successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('service.all')->with($notification);
    }
    public function edit($id)
    {
        $Service = Service::findorfail($id);
        return view('backend.services.edit', compact('Service'));
    }

    public function update(Request $request)
    {
        $service = Service::findorfail($request->id);
        Cache::forget('service_'.$request->id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = 'upload/services/icons/services_light_icon01.png';

        if ($request->hasFile('image')) {
            $path = 'upload/services';
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            $service->image = $path . '/' . $fileName;
        }

        $service->save();

        $notification = array(
            'message' => 'you have updated the  service successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('service.all')->with($notification);
    }



    public function destroy($id)
    {
        $Service = Service::findorfail($id);
        $Service->delete();
        Cache::forget('service_'.$id);


        $notification = array(
            'message' => 'you have deleted a  service successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('service.all')->with($notification);
    }
}
