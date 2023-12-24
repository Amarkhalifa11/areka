<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Auth;

class ServiceController extends Controller
{

    public function all_service_api()
    {
        $service = Service::all();
        return response()->json($service, 200);
    }

    public function all_service()
    {
        $services = Service::all();
        return view('backend.service.all_service' , compact('services'));
    }
    public function create()
    {
        return view('backend.service.add_service');
    }

    public function store(StoreServiceRequest $request)
    {
        $title    = $request->title;
        $icon     = $request->icon;
        $desc     = $request->desc;
        $user_id  = Auth::user()->id;

        $services = Service::create([
            'title'   => $title,
            'icon'    => $icon,
            'desc'    => $desc,
            'user_id' => $user_id,
        ]);

        return redirect()->route('dashboard.service.all_service')->with('message' , 'the service is added succ');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('backend.service.edit_service' , compact('service'));
        // dd($service);
    }

    public function update(UpdateServiceRequest $request,  $id)
    {
        $title    = $request->title;
        $icon     = $request->icon;
        $desc     = $request->desc;
        $user_id  = Auth::user()->id;

        $service = Service::find($id);
        $service->update([
            'title'   => $title,
            'icon'    => $icon,
            'desc'    => $desc,
            'user_id' => $user_id,
        ]);

        return redirect()->route('dashboard.service.all_service')->with('message' , 'the service is update succ');

    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('dashboard.service.all_service')->with('message' , 'the service is delete succ');

    }
}
