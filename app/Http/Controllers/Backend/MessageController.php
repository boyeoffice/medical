<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Conversation;
use App\Message;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        $model = User::all();
        return response()->json($model);
    }
    public function getChat()
    {
       // $chat = Message::where('');
    }
    public function total_message()
    {
        $total = Message::where('to_user_id', Auth::id())->where('status', 'new')->count();
        return $total;
    }
    public function inbox()
    {
        $inbox = Conversation::where('user_1', Auth::id())
        ->orWhere('user_2', Auth::id())->get(); 
        return $inbox;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Insert new conversation
        //$time = date( 'Y-m-d H:i:s', time() );
        $conversation = new Conversation;
        $conversation->user_1 = Auth::id();
        $conversation->user_2 = $request->user_id;

        // Verify if conversation exist
        $data = Conversation::where('user_1', Auth::user()->id)
                        ->where('user_2', $request->user_id)
                        ->orWhere('user_1', $request->user_id)
                        ->where('user_2', Auth::user()->id)->first();
        if( !empty($data)){
           // $data->updated_at = $time;
            $data->update();
            $conversationID = $data->id;

            $message = new Message;
            $message->conversation_id = $conversationID;
            $message->from_user_id = Auth::id();
            $message->to_user_id = $request->user_id;
            $message->message = $request->message;
           // $message->updated_at = $time;
            $message->save();
            return response()->json(['success' => true]);
        }else{
            //$conversation->updated_at = $time;
            $conversation->save();
            $conversationID = $conversation->id;

            $message = new Message;
            $message->conversation_id = $conversationID;
            $message->from_user_id = Auth::id();
            $message->to_user_id = $request->user_id;
            $message->message = $request->message;
           // $message->updated_at = $time;
            $message->save();
            return response()->json(['success' => true]);
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
        $data = Message::where('to_user_id', Auth::id())
                ->where('from_user_id', $id)
                ->orWhere('from_user_id', Auth::id())
                ->where('to_user_id', $id)->get();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->conversation_id;
        $messages = Message::where('status', 'new')
        ->where('to_user_id', Auth::id())
        ->where('conversation_id', $id)->get();
        foreach ($messages as $message) {
           $message->status = 'readed';
            $message->update();
        }
        return response()->json($messages);
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
