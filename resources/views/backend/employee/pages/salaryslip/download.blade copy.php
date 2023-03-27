<!DOCTYPE html>
<html>
<head>
    <title>{{ $salaryslipDetails[0]->firstname." ".$salaryslipDetails[0]->lastname }}</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            /* margin: 20px; */
            padding: 0;
            /* background-color: #FAFAFA; */
            font: 12pt "Tahoma";
        }
    </style>
</head>
<body>


    @php
    $month= ["","January","February","March","April","May","June","July","August","September","October","November","December"];
    $logodetails = getdetails();
    $days = $salaryslipDetails[0]->wd + $salaryslipDetails[0]->wo + $salaryslipDetails[0]->ph + $salaryslipDetails[0]->pd + $salaryslipDetails[0]->lwp ;
    $grossIncome = $salaryslipDetails[0]->basic + $salaryslipDetails[0]->hra + $salaryslipDetails[0]->leave_encash + $salaryslipDetails[0]->produc + $salaryslipDetails[0]->convei + $salaryslipDetails[0]->transport;
    $totalDeduction = $salaryslipDetails[0]->pf + $salaryslipDetails[0]->esi + $salaryslipDetails[0]->pt + $salaryslipDetails[0]->tds + $salaryslipDetails[0]->other ;

    function AmountInWords(float $amount)
    {
       $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
       // Check if there is any number after decimal
       $amt_hundred = null;
       $count_length = strlen($num);
       $x = 0;
       $string = array();
       $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
         3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
         7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
         10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
         13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
         16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
         19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
         40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
         70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $x < $count_length ) {
          $get_divider = ($x == 2) ? 10 : 100;
          $amount = floor($num % $get_divider);
          $num = floor($num / $get_divider);
          $x += $get_divider == 10 ? 1 : 2;
          if ($amount) {
           $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
           $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
           $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.'
           '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. '
           '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
            }
       else $string[] = null;
       }
       $implode_to_Rupees = implode('', array_reverse($string));
       $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
       " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
       return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
    }

    @endphp
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
       <!--begin::Container-->
       <div class="container">
          <div class="card card-custom" style="padding: 25px 25px">
             <table cellpadding="0" cellspacing="0" style="border-collapse: unset !important;padding:0px;margin:0px;border:0px;border-spacing:0px;font-family:Arial,Verdana,Geneva,sans-serif;letter-spacing:normal;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration:none;width:100%">
                <tbody>
                   <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px;pb-5">
                      <td width="50%" align="left" style="padding:4px;margin:0px">
                        <span>Name &amp; Address of Establishment</span>
                        <br>
                        <span style="font-weight:bold">Maxthon Technologies</span>
                        <br>
                        <span style="font-size:10px">226, SilverStone Arcade, Near D'Mart, Causeway Road, Katargam, Surat - 395004</span>
                    </td>
                    <td width="50%" align="right" style="padding:4px;margin:0px">Salary Slip For The Month of {{ $month[$salaryslipDetails[0]->month] }} - {{ $salaryslipDetails[0]->year }}</td>
                   </tr>


                   <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                      <td style="padding:4px;margin:0px;vertical-align:top;border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0);border-top-width:2px;border-top-style:solid;border-top-color:rgb(0,0,0);border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:rgb(0,0,0)">
                         <table style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                            <tbody>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">Emp. No:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->emp_no }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">Emp. Name:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->firstname." ".$salaryslipDetails[0]->lastname }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">Designation:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->designation }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">Department:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->department }}</td>
                               </tr>
                            </tbody>
                         </table>
                      </td>
                      <td style="padding:4px;margin:0px;border-top-width:2px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:rgb(0,0,0)">
                         <table style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                            <tbody>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">P.F. No:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->pfno }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">ESI No:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->esino }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">Bank:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->bankname }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">A/C No:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ $salaryslipDetails[0]->accountno }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px">D.O.J:<span>&nbsp;</span></td>
                                  <td style="padding:4px;margin:0px">{{ date("d F, Y",strtotime($salaryslipDetails[0]->doj)) }}</td>
                               </tr>
                            </tbody>
                         </table>
                      </td>
                   </tr>


                   <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                      <td colspan="2" style="padding:0px;margin:0px;width:100%">
                         <table style="border-collapse: unset !important; padding:0px;margin:0px;border:0px;border-spacing:0px;width:100%">
                            <tbody>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <th colspan="2" style="border-width:1px 1px 1px 2px;border-style:solid;border-color:rgb(0,0,0)">WORKING DETAILS</th>
                                  <th colspan="3" style="border:1px solid rgb(0,0,0)">EARNING DETAILS</th>
                                  <th colspan="2" style="border-width:1px 2px 1px 1px;border-style:solid;border-color:rgb(0,0,0)">DEDUCTION DETAILS</th>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px;width:100%">
                                  <th colspan="2" style="border-width:1px 1px 1px 2px;border-style:solid;border-color:rgb(0,0,0)"></th>
                                  <th style="border:1px solid rgb(0,0,0)">Earnings</th>
                                  <th style="border:1px solid rgb(0,0,0)">Actual</th>
                                  <th style="border:1px solid rgb(0,0,0)">Payable</th>
                                  <th style="border:1px solid rgb(0,0,0)">Deduction</th>
                                  <th style="border-width:1px 2px 1px 1px;border-style:solid;border-color:rgb(0,0,0)">Amount</th>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">WD</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->wd }}</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">BASIC</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->basic }}</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->basic }}</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">P.F.</td>
                                  <td style="padding:4px;margin:0px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(0,0,0);border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->pf }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">WO</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->wo }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">HRA</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->hra }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">ESI</td>
                                  <td style="padding:4px;margin:0px;border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->esi }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">PH</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->ph }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">LEAVE ENCASH</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->leave_encash }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">P.T.</td>
                                  <td style="padding:4px;margin:0px;border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->pt }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">PD</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->pd }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">PRODUC</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->produc }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">TDS</td>
                                  <td style="padding:4px;margin:0px;border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->tds }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">LWP</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->lwp }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">CONVEI</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->convei }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">OTHER DED.</td>
                                  <td style="padding:4px;margin:0px;border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->other }}</td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:2px;border-left-style:solid;border-left-color:rgb(0,0,0)">Total</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{  $days  }}</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)">TRANSPORT</td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right">{{ $salaryslipDetails[0]->transport }} </td>
                                  <td style="padding:4px;margin:0px;border-right-width:1px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0)"></td>
                                  <td style="padding:4px;margin:0px;border-right-width:2px;border-right-style:solid;border-right-color:rgb(0,0,0);border-left-width:1px;border-left-style:solid;border-left-color:rgb(0,0,0);text-align:right"></td>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <th style="border-width:1px 1px 1px 2px;border-style:solid;border-color:rgb(0,0,0);text-align:left"></th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:right"></th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:left">Gross Income</th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:right"></th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:right">{{  $grossIncome  }}</th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:left">Gross Ded.</th>
                                  <th style="border-width:1px 2px 1px 1px;border-style:solid;border-color:rgb(0,0,0);text-align:right">{{   $totalDeduction  }}</th>
                               </tr>
                               <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px">
                                  <th colspan="5" style="border-width:1px 1px 1px 2px;border-style:solid;border-color:rgb(0,0,0);text-align:left"><strong>Rupees In Words : <span>&nbsp;</span></strong><span style="font-style:italic">{{ AmountInWords($grossIncome - $totalDeduction) }}</span></th>
                                  <th style="border:1px solid rgb(0,0,0);text-align:left">Net Amount</th>
                                  <th style="border-width:1px 2px 1px 1px;border-style:solid;border-color:rgb(0,0,0);text-align:right">{{ $grossIncome - $totalDeduction }}</th>
                               </tr>
                            </tbody>
                         </table>
                      </td>
                   </tr>
                </tbody>
             </table>
          </div>
       </div>
       <!--end::Container-->
    </div>

</body>
</html>
