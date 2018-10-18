<?php

namespace App\Http\Controllers;

use App\Models\downloadModel;
use App\Models\fileUploadModel;
use App\User;
use \Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;


class masterController extends Controller
{
    Public function submitMessage(Request $request){
    	try{
		    $headers= "From:". $request->email;

		    if(mail('info@harvestplusng.org', $request->subject, $request->message, $headers)){
			    return "Thanks for reaching out, we'll get back to you shortly";
		    }else{
			    return "We can't sent your message at the moment, Please try again.";
		    }
	    }catch (\Exception $e){
    		return  $e->getMessage();
	    }
    }

	public function logUserIn(Request $request){
		try{

			//return User::get();
			$credentials = $request->only('username', 'password');
			//return $request->username.' '.$request->password;
			if (Auth::attempt($credentials)) {
				// Authentication passed...
				return redirect()->intended('dashboard');
			}else{
				$message = 'Wrong username or password';
				\Session::put('message', $message);
				return redirect()->back();
			}
			//return $request;
			/*if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
				return 'yees';
//				if(Auth::user()){

					return redirect()->intended('/dashboard');

//				}
				/*elseif(Auth::user()->role == "SubAdmin"){

					return redirect()->intended('/adminDashboard');

				}elseif (Auth::user()->role == "User"){
					return redirect('/home');
				}*/
			/*}else{
				$message = 'Wrong username or password';
				\Session::put('message', $message);
				return redirect()->back();
			}*/
		}catch(\Exception $error){
			$message = 'Error in connection please try again';
			\Session::put('message', $message);
			return redirect()->back();
		}
	}

	public function logOut(){
		Auth::logout();
		return redirect('/');
	}

    Public function renderHome(){
		if(Auth::check()){
			$users = User::get();
			$user = count($users);
			$totalFiles = fileUploadModel::get();
			$files = fileUploadModel::where('owner', Auth::user()->first_name)->orderBy('created_at', 'desc')->get();
			//return count($files);
			return view('pages.dashboard')->with(['files'=>$files, 'totalFiles'=>$totalFiles, 'user'=>$user]);

		}else{
			Auth::logout();
			return redirect('/');
		}

    }

    Public function  displayAllFiles(){

	    if(Auth::check()){
		    try{
		    	$page = "users";
				$files = fileUploadModel::get();
				$users = User::get();
				$indTotal = [];
				if(!$files->isEmpty())
				{
					foreach ($users as $user)
					{
						$sum = fileUploadModel::where('owner_id', $user->id)->get();
						if (!$sum->isEmpty())
						{
							$tsum = count($sum);
						}
						else
						{
							$tsum = 0;
						}

						array_push($indTotal, $tsum);
					}
				}
		        return view('pages.allfiles')->with(['users'=>$users, 'indTotal'=>$indTotal, 'page'=> $page]);
		    }catch(\Exception $e){
			    \Session::put('message', 'Error in Connection'.$e->getMessage());
			    return redirect()->back();
		    }
	    }else{
	    	Auth::logout();
	    	return redirect('/');
	    }

    }


    public function getFiles($id)
    {
    	try{
    		if(Auth::check()){
			   $page = "ind";
			    $files = fileUploadModel::where('owner', $id)->orderBy('created_at', 'desc')->get();
			    return view('pages.allfiles')->with(['files'=>$files, 'page'=>$page, 'id'=>$id]);
		    }else{
    			Auth::logout();
    			return redirect('/');
		    }

	    }catch(\Exception $e){
		    \Session::put('message', 'Error in Connection');
		    return redirect()->back();
	    }

    	//return $items[0];

    }

    public function  renderCreateUser(){
    	return view('pages.createUser');
    }

    public  function  uploadFile(Request $request){
    	if(Auth::check()){
			//return $request[1]['name'][1];
		    try{
			    if($request->hasFile('file'))
			    {
			    	foreach ($request->file('file') as $file){
					    ///return Auth::user()->first_name;
					    //return  $file;
					    $getNameExtesion = $file->getClientOriginalName();
					    $fileExtesion = $file->getClientOriginalExtension();
					    $fileSize = $file->getSize();
					    $name = str_replace('.'.$fileExtesion, "",$getNameExtesion);
					    //return $getNameExtesion.$fileExtesion.$fileSize;
//					if ($this->validate($request, ['picture' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',]))
//					{
					    /*$path = $request->file('image')->storeAs(
							'/', "image" . $er
						);*/

					    if($fileExtesion == "png" || $fileExtesion == "jpg" ||$fileExtesion == "gif" || $fileExtesion == "jpg"){
						    fileUploadModel::create([
							    'filename'=> $getNameExtesion,
							    'size'=> round($fileSize/pow(10, 6), 2),
							    'owner'=> Auth::user()->first_name,
							    'owner_id'=>Auth::user()->id,
							    'file_type'=> 'Image',
						    ]);
						    if (\File::exists(public_path('uploads/images' . $getNameExtesion)))
						    {
							    //\File::delete(public_path('uploads/' . $path));
							    $er = rand(0,3);
							    $getNameExtesion = $name.$er.'.'.$fileExtesion;
							    $file->move('uploads/images', $getNameExtesion);
						    }
						    else
						    {
							    $file->move('uploads/images', $getNameExtesion);
						    }
						    \Session::put('info', 'You saved your file(s)');
//						    return redirect()->back();
						//return Response::json(['success'=>'Successfully uploaded'], 200);
					    }elseif($fileExtesion == "doc" || $fileExtesion == "docx" || $fileExtesion == "txt" || $fileExtesion == "pptx"){

					    	fileUploadModel::create([
							    'filename'=> $getNameExtesion,
							    'size'=> $fileSize/pow(10, 6),
							    'owner'=>Auth::user()->first_name,
							    'owner_id'=>Auth::user()->id,
							    'file_type'=> 'Word/txt',
						    ]);
						    if (\File::exists(public_path('uploads/document' . $getNameExtesion)))
						    {
							    //\File::delete(public_path('uploads/' . $path));
							    $er = rand(0,3);
							    $getNameExtesion = $name.$er.'.'.$fileExtesion;
							    $file->move('uploads/document', $getNameExtesion);
						    }
						    else
						    {
							    $file->move('uploads/document', $getNameExtesion);
						    }
						    \Session::put('info', 'You saved your filed');
//						    return redirect()->back();
					    }elseif($fileExtesion == "xls" || $fileExtesion == "xlsx" || $fileExtesion == "csv"){
						    fileUploadModel::create([
							    'filename'=> $getNameExtesion,
							    'size'=> round($fileSize/pow(10, 6), 2),
							    'owner'=>Auth::user()->first_name,
							    'owner_id'=>Auth::user()->id,
							    'file_type'=> 'Excel',
						    ]);
						    if (\File::exists(public_path('uploads/excel' . $getNameExtesion)))
						    {
							    //\File::delete(public_path('uploads/' . $path));
							    $er = rand(0,3);
							    $getNameExtesion = $name.$er.'.'.$fileExtesion;
							    $file->move('uploads/excel', $getNameExtesion);
						    }
						    else
						    {
							    $file->move('uploads/excel', $getNameExtesion);
						    }
						    \Session::put('info', 'You saved your file(s)');
//						    return redirect()->back();
					    }elseif($fileExtesion == "pdf"){
						    fileUploadModel::create([
							    'filename'=> $getNameExtesion,
							    'size'=> round($fileSize/pow(10, 6), 2),
							    'owner'=>Auth::user()->first_name,
							    'owner_id'=>Auth::user()->id,
							    'file_type'=> 'PDF',
						    ]);
						    if (\File::exists(public_path('uploads/pdf' . $getNameExtesion)))
						    {
							    //\File::delete(public_path('uploads/' . $path));
							    $er = rand(0,3);
							    $getNameExtesion = $name.$er.'.'.$fileExtesion;
							    $file->move('uploads/pdf', $getNameExtesion);
						    }
						    else
						    {
							    $file->move('uploads/pdf', $getNameExtesion);
						    }
						    \Session::put('info', 'You saved your file(s)');
//						    return Response::json(['success'=>'Successfull uploaded'], 200);
						    //return redirect()->back();
					    }elseif($fileExtesion == "zip"){
						    fileUploadModel::create([
							    'filename'=> $getNameExtesion,
							    'size'=> round($fileSize/pow(10, 6), 2),
							    'owner'=>Auth::user()->first_name,
							    'owner_id'=>Auth::user()->id,
							    'file_type'=> 'ZIP',
						    ]);
						    if (\File::exists(public_path('uploads/zip' . $getNameExtesion)))
						    {
							    //\File::delete(public_path('uploads/' . $path));
							    $er = rand(0,3);
							    $getNameExtesion = $name.$er.'.'.$fileExtesion;
							    $file->move('uploads/zip', $getNameExtesion);
						    }
						    else
						    {
							    $file->move('uploads/zip', $getNameExtesion);
						    }
						    \Session::put('info', 'You saved your file(s)');
//						    return redirect()->back();
					    }else{
						    \Session::put('message', 'The file you are uploading cannot be supported');
						    return redirect()->back();
					    }

//					}else{
//						Session::put('message', 'Ensure you are uploading an image not more than 2MB');
//						return redirect()->back();
//					}
				    }
				    return redirect()->back();
			    }else{
				    Session::put('message', 'File Not present');
						return redirect()->back();
				    //return Response::json(['error'=>'File not present'], 401);
			    }
		    }catch (\Exception $e){
			    //return $e->getMessage();
			    \Session::put('message', 'Error in Connection'.$e->getMessage());
//			    return redirect()->back();
			    return Response::json(['error'=>'Error in connection'], 401);
		    }
	    }else{
		    \Session::put('message', 'Please Login again');
		    return redirect('/');
	    }

    }

    Public function downloadImage($filename){
    	if(Auth::user()){
			    $file_path = public_path('uploads/images/'.$filename);
		    $files = fileUploadModel::where('filename', $filename)->first();
		    downloadModel::insert([
			    'filename' => $filename,
			    'downloaded_by'=> Auth::user()->first_name,
			    'owner'=>$files->owner_id
		    ]);
		    $files->downloads = $files->downloads + 1;
		    $files->update();
			    return response()->download($file_path);
	    }else{
		    Session::put('message', 'Timed out! Please login again');
		    return redirect('/logout');
	    }
    }

	Public function downloadPDF($filename){
		if(Auth::user()){
			$file_path = public_path('uploads/pdf/'.$filename);
			$files = fileUploadModel::where('filename', $filename)->first();
			downloadModel::insert([
				'filename' => $filename,
				'downloaded_by'=> Auth::user()->first_name,
				'owner'=>$files->owner_id
			]);
			$files->downloads = $files->downloads + 1;
			$files->update();
			return response()->download($file_path);
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}
	}

	Public function downloadDoc($filename){
		if(Auth::user()){
			$file_path = public_path('uploads/document/'.$filename);
			$files = fileUploadModel::where('filename', $filename)->first();
			downloadModel::insert([
				'filename' => $filename,
				'downloaded_by'=> Auth::user()->first_name,
				'owner'=>$files->owner_id
			]);
			$files->downloads = $files->downloads + 1;
			$files->update();
			return response()->download($file_path);
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}
	}

	Public function downloadZIP($filename){
		if(Auth::user()){
			$file_path = public_path('uploads/zip/'.$filename);
			$files = fileUploadModel::where('filename', $filename)->first();
			downloadModel::insert([
				'filename' => $filename,
				'downloaded_by'=> Auth::user()->first_name,
				'owner'=>$files->owner_id
			]);
			$files->downloads = $files->downloads + 1;
			$files->update();
			return response()->download($file_path);
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}
	}

	Public function downloadExcel($filename){
		if(Auth::user()){
			$file_path = public_path('uploads/excel/'.$filename);
			$files = fileUploadModel::where('filename', $filename)->first();
			downloadModel::insert([
				'filename' => $filename,
				'downloaded_by'=> Auth::user()->first_name,
				'owner'=>$files->owner_id
			]);
			$files->downloads = $files->downloads + 1;
			$files->update();
			return response()->download($file_path);
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}
	}

	Public function  viewDownloads($file){
		$downloads = downloadModel::where('filename', $file)->distinct('downloaded_by')->get();
		return view('pages.getUserWhoViewed')->with(['downloads'=>$downloads, 'file'=>$file]);
	}







	public function settings(){
		if(Auth::check()){
			$users = User::all();
			return view('pages.actions')->with(['users'=>$users]);
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}

	}



	Public function changePassword(Request $request){
		try{
			if(Auth::user()){
				$user = User::findOrFail(Auth::user()->id);
				if(Hash::check($request->oldpassword, $user->password))
				{
					if($request->newpassword == $request->confirmnewpassword){
						$user->password = bcrypt($request->newpassword);
						$user->update();
						$info = "Password Updated successfully";
						Session::put('info', $info);
						return redirect()->back();
					}else{
						$error = "Ensure your new password and confirm new password are the same.";
						Session::put('message', $error);
						return redirect()->back();
					}
				}else{
					$error = "Your password does not match what we have in record";
					Session::put('message', $error);
					return redirect()->back();
				}
			}else{
				Session::put('message', 'Timed out! Please login again');
				return redirect('/logout');
			}
		}catch (\Exception $e){
			$error = "There was a an error in connection, Try again".$e->getMessage();
			Session::put('message', $error);
			return redirect()->back();
		}
	}

	public  function  addUser(Request $request){
		if(Auth::check()){
			if(Auth::user()->role == "Creator"){
				User::create([
					'role'=>$request->role,
					'last_name'=>$request->lastname,
					'first_name'=>$request->firstname,
					'email' =>$request->email,
					'username'=>$request->username,
					'password'=>bcrypt($request->password),
				]);
				$theresp = 'User '.$request->username.' created';
				Session::put('info', $theresp);
				return redirect()->back();
			}else{
				Session::put('message', 'You are not authorised');
				return redirect()->back();
			}
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}

	}

	Public function giveErrorPage(){
		return view('pages.error');
	}

	Public function search(Request $request){
		try{
			if(Auth::check()){
				if($request->date1 == null and $request->date2 == null){
					if($request->type == "Approved"){
						$alldata = [];
						$tickets = ticketModel::where('approval_status', 1)->get();
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$items = itemModel::where('ticket_id', $ticket->serial_number)->orderBy('updated_at', 'DESC')->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
							}
							$tsum = array_sum($sum);
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						//return response()->json($alldata);
						return response()->json(array_collapse($alldata));
					}

					elseif ($request->type == "Ignored"){
						$alldata=[];
						$tickets = ticketModel::where('ignore_status', 1)->get();
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$items = itemModel::where('ticket_id', $ticket->serial_number)->orderBy('updated_at', 'DESC')->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
								array_sum($sum);
							}
							$tsum = array_sum($sum);
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						return response()->json(array_collapse($alldata));
					}

					elseif ($request->type == "all"){
						$alldata = [];
						$tickets = ticketModel::get();
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$items = itemModel::where('ticket_id', $ticket->serial_number)->orderBy('updated_at', 'DESC')->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
								array_sum($sum);
							}
							$tsum = array_sum($sum);
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						return response()->json(array_collapse($alldata));
					}else{
						Session::put('message', 'Ensure you are making a valid request.');
						return redirect()->back();
					}
				}else{
					if($request->type == "Approved"){
						$alldata = [];
						$tickets = ticketModel::where('approval_status', 1)->where('created_at', 'LIKE', $request->date1.'%')->orWhere('created_at', 'LIKE', $request->date2.'%')->orderBy('updated_at', 'DESC')->get();
//						$tickets = ticketModel::where('approval_status', 1)->whereBetween('created_at', [$request->date1.' 00:00:00', $request->date2].' 23:58:59');
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$alldata = [];
							$items = itemModel::where('ticket_id', $ticket->serial_number)->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
							}
							$tsum = array_sum($sum);
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						// response()->json($alldata);
						return response()->json(array_collapse($alldata));

					}

					elseif ($request->type == "Ignored"){
						$tickets = ticketModel::where('ignore_status', 1)->where('created_at', 'LIKE', $request->date1.'%')->orWhere('created_at', 'LIKE', $request->date2.'%')->orderBy('updated_at', 'DESC')->get();
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$items = itemModel::where('ticket_id', $ticket->serial_number)->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
							}
							$tsum = array_sum($sum);
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						return response()->json(array_collapse($alldata));
					}

					elseif ($request->type == "all"){
						$alldata = [];
						$tickets = ticketModel::where('created_at', 'LIKE', $request->date1.'%')->orWhere('created_at', 'LIKE', $request->date2.'%')->orderBy('updated_at', 'DESC')->get();
						$nums = [];
						$sum = [];
						$tsum = [];
						foreach ($tickets as $ticket){
							$sum = [];
							$items = itemModel::where('ticket_id', $ticket->serial_number)->get();
							array_push($nums, count($items));
							foreach ($items as $item){
								array_push($sum, $item->total);
								$tsum = array_sum($sum);
							}
							$ticket['sum'] = $tsum;
							$ticket['num'] = $nums;
						}
//						return $tickets;
						//$html = view('pages.result')->with(['tickets'=>$tickets, 'nums'=>$nums]);
//						return $html;
						$alldata[] = $tickets ;
						return response()->json(array_collapse($alldata));

					}else{
						Session::put('message', 'Ensure you are making a valid request.');
						return redirect()->back();
					}
				}
				//return Datatables::of(ticketModel::query())->make(true);


			}else{
				Session::put('message', 'Timed out! Please login again');
				return redirect('/logout');
			}
		}catch (\Exception $e){
			Session::put('message', 'Error in connection');
			return redirect()->back();
		}
	}

	public  function searchD(){
		if(Auth::check()){
			return view('pages.results');
		}else{
			Session::put('message', 'Timed out! Please login again');
			return redirect('/logout');
		}

	}

	public  function  vieww($id){
		if(Auth::check()){
			if(Auth::user()->role == "User"){
				$tick = ticketModel::where('serial_number', $id)->first();
				if($tick->ticket_type == "Fuel Ticket")
				{
					$items = itemModel::where('ticket_id', $id)->get();
				}else{
					Session::put('message', 'Wrong request');
					return redirect()->back();
				}
				return view('pages.printview')->with(['items'=>$items]);
			}else{
				Session::put('message', 'You are not authorized');
				return redirect()->back();
			}
		}else{
			Session::put('message', 'Timed Out!, Please login again');
			return redirect()->back();
		}

	}

	Public function  viewUsers(){
		$users = User::get();
		return view('pages.allUsers', ['users'=>$users]);
	}

	Public function deleteFile(Request $request){
		//return $request;
		if($request->filetype == "Image"){
			if (\File::exists(public_path('uploads/images/' . $request->filename)))
			{
				\File::delete(public_path('uploads/images/' . $request->filename));
			}
		}elseif ($request->filetype == "Word/text"){
			if (\File::exists(public_path('uploads/images/' . $request->filename)))
			{
				\File::delete(public_path('uploads/images/' . $request->filename));
			}
		}elseif ($request->filetype == "Excel"){
			if (\File::exists(public_path('uploads/excel/' . $request->filename)))
			{
				\File::delete(public_path('uploads/excel/' . $request->filename));
			}
		}elseif ($request->filetype == "PDF"){
			if (\File::exists(public_path('uploads/pdf/' . $request->filename)))
			{
				\File::delete(public_path('uploads/pdf/' . $request->filename));
			}
		}elseif ($request->filetype == "ZIP"){
			if (\File::exists(public_path('uploads/zip/' . $request->filename)))
			{
				\File::delete(public_path('uploads/zip/' . $request->filename));
			}
		}else{
			Session::put('messages', 'File does not exist any longer');
			return "oops";
		}
		fileUploadModel::where('filename', $request->filename)->delete();
		return "deleted";

	}

}
