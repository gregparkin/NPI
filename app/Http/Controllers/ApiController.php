<?php

namespace App\Http\Controllers;

use App\Models\npi_backend;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getNPI($id) {
        $resp = npi_backend::get()->toJson(JSON_PRETTY_PRINT);
        return response($resp, 200);
    }
}
