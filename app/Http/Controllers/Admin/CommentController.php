<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Comment;


class CommentController extends Controller
{
	public function __construct(Comment $comment,Account $account)
	{
		$this->comment = $comment;
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$comments = $this->comment->getAll();
    	return view('admin.comment.index', compact('comments', 'getAdmin'));
    }
}
