<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestList extends Model
{
    use HasFactory;
    protected $table = "request_list";

    public function saveDetails($request){

        $objRequestList = new RequestList();
        $objRequestList->name =$request->input('name');
        $objRequestList->email =$request->input('email');
        if($request->input('phone') == NULL || $request->input('phone') == ''){
            $objRequestList->phone = NULL;
        }else{
            $objRequestList->phone = $request->input('phone');
        }

        $objRequestList->message =$request->input('message');
        $objRequestList->updated_at = date("Y-m-d h:i:s");
        $objRequestList->updated_at = date("Y-m-d h:i:s");
        if($objRequestList->save()){
            return true;
        }else{
            return false;
        }
    }

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'request_list.id',
            1 => 'request_list.name',
            2 => 'request_list.email',
            3 => 'request_list.phone',
            4 => 'request_list.message',

        );
        $query = RequestList ::from('request_list')
                    ->where("request_list.is_deleted","No");


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
                ->select('request_list.id','request_list.name','request_list.email','request_list.phone','request_list.message')
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {

            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteRequestList" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>';
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['name']);
            $nestedData[] = $row['email'];
            if($row['phone'] != NULL || $row['phone'] != ''){
                $nestedData[] = $row['phone'];
            }else{
                $nestedData[] = "N/A";
            }
            $nestedData[] = $row['message'];
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


    public function deleteRequestList($data){
        $objRequestList = RequestList::find($data['id']);
        $objRequestList->is_deleted = "Yes";
        $objRequestList->updated_at = date("Y-m-d h:i:s");
        return $objRequestList->save();
    }
}
