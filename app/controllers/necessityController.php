<?php

class necessityController extends BaseController
{  
	//取得資料庫資料
	public function index()
	{
		return Redirect::route('necessity.necessity_indexItem', array('item' => 'research'));
	}

	public function indexItem($item)
	{
		App::make('SiteMap')->pushLocation('新生必讀', route('necessity.necessity_index'));

		App::make('TransferData')->addData('necessity-target', $item);


		return View::make('necessity.necessity_index',array(
			'necessityResearchData'=>NecessityResearchData::all(),
			'necessityFreshmanData'=>NecessityFreshmanData::all(),
			'necessityDownloadData'=>NecessityDownloadData::all()));

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
		$user = NecessityResearchData::where('id', '=', Input::get('ID'))->delete();

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
		// $fileType = $file -> getMimeType();
		$extension = $file ->getClientOriginalExtension();
		$extension = strtolower($extension);

		$fileName = str_random(5);
		$fileName = $fileName.'.'.$extension;

		$user->fileid = $fileid;
		$user->contentType = $extension;
		$user->machineName = $fileName;
		$user->save();

		$file -> move(public_path('necessityfile'), $fileName);

		return Redirect::route('necessity.necessity_backstage_download');
	}
	


	public function returnDownload($id)
	{

		$data = NecessityDownloadData::find($id);
		$contentType = $data -> contentType;
		$machineName = $data -> machineName;
		
		if( $contentType == 'pdf' )
		{
			$headers = array(
              'Content-Type: application/pdf',
            );	
        }
        else if( $contentType == 'doc' || $contentType == 'docx')
        {
        	$headers = array(
              'Content-Type: application/doc',
            );	
        }
        else
        {
        	$headers = array(
              'Content-Type: application/txt',
            );	
        }



		$file = public_path(). "/necessityfile/$machineName";
		$downloadFilename = $data -> name;

		return Response::download($file,$downloadFilename,$headers);
	}

	// 從資料庫裏面刪除資料
	
	public function download_delete(){
		
		$user = NecessityDownloadData::where('id', '=', Input::get('ID'))->delete();

		return Redirect::route('necessity.necessity_backstage_download');
	}



	// 更改資料

	public function editC($id){

    $data = NecessityDownloadData::find($id);
	
	return View::make('necessity.necessity_backstage_download_edit',array('necessityEdition'=>$data));
	
	}
	
	public function download_edit(){
		
		$id = Input::get('id');
		if(Input::has('id'))
		{

		$data = NecessityDownloadData::where('id', '=',$id)->first();;	  
		$data->name = Input::get('name');
		$data->save();

		}

		return Redirect::route('necessity.necessity_backstage_download');
	
	}	

}




