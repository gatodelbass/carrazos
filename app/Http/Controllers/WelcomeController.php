<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CityDepartment;
use App\Models\CityMunicipality;
use App\Models\Client;
use App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

class WelcomeController extends Controller
{

    public function welcome()
    {
        $clientQuantity = Client::all();

        return Inertia::render('Welcome', [
            'departments' => CityDepartment::all(),
            'clientQuantity' => $clientQuantity->count(),
        ]);
    }


    public function getMunicipalities($departmentId)
    {
        $municipalities = CityMunicipality::where('city_department_id', '=', $departmentId)->get();

        return response()->json([
            'municipalities' => $municipalities,
        ]);
    }


    public function createClient(Request $request)
    {

        $request->validate([
            'name' => "required|string|alpha|max:255",
            'lastname' => 'required|string|alpha|max:255',
            'document' => "required|integer",
            'phone' => "required|integer",
            'city_municipality_id' => 'required|integer|exists:city_municipalities,id',
            'email' => "nullable|string|email|max:100",
        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->document = $request->document;
        $client->phone = $request->phone;
        $client->city_municipality_id = $request->city_municipality_id;
        $client->email = $request->email;
        $client->save();

        $clientQuantity = Client::all();

        return response()->json([
            'clientQuantity' => $clientQuantity->count(),
        ]);
    }


    public function getRandomClient()
    {
        $randomClient = Client::all()->random();
        return response()->json([
            'randomClient' => $randomClient->load("cityMunicipality.cityDepartment"),
        ]);
    }


    public function getClientList()
    {
        return Excel::download(new ClientsExport, 'lista_clientes.xlsx');
    }
}
