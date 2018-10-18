<?php

namespace App\Http\Controllers;

use App\Models\impressModel;
use App\Models\itemModel;
use App\Models\moneyTableModel;
use App\Models\ticketModel;
use App\Models\transactionModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class handleSubmit extends Controller
{
    public function submit(Request $request){

//    		return $request->thearray;
//    		return $request->thearray[1]['type'];
		if(Auth::check()){
			try{
				if($request->thearray[0]['theType'] == "Expense Ticket"){
					$ticket = ticketModel::create([
						'details'=> $request->thearray[0]['item'],
						'ticket_type'=>$request->thearray[0]['theType'],
						'created_by'=>Auth::user()->username
					]);
					$ticket->serial_number = 1000 + $ticket->id;
					$ticket->update();
					for($i=0; $i < sizeof($request->thearray);$i++)
					{
						itemModel::create([
							'ticket_id'  => $ticket->id + 1000,
							'details'    => $request->thearray[$i]['item'],
							'quantity'   => $request->thearray[$i]['qty'],
							'unit_price' => $request->thearray[$i]['amount'],
							'total'      => $request->thearray[$i]['total']
						]);
					}
					return "go to home";
				}else if($request->thearray[0]['theType'] == "Fuel Ticket")
				{
					$ticket = ticketModel::create([
						'details'       => $request->thearray[0]['item'],
						'ticket_type'   => $request->thearray[0]['theType'],
						'created_by'    => Auth::user()->username
					]);
					$ticket->serial_number = 1000 + $ticket->id;
					$ticket->update();
//					for ($i = 1; $i == sizeof($request->thearray); $i++){
						itemModel::create([
							'ticket_id' => $ticket->id + 1000,
							'details'   => $request->thearray[0]['item'],
							'total'     => $request->thearray[0]['total']
						]);
//					}
					return "go to home";
				}
			}catch (\Exception $e){
				return $e->getMessage();
			}
		}else{
			Session::put('message', 'Please Login again');
			return redirect('/');
		}

    }

    public function editTicket($id){
    	if(Auth::user()){
		    $t = ticketModel::where('serial_number',$id)->where('created_by', Auth::user()->username)->get();
		    $l = [];
		    foreach ($t as $ta){
			    array_push($l, $ta->serial_number);
		    }
		    if(in_array($id, $l)){
			    $items = itemModel::where('ticket_id', $id)->get();
			    if(sizeof($items) !== 0){
				    $ticket = ticketModel::where('serial_number', $items[0]->ticket_id)->first();
				    $type = $ticket->ticket_type;
				    return view('pages.editTicket')->with(['items'=>$items, 'type'=>$type, 'ticket'=>$ticket]);
			    }else{
				    \Session::put('message', 'Ticket is empty please delete the ticket!');
				    return redirect('/home');
			    }

		    }else{
			    return view('pages.error');
		    }
	    }else{
    		Auth::logout();
    		return redirect('/');
	    }
    }

    public function  editIt(Request $request){
	    if(Auth::user()){
//	    	return $request->thearray[0]['theType'];
		    if($request->thearray[0]['theType'] == "Expense Ticket")
		    {
				itemModel::where('ticket_id', $request->thearray[0]['ticketId'])->delete();
			    for ($i = 0; $i < sizeof($request->thearray); $i++){
			    itemModel::create([
				    'ticket_id'  => $request->thearray[$i]['ticketId'],
				    'details'    => $request->thearray[$i]['item'],
				    'quantity'   => $request->thearray[$i]['qty'],
				    'unit_price' => $request->thearray[$i]['amount'],
				    'total'      => $request->thearray[$i]['total']
			    ]);
			    }
			    return "go to home";
		    }else if($request->thearray[0]['theType'] == "Fuel Ticket"){
		    	try{
				    for ($i = 0; $i < sizeof($request->thearray); $i++){
					    itemModel::where('ticket_id', $request->thearray[0]['ticketId'])->delete();
					    itemModel::create([
						    'ticket_id' => $request->thearray[$i]['ticketId'],
						    'details'   => $request->thearray[$i]['item'],
						    'total'     => $request->thearray[$i]['total']
					    ]);
				    }
				    return "go to home";
			    }catch(\Exception $e){
				    return $e->getMessage();
			    }

		    }
	    }else{
		    Auth::logout();
		    return "Logout";
	    }
    }

    public function deleteSingle(Request $request){
//    	return $request;
    	if(Auth::check()){
    		try{
				    itemModel::where('id', $request->id)->delete();
				    return "deleted";

		    }catch (\Exception $e){
    			return $e->getMessage();
		    }


	    }else{
		    Auth::logout();
		    return redirect('/');
	    }
    }

    public function deleteTicket($id){
    	try{
    		ticketModel::where('serial_number', $id)->delete();
    		itemModel::where('ticket_id', $id)->delete();
		    \Session::put('info', 'Deleted Ticket');
    		return redirect()->back();
	    }catch (\Exception $e){
		    \Session::put('message', 'Error in Connection');
		    return $e->getMessage();
	    }
	}

	public function appproveT(Request $request){
    	return $request;
		if(Auth::user()){
			try{
				$ticket = ticketModel::where('serial_number', '=', $request->id)->first();
				$ticket->approval_status = 1;
				$ticket->update();
				return  "updated";
			}catch (\Exception $e){
				return $e->getMessage();
			}

		}else{
			//\Session::put('message', 'You not authorised');
			return "logout";
		}
	}

	Public function impress(){
		if(Auth::user()){
			$impress= impressModel::latest('updated_at')->limit(5)->get();
			 $money = moneyTableModel::get();
			return view('pages.dispenseImpress')->with(['impress'=>$impress, 'money'=>$money]);
		}else{
			Auth::logout();
			return redirect('/');
		}
	}

	Public function  fetchAdmins(){
		if(Auth::user()){
		return $subadmin = User::where('role', "SubAdmin")->get();
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public function addfund(Request $request){
		if(Auth::user()){
			if(Hash::check($request->p, Auth::user()->password)){
			try{
				$money = moneyTableModel::all();
				if($money->isEmpty()){
					moneyTableModel::create([
						'amount'=> $request->amt
					]);
//					if($money !== [] && $money !== null)
				}else{
					$prevmoney = moneyTableModel::where('id', 1)->first();
					$prevmoney->amount = $prevmoney->amount + $request->amt;
					$prevmoney->update();
				}
				impressModel::create([
					'amount'=>$request->amt,
					'to'=>$request->who,
					'sent_by'=> Auth::user()->username
				]);
				return "Added";
			}catch (\Exception $e){
				return $e->getMessage();
			}
			}else{
				return "incorrect";
			}
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public  function  findtransaction(Request $request){
		if(Auth::user()){
			try{
				$transresult = impressModel::where('updated_at', 'LIKE', '%'.$request->from.'%')->orWhere('updated_at', 'LIKE', '%'.$request->to.'%')->orderBy('id', 'DESC')->get();
				return $transresult;
			}catch (\Exception $e){
				return $e->getMessage();
			}
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public function cpass(Request $request){
		if(Auth::user()){
			try{
				$user = User::where('id', $request->userid)->first();
				$user->first_name = $request->fname;
				$user->last_name = $request->lname;
				$user->username = $request->uname;
				$user->role = $request->role;
				$user->branch = $request->bracnch;
				$user->update();
				return "success";

			}catch (\Exception $e){
				return "error";
			}
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public  function  deleteUser(Request $request){
		if(Auth::user()){
			try{
				User::where('id', $request->uid)->delete();

				return "success";

			}catch (\Exception $e){
				return "error";
			}
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public function record_activity(){
		if(Auth::user()){
			try{
				$trans = transactionModel::get();
				return view('pages.dailyactivity')->with(['trans'=>$trans]);
			}catch (\Exception $e){
				return "error";
			}
		}else{
			Auth::logout();
			return 'logout';
		}
	}

	public  function addpayment(Request $request){
		if(Auth::user()){
			try{
				transactionModel::create([
					'purpose'=>$request->purpose,
					'amount_received'=>$request->amt,
					'received_by'=>Auth::user()->username,
					'branch'=>$request->branch
				]);
				\Session::put('info', 'Payment succesfully added');
				return redirect()->back();
			}catch (\Exception $e){
				\Session::put('message', 'Error in connection');
				return redirect()->back();
			}
		}else{
			Auth::logout();
			\Session::put('message', 'Timed out!, please login again');
			return redirect('/')->back();
		}
	}
}
