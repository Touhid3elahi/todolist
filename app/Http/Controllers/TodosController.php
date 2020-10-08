<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $todos=Todo::orderby('created_at','desc')->get();
      return view('todos.index')->with('todos',$todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'text' => 'required',
                'body' => 'required',
                'due' => 'required ',

            ]);
            $todo = new Todo();

            $todo->text = $request->text;
            $todo->body = $request->body;
            $todo->due = $request->due;
            $todo->save();

            return Redirect('/')->with('success','todo created');
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
        $todo=Todo::find($id);
        return view('todos.show')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo=Todo::find($id);
        return view('todos.edit')->with('todo',$todo);
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

        $validatedData = $request->validate([
            'text' => 'required',
            'body' => 'required',
            'due' => 'required ',

        ]);
        $todo=Todo::findorfail($id);
        $todo->text = $request->text;
        $todo->body = $request->body;
        $todo->due = $request->due;
        $todo->save();
        $notification=array(
            'message'=>'Successfully update',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo=Todo::findorfail($id);
        $todo->delete();
        $notification=array(
            'message'=>'Successfully update',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
