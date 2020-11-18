<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Bookmark;
use Auth;
use Illuminate\Support\Str;

class BookmarkController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $get_url = $request->bookmark_url;
        $get_collection_id = $request->collection_id;

        //
        $collection = Collection::find($get_collection_id);
        $this->authorize('view', $collection);

        //
        function cURL($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;

        }

        function getTargetDatas($url) {
            $page = cURL($url);

            $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
            //$description = preg_match('/<meta name="DESCRIPTION" content="(.*?)"[^>]*>/ims', $page, $match) ? $match[1] : null;

            if (empty($title)) {
                $title = $url;
            }

            /*if (empty($description)) {
                $description = "null";
            }*/
            $response = "title=$title&description=null";

            return $response;
        }

        parse_str(getTargetDatas($get_url), $get_data);
        
      
        $get_title = Str::limit($get_data['title'], 86);
        $get_description = $get_data['description'];
        $get_user_id = Auth::user()->id;
        
        //
        $bookmark = new Bookmark;
        $bookmark->name = $get_title;
        $bookmark->url = $get_url;
        $bookmark->description = $get_description;
        $bookmark->collection_id = $get_collection_id;
        $bookmark->user_id = $get_user_id;
        $bookmark->save();

        //
        $user_bookmark_return = Auth::user()->bookmark_return;

        if ($user_bookmark_return == 0) {
            return redirect()->back();
        } if ($user_bookmark_return == 1) {
            return redirect()->action(
                'BookmarkController@edit', ['id' => $bookmark->id]
            );
        }        
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
        $bookmark = Bookmark::find($id);
        $this->authorize('view', $bookmark);

        //
        return view('dashboard.bookmark_edit')->with('bookmark', $bookmark);
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
        $validatedData = [
            'bookmark_title' => 'required',
            //'bookmark_description' => 'required',
            'bookmark_url' => 'required',
        ];

        $customMessages = [
            'required' => 'This field cannot be blank.',
        ];
        $this->validate($request, $validatedData, $customMessages);

        //
        $bookmark = Bookmark::find($id);
        $this->authorize('update', $bookmark);

        //
        $get_title = Str::limit($request->bookmark_title, 86);
        $get_url = $request->bookmark_url;
        //$get_description = $request->bookmark_description;

        //
        $bookmark->name = $get_title;
        $bookmark->url = $get_url;
        //$bookmark->description = $get_description;
        $bookmark->save();

        //
        return redirect()->back()->withSuccess('The changes have been saved.');
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
        $bookmark = Bookmark::find($id);
        $this->authorize('delete', $bookmark);

        //
        $bookmark->delete();

        //
        return redirect()->back();
    }
}
