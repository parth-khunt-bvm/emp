<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employeeno;
use DB;
class Employee extends Model
{
    use HasFactory;
    protected $table = 'myemployee';

    public function noofemployee(){
        return Employee::where('is_deleted','N')->count();
    }

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'myemployee.id',
            1 => 'myemployee.image',
            2 => 'myemployee.firstname',
            3 => 'myemployee.lastname',
            4 => 'myemployee.email',
            5 => 'myemployee.mobileno',
            6 => 'myemployee.emergencyno',
            7 => 'myemployee.dob',
            8 => 'myemployee.doj',
        );
        $query = Employee ::from('myemployee')
                    ->where("myemployee.is_deleted","N");

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
                ->select('myemployee.id','myemployee.gender','myemployee.dob','myemployee.doj','myemployee.emp_no','myemployee.image','myemployee.firstname','myemployee.lastname','myemployee.email','myemployee.mobileno','myemployee.emergencyno')
                ->get();
        $data = array();


        $i = 0;
        foreach ($resultArr as $row) {
            if($row['image'] != null || $row['image'] != ''){
                if(file_exists( public_path().'/upload/employeeImage/'.$row['image']) ){
                    $image = url("public/upload/employeeImage/" . $row['image']);
                }else{
                    if($row['gender'] == 'M'){
                        $image = url("public/upload/employeeImage/male.png");
                    }else{
                        if($row['gender'] == 'F'){
                            $image = url("public/upload/employeeImage/female.png");
                        }else{
                            $image = url("public/upload/employeeImage/other.png");
                        }
                    }
                }
            }else{
                if($row['gender'] == 'M'){
                    $image = url("public/upload/employeeImage/male.png");
                }else{
                    if($row['gender'] == 'F'){
                        $image = url("public/upload/employeeImage/female.png");
                    }else{
                        $image = url("public/upload/employeeImage/other.png");
                    }
                }
            }


            $actionhtml ='<a href="' . route('employee-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>'
            .'<a href="' . route('employee-view', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-eye"> </i></a>'
            .'<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteEmployee" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>';
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['emp_no'];
            $nestedData[] = '<img height="100px" width="100px" src="' . $image . '" style="margin:10px;border-radius: 50%;">';
            $nestedData[] = $row['firstname'];
            $nestedData[] = $row['lastname'];
            $nestedData[] = $row['email'];
            $nestedData[] = $row['mobileno'];
            $nestedData[] = $row['emergencyno'];
            $nestedData[] = date("d/m/Y",strtotime($row['dob']));
            $nestedData[] = date("d/m/Y",strtotime($row['doj']));
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
    public function addEmployee($request){

        $count = Employee::where('email',$request->input('empEmail'))->where("is_deleted","N")->count();

        if($count == 0){
            $objEmployee = new Employee();
            if ($request->file('empImage')) {
                $image = $request->file('empImage');
                $employeeImage = time() . '1.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/employeeImage');
                $image->move($destinationPath, $employeeImage);
                $objEmployee->image = $employeeImage;
            }

            $objEmployee->emp_no = $request->input('empNoNew');
            $objEmployee->firstname = $request->input('empFirstName');
            $objEmployee->lastname = $request->input('empLastName');
            $objEmployee->email = $request->input('empEmail');
            $objEmployee->dob = date("Y-m-d",strtotime($request->input('empDob')));
            $objEmployee->mobileno = $request->input('empMobileNo');
            $objEmployee->emergencyno = $request->input('empEmrNo');
            $objEmployee->gender = $request->input('empgender');
            $objEmployee->education = $request->input('empEducation');
            $objEmployee->passingyear = $request->input('empPassingYear');
            $objEmployee->institute = $request->input('empCollageName');
            $objEmployee->experience = $request->input('empExperience');
            $objEmployee->address = $request->input('empAddress');
            $objEmployee->country = $request->input('empCountry');
            $objEmployee->state = $request->input('empState');
            $objEmployee->city = $request->input('empCity');
            $objEmployee->department = $request->input('empDepartment');
            $objEmployee->designation = $request->input('empDesignation');
            $objEmployee->salary = $request->input('empSalary');
            $objEmployee->doj = date("Y-m-d",strtotime($request->input('empDoj')));
            $objEmployee->aadharcard = $request->input('empAadharCard');
            $objEmployee->pancard = $request->input('empPanCard');
            $objEmployee->bankname = $request->input('empBank');
            $objEmployee->branchname = $request->input('empBranch');
            $objEmployee->ifsccode = $request->input('empIfsc');
            $objEmployee->accountno = $request->input('empAccount');
            $objEmployee->pfno = $request->input('empPfno');
            $objEmployee->esino = $request->input('empEsl');
            $objEmployee->notes = $request->input('empnotes');
            $objEmployee->is_deleted = "N";
            $objEmployee->created_at = date("Y-m-d h:i:s");
            $objEmployee->updated_at = date("Y-m-d h:i:s");
            if($objEmployee->save()){
                $id = $objEmployee->id;

                $objEmployeeNo = new Employeeno();
                $empno = $objEmployeeNo->getEmpNo();
                $cur_emp_no = $empno[0]->no;

                $objEmployeeNo = Employeeno::find(1);
                $objEmployeeNo->no = $cur_emp_no + 1;
                $objEmployeeNo->updated_at = date("Y-m-d h:i:s");
                if($objEmployeeNo->save()){
                    return "true";
                }else{
                    DB::table('myemployee')->where('id', $id)->delete();
                    return "wrong";
                }
                print_r($objEmployeeNo->save());
                die();
                return "true";
            }else{
                return "wrong";
            }
        }else{
            return "exits";
        }
    }


    public function getDetail($id){
        return Employee::select('*')
                        ->where("id",$id)->get();
    }

    public function getEmployeeBasicSalary($data){

        return Employee::select('salary')->where("id",$data['employee'])->get();

    }
    public function getEmployee($request){
        return Employee::select('emp_no','firstname','lastname','id')
                        ->where("department",$request['empDepartment'])
                        ->where("designation",$request['empDesignation'])
                        ->get();
    }


    public function viewDetail($id){
        return Employee::select('myemployee.emp_no','myemployee.image','myemployee.firstname','myemployee.lastname',
                                'myemployee.email','myemployee.dob','myemployee.mobileno','myemployee.emergencyno',
                                'myemployee.gender','myemployee.education','myemployee.passingyear','myemployee.institute',
                                'myemployee.experience','myemployee.address','myemployee.salary','myemployee.doj',
                                'myemployee.aadharcard','myemployee.pancard','myemployee.bankname','myemployee.branchname',
                                'myemployee.ifsccode','myemployee.accountno','myemployee.pfno','myemployee.esino','myemployee.notes',
                                'employee_department.department','countries.name as country','states.name as state','cities.name as city','employee_designation.designation'
                            )
                            ->join("countries","countries.id","=","myemployee.country")
                            ->join("states","states.id","=","myemployee.state")
                            ->join("cities","cities.id","=","myemployee.city")
                            ->join("employee_department","employee_department.id","=","myemployee.department")
                            ->join("employee_designation","employee_designation.id","=","myemployee.designation")
                            ->where("myemployee.id",$id)
                            ->get();
    }

    public function editDetail($request){

        $count = Employee::where('email',"=",$request->input('empEmail'))
                            ->where("id","!=",$request->input('empEditId'))
                            ->where("is_deleted","N")
                            ->count();

        if($count == 0){
            $objEmployee  = Employee::find($request->input('empEditId'));

            if ($request->file('empImage')) {
                $image = $request->file('empImage');
                $employeeImage = time() . '1.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/employeeImage');
                $image->move($destinationPath, $employeeImage);
                $objEmployee->image = $employeeImage;
            }
            $objEmployee->firstname = $request->input('empFirstName');
            $objEmployee->lastname = $request->input('empLastName');
            $objEmployee->email = $request->input('empEmail');
            $objEmployee->dob = date("Y-m-d",strtotime($request->input('empDob')));
            $objEmployee->mobileno = $request->input('empMobileNo');
            $objEmployee->emergencyno = $request->input('empEmrNo');
            $objEmployee->gender = $request->input('empgender');
            $objEmployee->education = $request->input('empEducation');
            $objEmployee->passingyear = $request->input('empPassingYear');
            $objEmployee->institute = $request->input('empCollageName');
            $objEmployee->experience = $request->input('empExperience');
            $objEmployee->address = $request->input('empAddress');
            $objEmployee->country = $request->input('empCountry');
            $objEmployee->state = $request->input('empState');
            $objEmployee->city = $request->input('empCity');
            $objEmployee->department = $request->input('empDepartment');
            $objEmployee->designation = $request->input('empDesignation');
            $objEmployee->salary = $request->input('empSalary');
            $objEmployee->doj = date("Y-m-d",strtotime($request->input('empDoj')));
            $objEmployee->aadharcard = $request->input('empAadharCard');
            $objEmployee->pancard = $request->input('empPanCard');
            $objEmployee->bankname = $request->input('empBank');
            $objEmployee->branchname = $request->input('empBranch');
            $objEmployee->ifsccode = $request->input('empIfsc');
            $objEmployee->accountno = $request->input('empAccount');
            $objEmployee->pfno = $request->input('empPfno');
            $objEmployee->esino = $request->input('empEsl');
            $objEmployee->notes = $request->input('empnotes');
            $objEmployee->updated_at = date("Y-m-d h:i:s");
            if($objEmployee->save()){
                    return "true";
            }else{
                return "wrong";
            }
        }else{
            return "exits";
        }
    }

    public function  deleteEmployee($data){
        $obj = Employee::find($data['id']);
        $obj->is_deleted = "Y";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }


    public function getEmployeeList($department,$designation){
        return Employee::select('emp_no','firstname','lastname','id')
                    ->where("department",$department)
                    ->where("designation",$designation)
                    ->get();
    }
}
