<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sliders/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Slider';

        return view('sliders/create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**
         * validating process
        */
        $request->validate([
            'image_feature' => 'image|mimes:jpeg,png,jpg|max:2048',
            // 'image_slider' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        /**
         * image slider process
        */
        $image_slider = '';


    dd('end of image slider');
        /**
         * image feature process
         */
        $image_feature = '';

        if($request->hasFile('image_feature')){
            $image_feature = self::imgValidate($request);

            dd($image_feature);

            Slider::create([
                'key' => 'image_feature',
                'value' => json_encode($image_feature)
            ]);
        }

        dd('end');

        // return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private static function imgValidate($request){
        $file = $request->file('image_feature');
        if($file->isValid()){
            $image['name'] = $file->getClientOriginalName();
            $image['just_name'] = pathinfo($image['name'], PATHINFO_FILENAME);
            $image['slug_name'] = str_replace(' ', '-', strtolower($image['just_name']));
            $image['extension'] = $file->getClientOriginalExtension();
            $image['real_path'] = $file->getRealPath();
            $image['size'] = $file->getSize();
            $image['mime_type'] = $file->getMimeType();
            $image['original_name'] = $file->getClientOriginalName();

            // define upload path folder
            $destination = '/upload/'.date('Y').'/'.date('m');
            $img_upload_name = $image['slug_name'].'.'.$image['extension'];
            if (Storage::exists('/public'.$destination.'/'.$img_upload_name)) {
                $i = 1;
                while (Storage::exists('/public'.$destination.'/'.$img_upload_name)) {
                    $img_upload_name = $image['slug_name'].'-'.$i.'.'.$image['extension'];
                    $i++;
                }
            }

            // image upload processing
            $request->image_feature->storeAs(
                '/public'.$destination,
                $img_upload_name
            );

            $image['url'] = $destination.'/'.$img_upload_name;

            return $image;
        }
    }

}
