<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class Technologiescategory extends Model
{
    use HasFactory;
    protected $table = "technologies_category";

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'technologies_category.id',
            1 => 'technologies_category.category',

        );
        $query = Testimonials ::from('technologies_category');

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
                ->select('technologies_category.id','technologies_category.category')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {


            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteTechnologies" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-technologies-category-edit', $row['id']) . '" class="btn btn-icon"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['category']);
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
        $objTechnologiescategory = new Technologiescategory();
        $objTechnologiescategory->category = $request->input('technologies');
        $objTechnologiescategory->is_deleted = "No";
        $objTechnologiescategory->created_at = date("Y-m-d h:i:s");
        $objTechnologiescategory->updated_at = date("Y-m-d h:i:s");
        return $objTechnologiescategory->save();
    }
    public function editCategory($request){
        $objTechnologiescategory = Technologiescategory::find($request->input('id'));
        $objTechnologiescategory->category = $request->input('technologies');
        $objTechnologiescategory->updated_at = date("Y-m-d h:i:s");
        return $objTechnologiescategory->save();
    }

    public function getDetail($id){
        return Technologiescategory::select("category","id")->where('id',$id)->get();
    }

    public function  deleteTechnologies($data){
        $objTechnologiescategory = Technologiescategory::find($data['id']);
        $objTechnologiescategory->is_deleted = "Yes";
        $objTechnologiescategory->updated_at = date("Y-m-d h:i:s");
        return $objTechnologiescategory->save();
    }

    public function getCategroy(){
        return Technologiescategory::select("category","id")->where('is_deleted',"No")->get();
    }

    public function getHomeCategroy(){
        return Technologiescategory::select("technologies_category.category","technologies_category.id")
                                    ->join("technologies","technologies.cat_id","=","technologies_category.id")
                                    ->where('technologies_category.is_deleted',"No")
                                    ->where('technologies.is_deleted',"No")
                                    ->groupBy('technologies_category.id')
                                    ->get();
    }
}
