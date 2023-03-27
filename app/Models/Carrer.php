<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Carrer extends Model
{
    use HasFactory;

    protected $table = 'carrer';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'department_name',
            2 => 'icon',
            3 => 'experience',
            4 => 'details'
        );
        $query = Carrer ::from('carrer')
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
                ->select('id','department_name','icon','details','experience')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $image = url("public/upload/career/" . $row['icon']);
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteCarrer" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-carrer-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['department_name'];
            $nestedData[] = '<img height="100px" width="100px" src="' . $image . '" style="margin:10px;">';
            $nestedData[] = $row['experience'];
            // $nestedData[] = substr($row['details'],0,250);
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
    public function addCarrer($request){
        $obj = new Carrer();
        if ($request->file('icon')) {
            $imagenew = $request->file('icon');
            $icon = time() . '1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/career');
            $imagenew->move($destinationPath, $icon);
            $obj->icon = $icon;
        }
        $obj->department_name = $request->input('department_name');
        $obj->details = $request->input('details');
        $obj->experience = $request->input('experience');
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();

    }
    public function getDetail($id){
        return Carrer::from('carrer')
        ->select('carrer.id','carrer.department_name','carrer.details','carrer.experience','carrer.icon')
        ->where("carrer.is_deleted","No")
        ->where("carrer.id",$id)
        ->get();
     }
     public function getDetailWithoutId($id){
        return Carrer::from('carrer')
        ->select('carrer.id','carrer.department_name','carrer.details','carrer.experience','carrer.icon')
        ->where("carrer.is_deleted","No")
        ->where("carrer.id",'!=',$id)
        ->get();
     }

    public function editDetail($request){
        $obj  = Carrer::find($request->input('editId'));
        if ($request->file('icon')) {
            $imagenew = $request->file('icon');
            $icon = time() . '1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/career');
            $imagenew->move($destinationPath, $icon);
            $obj->icon = $icon;
        }
        $obj->department_name = $request->input('department_name');
        $obj->details = $request->input('details');
        $obj->experience = $request->input('experience');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();

     }

    public function getAllDetails(){
        return Carrer::from('carrer')
                        ->select('carrer.id','carrer.department_name','carrer.details','carrer.experience','carrer.icon')
                        ->where("carrer.is_deleted","No")
                        ->get();
    }

    public function  deleteCarrer($data){
        $obj = Carrer::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
