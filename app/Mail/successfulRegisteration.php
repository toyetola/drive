<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class successfulRegisteration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    Public $name;
Public $title;
Public $id, $gender, $phonenumber, $country, $state, $sector, $nameoforganization, 
$accomodation, $visa, $exhibition, $source, $request;


    public function __construct($request, $id)
    {
        //
	    $this->request = $request;
        $this->id = $id;
        $this->name = $request->first_name;
        $this->title =$request->title;
        $this->gender =$request->gender;
        $this->phonenumber =$request->phone_number;
        $this->country = $request->country;
        $this->state =  $request->State;
        $this->sector = $request->sector;
        $this->nameoforganization = $request->name_of_organization;
        if($request->accomodation_status == 1){
            $this->accomodation = 'Yes';
        }else{
            $this->accomodation = 'No';
        }
        if($request->visa_status == 1){
            $this->visa = 'Yes';
        }else{
            $this->visa = 'No';
        }
        if($request->exhibition_status == 1){
            $this->exhibition = 'Yes';
        }else{
            $this->exhibition = 'No';
        }
        $this->source = implode(', ',$request->source_of_awareness);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('admin@nff.com', 'HarvestPlus NG')
        ->view('emails.successMail');
    }
}
