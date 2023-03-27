<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\Department;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'employee_designation';

    public function noofdesignation(){
        return Designation::where('is_deleted','No')->count();
    }

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'employee_designation.id',
            1 => 'employee_department.department',
            2 => 'employee_designation.designation',
               );
        $query = Designation ::from('employee_designation')
                    ->join("employee_department","employee_department.id","=","employee_designation.department_id")
                    ->where("employee_designation.is_deleted","No");

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
                ->select('employee_designation.id','employee_department.department','employee_designation.designation')
                ->where("employee_designation.is_deleted","No")
                ->get();
        $data = array();


        $i = 0;
        foreach ($resultArr as $row) {
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteDesignation" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('employee-designation-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['department'];
            $nestedData[] = $row['designation'];
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
    public function addDesignation($request){
        $obj = new Designation();
        $obj->designation = $request->input('designation');
        $obj->department_id = $request->input('department_id');
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
    public function getDetail($id){
        return Designation::select('id','designation','department_id')->where("id",$id)->get();
    }

    public function getDesignation($id){
        return Designation::select('id','designation','department_id')->where("department_id",$id)->get();
    }

    public function editDetail($request){
        $obj = new Designation();
        $obj  = Designation::find($request->input('editId'));
        $obj->designation = $request->input('designation');
        $obj->department_id = $request->input('department_id');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
    public function  deleteDesignation($data){
        $obj = Designation::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
    public function getAllDetails(){
        return Designation::select('id','designation','department_id')->get();
    }
}
