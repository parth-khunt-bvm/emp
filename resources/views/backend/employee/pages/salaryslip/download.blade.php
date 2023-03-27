<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1"/>--}}
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"/>--}}

    <title>BVM Infotech</title>
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>--}}

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

        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

    </style>
</head>

<body>
<div class="invoice-box">
    <div class="d-flex gap-4 align-items-center border-bottom my-4">
        <table>
            <tr style="padding:0px;margin:0px;border:0px;border-spacing:0px;">
                <td>
                    <div>
                        <img
                            src="data:image/png;base64,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"
                            class="card-logo card-logo-dark" alt="logo dark" height="72"/>
                    </div>
                </td>
                <td>
                    <div class="flex-grow-1" style="margin-left: 15px;">
                        <p class="mb-1" style="margin-bottom: -10px;">BVM Infotech</p>
                        <p class="mb-0" style="font-size: 15px;">
                            1049-1051, Silver Business Point,near Uttran Surat - 394105 India
                        </p>
                    </div>
                </td>
                <td align="right">
                    <div style="margin-left: 40px;">
                        <p class="mb-1" style="margin-bottom: -10px;">Payslip For the Month</p>
                        <p class="mb-0">January 2023</p>
                    </div>
                </td>
            </tr>

        </table>

    </div>

    <hr style="margin-bottom: 8px;">

    <div class="float-start">
        <div class="d-flex flex-column">
            <div class="mt-2">
                <table style="width: 100% !important">
                    <tr>
                        <td align="left" style="width: 100%!important;">
                            <table>
                                <tr>
                                    <td style="margin-bottom: 50px; font-size: 14px!important; font-style: bold">EMPLOYEE SUMMARY</td>
                                </tr>

                                <tr>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; color:gray">Employee Name </td>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; font-style: bold">:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; color:gray">Employee ID </td>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; font-style: bold">:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; color:gray">Pay Period</td>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; font-style: bold">:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; color:gray">Pay Date </td>
                                    <td style="margin-top: 10px !important;padding-top: 10px !important; font-size: 14px!important; font-style: bold">:  Ritika Nikhara</td>
                                </tr>

                            </table>
                        </td>
                        <td align="right" style="text-align: right; width: 100%!important; ">
                            <table  style="width: 100% !important; border: 1px solid #c4cbd4; border-radius: 10px !important">
                                <tr style="background-color: #edfcf1; text-align: left;">
                                    <td colspan="2" style=" border-bottom: black;  padding-left: 25px!important; padding-bottom: 25px!important;  padding-top: 25px!important; ">
                                        <p><span style="font-size: 20px!important; color:black">59,800.00</span><br>
                                        Employee Net Pay</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 25px!important; padding-top: 10px!important;font-size: 14px!important; color:gray">Paid Days</td>
                                    <td style="padding-left: 25px!important; padding-top: 10px!important;font-size: 14px!important; color:black">: 30</td>
                                </tr>

                                <tr>
                                    <td style="padding-left: 25px!important; padding-bottom: 10px!important; padding-top: 5px!important; font-size: 14px!important; color:gray">LOP Days</td>
                                    <td style="padding-left: 25px!important; padding-bottom: 10px!important; padding-top: 5px!important; font-size: 14px!important; color:black">: 00</td>
                                </tr>
                            </table>
                            {{-- <table style="float:right; border: 1 solid gray; border-radius: 5px; " >
                                <tr style="background-color: #edfcf1; text-align: center;">
                                    <td colspan="2" style=" border-bottom: black">
                                        <h3>59,800.00</h3>
                                        <p>Employee Net Pay</p>
                                    </td>
                                </tr>
                              <tr>
                                  <td colspan="2" style="border-bottom:1px solid; border-bottom-style: dotted ">
                                  </td>
                              </tr>
                                <tr style="">
                                    <td>Paid Days :</td>
                                    <td class="text-end">30</td>
                                </tr>

                                <tr>
                                    <td>LOP Days :</td>
                                    <td class="text-end">00</td>
                                </tr>
                            </table> --}}
                        </td>
                    </tr>
                </table>

                </table>
                <!--end table-->
            </div>
        </div>
    </div>

<div style="margin-bottom: 50px;"></div>

    <div class="float-start">
        <div class="d-flex flex-column">
            <div class="mt-2">
                <table style=" width: 100%; border: 1px solid; padding: 12px; margin: 10px; border-radius: 10px;">
                    <tr>
                        <td>
                            <table >
                                <tr>
                                    <td>EARNINGS </td>
                                    <td>AMOUNT</td>
                                </tr>

                                <tr><td colspan="2" style="border-bottom:1px solid; border-bottom-style: dotted "></td></tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td style="margin-bottom: 50px;">EMPLOYEE SUMMARY</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>

                                <tr>
                                    <td>Employee Name </td>
                                    <td>:  Ritika Nikhara</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                </table>
                <!--end table-->
            </div>
        </div>
    </div>





</div>
</body>

</html>



