<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\Employee;
class Salaryslip extends Model
{
    use HasFactory;
    protected $table = 'salary_slip';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'salary_slip.id',
            1 => 'myemployee.firstname',
            2 => 'myemployee.lastname',
            3 => 'salary_slip.month',
            4 => 'salary_slip.year'

        );
        $query = Salaryslip ::from('salary_slip')
                    ->join("myemployee","myemployee.id","=","salary_slip.employee")
                    ->join("employee_department","employee_department.id","=","salary_slip.empDepartment")
                    ->join("employee_designation","employee_designation.id","=","salary_slip.empDesignation")
                    ->where("salary_slip.is_deleted","No");


        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                ->take($requestData['length'])
                ->select('salary_slip.id','employee_department.department','employee_designation.designation','myemployee.firstname','myemployee.lastname','salary_slip.month','salary_slip.year')
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $month= ["","January","February","March","April","May","June","July","August","September","October","November","December"];

            $actionhtml = '<a href="javascript:;" data-id="' . $row["id"] . '"  class="btn btn-icon sendMail" title="Send mail"><i class="fa fa-envelope text-info"></i></a>'
            .'<a href="' . route('employee-salaryslip-download', $row['id']) . '"  class="btn btn-icon " title="Download Salary Slip"><i class="fa fa-download text-success" ></i></a>'
            .'<a href="' . route('employee-salaryslip-view', $row['id']) . '" class="btn btn-icon" title="View Salary Slip Details"><i class="fa fa-eye text-primary" > </i></a>'
            .'<a href="' . route('employee-salaryslip-edit', $row['id']) . '" class="btn btn-icon" title="Edit Salary Slip"><i class="fa fa-edit text-warning"> </i></a>'
            .'<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteSalarySlip" data-id="' . $row["id"] . '" ><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['firstname'])." " .ucfirst($row['lastname']);
            $nestedData[] = ucfirst($row['department']);
            $nestedData[] = ucfirst($row['designation']);
            $nestedData[] = $month[$row['month']]." - " .$row['year'];
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function addSalaryslip($request){
        $checkSalarySlip = Salaryslip::where("month",$request->input('month'))
                                    ->where("year",$request->input('year'))
                                    ->where("employee",$request->input('employee'))
                                    ->count();
        if($checkSalarySlip != 0){
            return "exits";
        }else{
            $ojSalaryslip = new Salaryslip();
            $ojSalaryslip->empDepartment = $request->input('empDepartment');
            $ojSalaryslip->empDesignation = $request->input('empDesignation');
            $ojSalaryslip->employee = $request->input('employee');
            $ojSalaryslip->month = $request->input('month');
            $ojSalaryslip->year = $request->input('year');
            $ojSalaryslip->wd = $request->input('wd');
            $ojSalaryslip->wo = $request->input('wo');
            $ojSalaryslip->ph = $request->input('ph');
            $ojSalaryslip->pd = $request->input('pd');
            $ojSalaryslip->lwp = $request->input('lwp');
            $ojSalaryslip->basic = $request->input('basic');
            $ojSalaryslip->hra = $request->input('hra');
            $ojSalaryslip->leave_encash = $request->input('leave_encash');
            $ojSalaryslip->produc = $request->input('produc');
            $ojSalaryslip->convei = $request->input('convei');
            $ojSalaryslip->transport = $request->input('transport');
            $ojSalaryslip->pf = $request->input('pf');
            $ojSalaryslip->esi = $request->input('esi');
            $ojSalaryslip->pt = $request->input('pt');
            $ojSalaryslip->tds = $request->input('tds');
            $ojSalaryslip->other = $request->input('other');
            $ojSalaryslip->updated_at = date("Y-m-d h:i:s");
            $ojSalaryslip->updated_at = date("Y-m-d h:i:s");
            if($ojSalaryslip->save()){
                return "true";
            }else{
                return "false";
            }
        }
    }
    public function editSalaryslip($request){

        $checkSalarySlip = Salaryslip::where("month",$request->input('month'))
                                    ->where("year",$request->input('year'))
                                    ->where("employee",$request->input('employee'))
                                    ->where("id","!=",$request->input('editId'))
                                    ->count();
        if($checkSalarySlip != 0){
            return "exits";
        }else{
            $ojSalaryslip = Salaryslip::find($request->input('editId'));
            $ojSalaryslip->empDepartment = $request->input('empDepartment');
            $ojSalaryslip->empDesignation = $request->input('empDesignation');
            $ojSalaryslip->employee = $request->input('employee');
            $ojSalaryslip->month = $request->input('month');
            $ojSalaryslip->year = $request->input('year');
            $ojSalaryslip->wd = $request->input('wd');
            $ojSalaryslip->wo = $request->input('wo');
            $ojSalaryslip->ph = $request->input('ph');
            $ojSalaryslip->pd = $request->input('pd');
            $ojSalaryslip->lwp = $request->input('lwp');
            $ojSalaryslip->basic = $request->input('basic');
            $ojSalaryslip->hra = $request->input('hra');
            $ojSalaryslip->leave_encash = $request->input('leave_encash');
            $ojSalaryslip->produc = $request->input('produc');
            $ojSalaryslip->convei = $request->input('convei');
            $ojSalaryslip->transport = $request->input('transport');
            $ojSalaryslip->pf = $request->input('pf');
            $ojSalaryslip->esi = $request->input('esi');
            $ojSalaryslip->pt = $request->input('pt');
            $ojSalaryslip->tds = $request->input('tds');
            $ojSalaryslip->other = $request->input('other');
            $ojSalaryslip->updated_at = date("Y-m-d h:i:s");
            $ojSalaryslip->updated_at = date("Y-m-d h:i:s");
            if($ojSalaryslip->save()){
                return "true";
            }else{
                return "false";
            }
        }
    }

    public function getSalaryslipDetails($id){
        return Salaryslip ::from('salary_slip')
                            ->join("myemployee","myemployee.id","=","salary_slip.employee")
                            ->join("employee_department","employee_department.id","=","salary_slip.empDepartment")
                            ->join("employee_designation","employee_designation.id","=","salary_slip.empDesignation")
                            ->where("salary_slip.id",$id)
                            ->select("employee_department.department","employee_designation.designation","myemployee.firstname","myemployee.lastname","myemployee.emp_no",
                                "myemployee.email","myemployee.doj","myemployee.accountno","myemployee.pfno","myemployee.esino","myemployee.bankname","myemployee.esino",
                                    "salary_slip.empDepartment","salary_slip.id","salary_slip.empDesignation","salary_slip.employee","salary_slip.month","salary_slip.year","salary_slip.wd","salary_slip.wo","salary_slip.ph","salary_slip.pd","salary_slip.lwp","salary_slip.basic","salary_slip.hra","salary_slip.leave_encash","salary_slip.produc","salary_slip.convei","salary_slip.transport","salary_slip.pf","salary_slip.esi","salary_slip.pt","salary_slip.tds","salary_slip.other")
                            ->get();
    }

    public function deleteSalarySlip($data){

        $obj = Salaryslip::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
