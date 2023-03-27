<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Myemployee;
use App\Models\Salaryslip;
class Sendmail extends Model
{
    public function sendMailltesting(){
        $mailData['data']='';
        $mailData['subject'] = 'Maxthon - Testing Mail';
        $mailData['attachment'] = array();
        $mailData['template'] ="emailsTemplate.carrer";
        $mailData['mailto'] = 'parthkhunt12@gmail.com';

        $sendMail = new Sendmail;
        return $sendMail->sendSMTPMail($mailData);
    }

    public function sendContactMail($request){

        $mailData['data']['firstname']=$request->input('firstname');
        $mailData['data']['lastname']=$request->input('lastname');
        $mailData['data']['email']=$request->input('email');
        $mailData['data']['mobile']=$request->input('mobile');
        $mailData['data']['subject']=$request->input('subject');
        $mailData['data']['description']=$request->input('description');


        $mailData['subject'] = 'Contact Mail';
        $mailData['attachment'] = array();
        $mailData['template'] ="emailsTemplate.contactyou";
        $mailData['mailto'] = 'ghanshayam.webexecute@gmail.com';
        $sendMail = new Sendmail;
        return $sendMail->sendSMTPMail($mailData);
    }

    public function forgotPassword($token,$username,$email){
        $mailData['data']['token']=$token;
        $mailData['data']['username']=$username;
        $mailData['subject'] = 'Adspot - Reset Passsword link';
        $mailData['attachment'] = array();
        $mailData['template'] ="emailsTemplate.forgotpassword";
        $mailData['mailto'] = $email;
        $sendMail = new Sendmail;
        $sendMail->sendSMTPMail($mailData);
        return true;
    }
    public function sendSMTPMail($mailData)
    {
                $pathToFile = $mailData['attachment'];
                $mailsend = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
                    $m->from('parthkhunt37@gmail.com', 'Maxthon Technologies');
                    $m->to($mailData['mailto'], "Maxthon Technologies")->subject($mailData['subject']);

                    if($pathToFile != ""){
                        // $m->attach($pathToFile);
                    }

                    //  $m->cc($mailData['bcc']);
                });

                if($mailsend){
                    return true;
                }else{
                    return false;
                }
    }

    public function send_salary_slip_via_mail($data){

        $objSalaryslip = new Salaryslip();
        $salaryslipDetails  = $objSalaryslip->getSalaryslipDetails($data['id']);

        $salarySlipDetails = $salaryslipDetails[0];

        $month= ["","january","february","march","april","may","june","july","august","september","october","november","december"];


        $mailData['data']['name']= $salarySlipDetails->firstname.' '.$salarySlipDetails->lastname;
        $mailData['data']['id']= $salarySlipDetails->id;
        $mailData['data']['month_year']= "Your " .$month[$salarySlipDetails->month]." - ". $salarySlipDetails->year ." salary slip generated" ;
        $mailData['subject'] = "Your " .$month[$salarySlipDetails->month]." month's salary slip generated" ;
        $mailData['attachment'] = array();
        $mailData['template'] = "emailsTemplate.salary_slip";
        $mailData['mailto'] = $salarySlipDetails->email;

        $sendMail = new Sendmail;
        $sendMail->sendSMTPMail($mailData);

        return true;
    }
}
