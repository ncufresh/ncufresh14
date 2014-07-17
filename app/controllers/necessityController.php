<?php

class necessityController extends BaseController
{  
	//取得資料庫資料
	public function index()
	{
		App::make('SiteMap')->pushLocation('新生必讀', route('necessity.necessity_index'));

		return View::make('necessity.necessity_index',array(/*參數*/
			'necessityResearchData'=>/*model*/NecessityResearchData::all(),
			'necessityFreshmanData'=>/*model*/NecessityFreshmanData::all(),
			'necessityDownloadData'=>/*model*/NecessityDownloadData::all()));
	}


//*******************************************************************//
//freshman後台的controller

	//取得資料庫資料
	public function index_backstage_freshman()
	{
		return View::make('necessity.necessity_backstage_freshman',array(/*參數*/'FreshmanData'=>/*model*/NecessityFreshmanData::all()));
	}

	//新增資料進去資料庫
	public function freshman_add(){

		$user = new NecessityFreshmanData;
		$user->item = Input::get('item');
		$user->explanation = Input::get('explanation');
		$user->organizer = Input::get('organizer');
		$user->save();

		return Redirect::route('necessity.necessity_backstage_freshman');
	}

	//從資料庫裏面刪除資料
	public function freshman_delete(){
		
		$user = NecessityFreshmanData::where('id', '=', Input::get('ID'))->delete();

		return Redirect::route('necessity.necessity_backstage_freshman');
	}

	 //從資料庫裡面更改資料
	public function editA($id){

    $data = NecessityFreshmanData::find($id);
	
	return View::make('necessity.necessity_backstage_freshman_edit',array('necessityEdition'=>$data));
	}

	public function freshman_edit(){

		$id = Input::get('id');
		if(Input::has('id'))
		{

		$data = NecessityFreshmanData::where('id', '=',$id)->first();;	  
		$data->item = Input::get('item');
		$data->explanation= Input::get('explanation');
		$data->organizer= Input::get('organizer');
		$data->save();

		}

		return Redirect::route('necessity.necessity_backstage_freshman');
	}


//*******************************************************************//
//research後台的controller

	public function index_backstage_research()
	{
		return View::make('necessity.necessity_backstage_research',array(/*參數*/'ResearchData'=>/*model*/NecessityResearchData::all()));
	}

	public function research_add(){

		$user = new NecessityResearchData; 	  
		$user->item = Input::get('item');
		$user->explanation= Input::get('explanation');
		$user->organizer= Input::get('organizer');
		$user->save();

		return Redirect::route('necessity.necessity_backstage_research');
	}

	//從資料庫裏面刪除資料
	public function research_delete(){
		
		$user = NecessityResearchData::where('id', '=', Input::get('ID'))->delete();

		return Redirect::route('necessity.necessity_backstage_research');
	}
    

    //從資料庫裡面更改資料
	public function edit($id){

    $data = NecessityResearchData::find($id);
	
	return View::make('necessity.necessity_backstage_research_edit',array('necessityEdition'=>$data));
	}

	public function research_edit(){

		$id = Input::get('id');
		if(Input::has('id'))
		{

		$data = NecessityResearchData::where('id', '=',$id)->first();;	  
		$data->item = Input::get('item');
		$data->explanation= Input::get('explanation');
		$data->organizer= Input::get('organizer');
		$data->save();

		}

		return Redirect::route('necessity.necessity_backstage_research');
	}



//*******************************************************************//
//download後台的controller

	public function index_backstage_download()
	{
		return View::make('necessity.necessity_backstage_download',array(/*參數*/'DownloadData'=>/*model*/NecessityDownloadData::all()));
	}

	public function download_add(){

		$user = new NecessityDownloadData; 	  
		$user->name = Input::get('downloadname');
		
		// if(Input::hasFile('file')){
		// 	return "yES";
		// }else{
		// 	return 'no';
		// }
		
		$file = Input::file('File');
		$fileid = $file -> getClientOriginalName();
		$extension = $file ->getClientOriginalExtension();

		$fileName = str_random(64);
		$fileName = $fileName.'.'.$extension;

		$user->fileid = $fileid;
		$user->save();

		$file -> move(public_path('necessityfile'), $fileName);

		return Redirect::route('necessity.necessity_backstage_download');
	}
	
	public function returnDownload( )
	{
		return Response::download('necessityfile/123456.txt');
	}





	/**更改資料**/

	public function editC($id){

    $data = NecessityDownloadData::find($id);
	
	return View::make('necessity.necessity_backstage_download_edit',array('necessityEdition'=>$data));
	}
	
	public function download_edit(){
	
	// NO
		
	}
//*******************************************************************//
//後台的編輯區

	public function index_backstage_research_edit()
	{
		return View::make('necessity.necessity_backstage_research_edit',array(/*參數*/
			'ResearchData'=>/*model*/NecessityResearchData::all()
			));
	}


}



/*************************************************************************************************************************************************/
