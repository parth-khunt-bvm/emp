<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;
    protected $table = 'faqs';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'faqs.id',
            1 => 'faqs.question',
            2 => 'faqs.answer',

        );
        $query = Faqs ::from('faqs')
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
                ->select('faqs.id','faqs.question','faqs.answer')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteFaqs" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-faqs-edit', $row['id']) . '" class="btn btn-icon"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['question']);
            $nestedData[] = ucfirst($row['answer']);
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
    public function addDetail($request){
        $obj = new Faqs();
        $obj->question = $request->input('question');
        $obj->answer = $request->input('answer');
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
    public function getDetail($id){
        return Faqs::select('id','question','answer')->where("id",$id)->get();
    }
    public function editDetail($request){

        $obj  = Faqs::find($request->input('editId'));
        $obj->question = $request->input('question');
        $obj->answer = $request->input('answer');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
    public function getAllDetails(){
        return Faqs::select('id','question','answer')
        ->where("is_deleted","No")->get();
    }
    public function  deleteFaqs($data){
        $obj = Faqs::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
