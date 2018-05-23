<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Auth;
use App\User;
use App\Message;
use App\Conversation;

class MessageController extends Controller
{
    public function getUser()
    {
    	$user = User::all();
        return $user;
    }
    public function inbox()
    {
    	$inbox = Conversation::where('user_1', Auth::id())
    	->orWhere('user_2', Auth::id())->get();
    	return $inbox;
    }
    public function postSend(Request $request)
    {
    	$this->validate($request, ['message' => 'required']);
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
    public function getChat(Request $request)
    {
    	$id = $request->id;
    	$data = Message::where('to_user_id', Auth::id())
                ->where('from_user_id', $id)
                ->orWhere('from_user_id', Auth::id())
                ->where('to_user_id', $id)->get();
        return response()->json($data);
    }
}
