<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table="technologies";

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'technologies.id',
            1 => 'technologies.category',

        );
        $query = Technology ::from('technologies')
                                ->join("technologies_category","technologies_category.id","=","technologies.cat_id");

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
                ->select('technologies_category.category','technologies.image','technologies.id')
                ->where("technologies_category.is_deleted","No")
                ->where("technologies.is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {

            $image = url("public/upload/technologies/" . $row['image']);
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteTechnologies" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-technologies-edit', $row['id']) . '" class="btn btn-icon"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['category']);
            $nestedData[] = '<img  height="80px" width="80px" src="' . $image . '" style="margin:10px;">';
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

    public function addCategory($request){
        $objTechnology = new Technology();
        $objTechnology->cat_id = $request->input('technologies');

        if ($request->file('image')) {
            $image = $request->file('image');
            $technologiesImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/technologies');
            $image->move($destinationPath, $technologiesImage);
            $objTechnology->image = $technologiesImage;
        }
        $objTechnology->is_deleted = "No";
        $objTechnology->created_at = date("Y-m-d h:i:s");
        $objTechnology->updated_at = date("Y-m-d h:i:s");
        return $objTechnology->save();
    }

    public function getDetail($id){
        return Technology ::from('technologies')
                ->join("technologies_category","technologies_category.id","=","technologies.cat_id")
                ->where("technologies.id",$id)
                ->select('technologies_category.id as category','technologies.image','technologies.id')
                ->get();

    }

    public function editCategory($request){

        $objTechnology = Technology::find($request->input('id'));
        $objTechnology->cat_id = $request->input('technologies');

        if ($request->file('image')) {
            $image = $request->file('image');
            $technologiesImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/technologies');
            $image->move($destinationPath, $technologiesImage);
            $objTechnology->image = $technologiesImage;
        }
        $objTechnology->is_deleted = "No";
        $objTechnology->created_at = date("Y-m-d h:i:s");
        $objTechnology->updated_at = date("Y-m-d h:i:s");
        return $objTechnology->save();
    }

    public function deleteTechnologies($data){
        $objTechnology = Technology::find($data['id']);
        $objTechnology->is_deleted = "Yes";
        $objTechnology->updated_at = date("Y-m-d h:i:s");
        return $objTechnology->save();
    }

    public function getHomeTechnology(){
        return Technology::from('technologies')
                        ->join("technologies_category","technologies_category.id","=","technologies.cat_id")
                        ->select('technologies_category.category','technologies.image','technologies.id')
                        ->where("technologies_category.is_deleted","No")
                        ->where("technologies.is_deleted","No")
                        ->get();
    }
}
