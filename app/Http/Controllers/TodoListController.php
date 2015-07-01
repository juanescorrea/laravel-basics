<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller
{
    public function __construct(){
        $this->beforeFilter('csrf',array('on'=>['post','put']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$todo_lists = TodoList::all();
        $todo_lists = TodoList::all();
        return view('todos.index')->with('todo_lists',$todo_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // create a new list
       
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //define rules
        $rules = array(
            'title'=>array(
                'required','unique:todo_lists,name')
            );
        //pass input to validator
        $validator= Validator::make(Input::all(),$rules);

        //test if input is valid
        if ($validator->fails()){
            //$messages = $validator->messages();
            //return $messages;
            return Redirect::route('todos.create')->withErrors($validator)->withInput();
        }

        $name = Input::get('title');
        $list = new TodoList();
        $list->name = $name;
        $list->save();
        return Redirect::route('todos.index')->withMessage('List was created!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $list= TodoList::findOrFail($id);
        $items= $list->listItems()->get();
        return $items;
        return view('todos.show')->withList($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $list= TodoList::findOrFail($id);
        return view('todos.edit')->withList($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        //define rules
        $rules = array(
            'name'=>array(
                'required','unique:todo_lists')
            );
        //pass input to validator
        $validator= Validator::make(Input::all(),$rules);

        //test if input is valid
        if ($validator->fails()){
            //$messages = $validator->messages();
            //return $messages;
            return Redirect::route('todos.edit',$id)->withErrors($validator)->withInput();
        }

        $name = Input::get('name');
        $list = TodoList::findOrFail($id);
        $list->name = $name;
        $list->update();
        return Redirect::route('todos.index')->withMessage('List was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $todo_list = TodoList::findOrFail($id)->delete();
        return Redirect::route('todos.index')->withMessage('Item deleted!');
    }
}
