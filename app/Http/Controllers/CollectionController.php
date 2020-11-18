<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Bookmark;
use Auth;
use Illuminate\Support\Str;

class CollectionController extends Controller
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
		$collection = new Collection;
		$user_id = Auth::user()->id;

		$collection->name = Str::limit($request->collection_name, 28);
		$collection->user_id = $user_id;
		$collection->save();

		//
		return redirect()->action(
			'CollectionController@show', ['id' => $collection->id]
		);
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
		$user_id = Auth::user()->id;
		$user_bookmark_per_page = Auth::user()->bookmark_per_page;

		//
		$collection = Collection::find($id);
		$this->authorize('view', $collection);

		//
		$bookmarks = Bookmark::where('collection_id', $id)
		->orderBy('created_at', 'DESC')
		->paginate($user_bookmark_per_page);

		//
		return view('dashboard.collection')
		->with('bookmarks', $bookmarks)
		->with('collection', $collection);
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
		$collection = Collection::find($id);
		$this->authorize('view', $collection);

		//
		return view('dashboard.collection_edit')->with('collection', $collection);
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
			'collection_title' => 'required',
		];

		$customMessages = [
			'required' => 'This field cannot be blank.',
		];
		$this->validate($request, $validatedData, $customMessages);
		
		//
		$collection = Collection::find($id);
		$this->authorize('update', $collection);

		//
		$get_title = $request->collection_title;

		//
		$collection->name = Str::limit($get_title, 28);
		$collection->save();

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
		$collection = Collection::find($id);
		$this->authorize('delete', $collection);

		//
		$collection->delete();
		Bookmark::where('collection_id', $id)->delete();

		//
		return redirect('/');
	}
}