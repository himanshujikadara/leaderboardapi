<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('points','desc')->get();
        if(count($members)>0)
            return response()->json($members,200);
        else
            return response()->json(['message'=>'sorry, user not found!'],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('name'=>'required','age'=>'required|numeric','address'=>'required');
        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],200);
        } else{
            $member = new Member;
            $member->name = $request->name;
            $member->age = $request->age;
            $member->address= $request->address;
            $member->points = 0;
            $result = $member->save();
            if($result)
                return response()->json(['message'=>'great, user added successfully!'],200);
            else
                return response()->json(['message'=>'sorry, operation failed!'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        if($id!==null){
            $member = Member::find($id);
            if(is_object($member) && $member->id)
                return response()->json($member,200);
            else
                return response()->json(['message'=>'sorry, user not found!'],200);
        }else{
            return response()->json(['message'=>'id is required!'],200);
        }

    }

    
    /**
     * Update the specified resource in storage with plus point.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function plus(Request $request)
    {
        $rules = array('id'=>'required|numeric');
        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],200);
        } else{
            $member = Member::find($request->id);
            if(is_object($member) && $member->id){
                $member->points++;
                $result = $member->save();
                if($result)
                    return $this->index();
                else
                    return response()->json(['message'=>'sorry, operation failed!'],200);
            }
            else
                return response()->json(['message'=>'sorry, user not found!'],200);
        }
    }

    /**
     * Update the specified resource in storage with minus point.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function minus(Request $request)
    {
        $rules = array('id'=>'required|numeric');
        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],200);
        } else{
            $member = Member::find($request->id);
            if(is_object($member) && $member->id){
                $member->points--;
                $result = $member->save();
                if($result)
                    return $this->index();
                else
                    return response()->json(['message'=>'sorry, operation failed!'],200);
            }
            else
                return response()->json(['message'=>'sorry, user not found!'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        if($id!==null){
            $member = Member::find($id);
            if(is_object($member) && $member->id){
                $result = $member->delete();
                if($result)
                    return response()->json(['message'=>'great, user deleted successfully!'],200);
                else
                    return response()->json(['message'=>'sorry, operation failed!'],200);
            }
            else
                return response()->json(['message'=>'sorry, user not found!'],200);
        }else{
            return response()->json(['message'=>'id is required!'],200);
        }

    }
}
