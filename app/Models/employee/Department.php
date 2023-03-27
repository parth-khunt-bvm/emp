<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Myemployee;
use DB;
class Department extends Model
{
    protected $table = 'employee_department';
    use HasFactory;

    public function noofdepartment(){
        return Department::where('is_deleted','No')->count();
    }

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'department',

        );
        $query = Department ::from('employee_department')
                    ->where("is_deleted","No");


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
                ->select('id','department')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteDepartment" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('employee-department-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['department'];
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


    public function getdatatableWithEmployee(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'employee_department.id',
            1 => 'employee_department.department',

        );
        $query = Department ::from('employee_department')
                    ->leftjoin('myemployee','employee_department.id','=','myemployee.department')
                    ->where("myemployee.is_deleted","N")
                    ->where("employee_department.is_deleted","No")
                    ->groupby('employee_department.id');


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
                ->select('employee_department.*',DB::raw("count(myemployee.department) as count"))
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $actionhtml = '';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['department'];
            $nestedData[] = $row['count'];
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
    public function addDepartment($data){
        $count = Department::where("department", $data)->count();
       if ($count == 0) {
           $obj = new Department();
           $obj->department = $data;
           $obj->created_at = date("Y-m-d h:i:s");
           $obj->updated_at = date("Y-m-d h:i:s");
           if ($obj->save()) {
             return "true";
           } else {
               return "wrong";
            }
       }
       else {
            return "exits";
       }
    }

    public function getDetail($id){
        return Department::select('id','department')->where("id",$id)->get();
    }

    public function editDetail($request){
        $count = Department::where("department",$request->input('department'))
                            ->where("id","!=", $request->input('editId'))
                            ->count();
        if ($count == 0) {
            $obj  = Department::find($request->input('editId'));
            $obj->department = $request->input('department');
            $obj->updated_at = date("Y-m-d h:i:s");
            if ($obj->save()) {
              return "true";
            } else {
                return "wrong";
             }
        }
        else {
             return "exits";
        }

    }

    public function getAllDetails(){
        return Department::select('id','department')->where("is_deleted","No")->get();
    }

    public function  deleteDepartment($data){
        $obj = Department::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
