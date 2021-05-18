<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menu_Role;
use App\Models\Menu_Type;
use App\Models\User;
use App\Models\User_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    protected $data = [];
    protected function __construct()
    {

        try {
            $this->data['menuLinks'] = $this->getLinks();
            $this->data['social_links'] = Menu::with('type')
                ->where('deleted_at', null)
                ->get();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
        }

    }
    public function getLinks()
    {
        return Menu::with('roles', 'type')->where("deleted_at", null)->orderBy('order')->get();
    }
}
