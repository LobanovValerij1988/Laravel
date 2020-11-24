<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Block;
use App\Bloa;
class TopicController extends Controller
{
    
	public function search(Request $request)
	{
	$search=$request->searchform;
	$search='%'.$search.'%';
    $topics=Topic::where('topicname','like',$search)->get();
	return view('topic.index',['page'=>'Main Page','topics'=>$topics,'id'=>'0']);
	} 
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::all();
		$id=0;
		return view('topic.index',['page'=>'home','topics'=>$topics,'id'=>$id]);
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic=new Topic;
		return view('topic.create',['topic'=>$topic,'page'=>'AddTopic']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $rules=[
		  'topicname'=>'required|max:12',
	  ];
		$customMessage=[
			'topicname.required'=>'Поле не может быть пустым ',
			'topicname.max'=>'Field cannot be more than 12 symballs',
		];
		$this->validate($request,$rules,$customMessage);
		$topic=new Topic;
        $topic->topicname=$request->topicname;
		
      if(!$topic->save()){
		  $err=$topic->getErrors();
		  return redirect()->
			  action('TopicController@create')->with('errors',$err)->withInput();
	  }
		return redirect()->action('TopicController@create')->with('message','New topic ID '.$topic->id.' has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blocks=Block::where('topicid','=',$id)->get();         $topics=Topic::all();
	  return view('topic.index',['page'=>'Main page','topics'=>$topics, 'id'=>$id,'blocks'=>$blocks]); 
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
}
