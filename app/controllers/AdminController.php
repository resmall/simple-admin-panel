<?php



class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$all_content = Content::paginate(5);
		return View::make('admin.index')->with('all_content', $all_content);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.content.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array_merge(Content::$rules, Image::rules());
		$validation = Validator::make(Input::all(), $rules);

		if ($validation->passes()) {
			if (Input::hasFile('featured_image')) {
			    $file = Input::file('featured_image');
				if ($file->isValid()) {
				    $file->move(__DIR__.'/storage/', $file->getClientOriginalName()); //($destinationPath, $fileName);
				}
			}

			$content = new Content;
			$content->page_title = Input::get('page_title');
			$content->page_content = Input::get('page_content');
			$content->save();

			return Redirect::route('create')
				->with('success', 'Registro criado com sucesso');
		}

		/* metodo alternativo */
		// return Redirect::route('create')
		// 	->withInput(Input::except('password','re_password'))
		// 	->with('error', $validation->errors()->first());

		return Redirect::route('create')
			->withInput(Input::all())
			->withErrors($validation);
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
