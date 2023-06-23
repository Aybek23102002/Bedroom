<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Bedroom;
use App\Models\Floor;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    
    public function index()
    {
        return response([
            'sections'=>SectionResource::collection(Section::get())
        ]);
    }

    
    public function store(StoreSectionRequest $request)
    {
        $bedroom = Bedroom::find($request->bedroom_id);
        $floor = Floor::find($request->floor_id);
        if($bedroom['section_status'] && $floor['bedroom_id'] == $bedroom['id'])
        {

            Section::create($request->validated());

            return response([
                'message'=>'created'
            ]);

        }

        else
        {
            return response([
                'message'=>'there is no sectional in this bedroom'
            ]);
        }

        
    }

    
    public function show(Section $section)
    {
        return response([
            'message'=>'one section',
            'section'=>SectionResource::make($section)
        ]);
    }

    
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $bedroom = Bedroom::find($request->bedroom_id);
        $floor = Floor::find($request->floor_id);
        if($bedroom['section_status'] && $floor['bedroom_id'] == $bedroom['id'])
        {
            $section->update($request->validated());

            return response([
                'message'=>'updated'
            ]);
        }
        else
        {
            return response([
                'message'=>'there is no sectional in this bedroom'
            ]);
        }
    }

    
    public function destroy(Section $section)
    {
        $section->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
