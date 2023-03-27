<!DOCTYPE html>
<html>
<head>
    <style>
        @page { margin: 10px 10px; }

        table {
        border-collapse: collapse;
        }

        .info{
        float: right;
        border: 1px solid black;
        width: 40%;
        margin-bottom: 20px;
        }


    </style>
</head>

<body>
    @php
    $month= ["","January","February","March","April","May","June","July","August","September","October","November","December"];
   //  $logodetails = getdetails();
    $days = $salaryslipDetails[0]->wd + $salaryslipDetails[0]->wo + $salaryslipDetails[0]->ph + $salaryslipDetails[0]->pd + $salaryslipDetails[0]->lwp ;
    $grossIncome = $salaryslipDetails[0]->basic + $salaryslipDetails[0]->hra + $salaryslipDetails[0]->leave_encash + $salaryslipDetails[0]->produc + $salaryslipDetails[0]->convei + $salaryslipDetails[0]->transport;
    $totalDeduction = $salaryslipDetails[0]->pf + $salaryslipDetails[0]->esi + $salaryslipDetails[0]->pt + $salaryslipDetails[0]->tds + $salaryslipDetails[0]->other ;
    $total = $salaryslipDetails[0]->basic + $salaryslipDetails[0]->hra - $salaryslipDetails[0]->pt;

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
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
           .border-dashed {
               border-style: dashed !important;
           }
        
           .invoice-box {
               padding: 48px;
           }
        
           .border-bottom {
               border-bottom-width: 2px !important;
           }
        
           @media print {
               .invoice-box {
                   padding: 0;
               }
           }
        </style>
        
        <div class="invoice-box">
           <div class="d-flex gap-4 align-items-center border-bottom my-4">
               <div class="mb-4">
                   <img src="data:image/png;base64,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"
                        class="card-logo card-logo-dark" alt="logo dark" height="72"/>
               </div>
        
               <div class="flex-grow-1">
                   <h5 class="mb-1">BVM Infotech</h5>
                   <p class="mb-0">
                       1049-1051, Silver Business Point,near Uttran Surat - 394105 India
                   </p>
               </div>
        
               <div>
                   <p class="mb-1">Payslip For the Month</p>
                   <h5 class="mb-0">{{ $month[$salaryslipDetails[0]->month] }} - {{ $salaryslipDetails[0]->year }}</h5>
               </div>
           </div>
        
           <div class="float-end">
               <div class="border rounded-4 overflow-hidden">
                   <div class="p-4" style="background-color: #edfcf1">
                       <h3>₹{{ numberformat($total) }}</h3>
                   </div>
                   <div class="px-4 py-2">
                       <table class="table table-borderless table-nowrap align-middle mb-0">
                           <tbody>
                           <tr>
                               <td>Sub Total</td>
                               <td class="text-end">₹{{ numberformat(123) }}</td>
                           </tr>
                           <tr>
                               <td>Estimated Tax ({{ numberformat($salaryslipDetails[0]->ex_tax_pr)}}%)</td>
                               <td class="text-end">{{ numberformat($salaryslipDetails[0]->ex_tax)}}</td>
                           </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
           
        
           <div class="float-start">
               <div class="d-flex flex-column">
                   <h6 class="text-uppercase">Employee Summery</h6>
                   <div class="mt-2">
                       <table class="table table-borderless table-nowrap align-middle">
                           <tbody>
                           <tr>
                               <td>Employee Name</td>
                               <td class="d-flex gap-3">
                                   <span>:</span>
                                   <span class="text-end text-dark fw-semibold">{{ $salaryslipDetails[0]->firstname." ".$salaryslipDetails[0]->lastname }}</span>
                               </td>
                           </tr>
                           <tr>
                               <td>Employee ID</td>
                               <td class="d-flex gap-3">
                                   <span>:</span>
                                   <span class="text-end text-dark fw-semibold">{{ $salaryslipDetails[0]->emp_no}}</span>
                               </td>
                           </tr>
                           <tr>
                               <td>Pay Period</td>
                               <td class="d-flex gap-3">
                                   <span>:</span>
                                   <span class="text-end text-dark fw-semibold">{{ $month[$salaryslipDetails[0]->month] }} - {{ $salaryslipDetails[0]->year }}</span>
                               </td>
                           </tr>
                           <tr>
                               <td>Pay Date</td>
                               <td class="d-flex gap-3">
                                   <span>:</span>
                                   <span class="text-end text-dark fw-semibold">{{ date("d F, Y",strtotime($salaryslipDetails[0]->doj)) }}</span>
                               </td>
                           </tr>
                           </tbody>
                       </table>
                       <!--end table-->
                   </div>
               </div>
           </div>
        
           <div class="clearfix mb-4"></div>
           <div class="border rounded-4 overflow-hidden mb-5">
               <div class="row g-0">
                   <div class="col-6">
                       <div class="p-3 pb-0">
                           <table class="table table-borderless table-nowrap align-middle mb-0">
                               <tbody>
                               <thead class="border-bottom border-dashed">
                               <th>Earnings</th>
                               <th class="text-end">Amount</th>
                               </thead>
                               <tr>
                                   <td>Basic</td>
                                   <th class="text-end">₹{{ $salaryslipDetails[0]->basic}}</th>
                               </tr>
                               <tr>
                                   <td>House Rent Allowance</td>
                                   <th class="text-end">₹{{ $salaryslipDetails[0]->hra}}</th>
                               </tr>
                               <tr>
                                   <td>&nbsp;</td>
                                   <td>&nbsp;</td>
                               </tr>
                               </tbody>
                           </table>
                       </div>
                       <div class="px-3 mt-auto" style="background-color: #f8f8fb">
                           <table class="table table-borderless table-nowrap align-middle mb-0">
                               <tfoot>
                               <tr>
                                   <th>Gross Earnings</th>
                                   <th class="text-end">₹{{ numberformat($salaryslipDetails[0]->basic + $salaryslipDetails[0]->hra) }}</th>
                               </tr>
                               </tfoot>
                           </table>
                       </div>
                   </div>
        
                   <div class="col-6">
                       <div class="p-3 pb-0">
                           <table class="table table-borderless table-nowrap align-middle mb-0">
                               <tbody>
                               <thead class="border-bottom border-dashed">
                               <th>Earnings</th>
                               <th class="text-end">Amount</th>
                               </thead>
                               <tr>
                                   <td>Basic</td>
                                   <th class="text-end">₹{{ $salaryslipDetails[0]->basic}}</th>
                               </tr>
                               <tr>
                                   <td>House Rent Allowance</td>
                                   <th class="text-end">₹{{ $salaryslipDetails[0]->hra}}</th>
                               </tr>
                               <tr>
                                   <td>Professional Tax</td>
                                   <th class="text-end">₹{{ $salaryslipDetails[0]->pt}}</th>
                               </tr>
                               </tbody>
                           </table>
                       </div>
                       <div class="px-3" style="background-color: #f8f8fb">
                           <table class="table table-borderless table-nowrap align-middle mb-0">
                               <tfoot>
                               <tr>
                                   <th>Gross Earnings</th>
                                   <th class="text-end">₹{{ numberformat($total) }}</th>
                               </tr>
                               </tfoot>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
        
           <div class="d-flex justify-content-between border rounded-4 overflow-hidden mb-4 ">
               <div class="flex-grow-1 py-2 px-3">
                   <h6>Total Net Payble</h6>
                   <p class="text-muted mb-0">Gross Earnings - Total Deductions</p>
               </div>
               <div style="background-color: #edfcf1">
                   <h6 class="d-flex align-items-center h-100 mb-0 px-4">₹{{ numberformat($total) }}</h6>
               </div>
           </div>
        
           <h6 class="text-end mb-4">
               <span class="text-muted">Amount In Words</span>
               : {{ AmountInWords(numberformat($total)) }}
           </h6>
           <hr class="mb-4 ">
           <p class="text-center">
               -- This is a system generated payslip, hence the signature is not required. --
           </p>
        </div>

</body>

</html>
