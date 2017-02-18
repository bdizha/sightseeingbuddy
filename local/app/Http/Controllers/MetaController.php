<?php

namespace App\Http\Controllers;
use App\Page;

class MetaController extends Controller {

    public function show($slug) {
        
        $this->setMetaLinks();
        
        $page = Page::where('slug', '=', $slug)
                ->first();
        
        return view('page.show', ['page' => $page, 'links' => $this->metaLinks]);
    }

}
