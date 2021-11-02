<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show(Document $document): View
    {
        return view('admin.documents.show', $document);
    }
}
