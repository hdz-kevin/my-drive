<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FileController extends Controller
{
    public function myFiles()
    {
        return Inertia::render('MyFiles');
    }

    /**
     * Create a new folder.
     */
    public function createFolder(StoreFolderRequest $request)
    {
        $data = $request->validated();
        // If parent is not provided, parent will be the root folder for the currently authorized user
        $parent = $request->parent ?? $this->getRoot();

        // Create folder
        $file = new File([
            'is_folder' => true,
            'name' => $data['name'],
        ]);

        // Append file inside the parent
        $parent->appendNode($file);
    }

    /**
     * Get the root folder for the currently authorized user.
     */
    private function getRoot(): File
    {
        return File::query()->whereisRoot()->where('created_by', Auth::id())->firstOrFail();
    }
}
