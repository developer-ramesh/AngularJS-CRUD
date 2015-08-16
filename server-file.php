<?php
$mysqlconn=mysql_connect('localhost','root','123') or die('</br>Error:: '.mysql_error());
$db=mysql_selectdb('mysql',$mysqlconn);
$qry=mysql_query("select * from test_d");


//
//$arr=array();
//while($data=mysql_fetch_array($qry))
//{
//   $arr[]=$data;
//}
//echo json_encode($arr);
//
//



switch($_GET['action'])
{
    case 'add_data' :
            add_data();
            break;

    case 'get_data' :
            get_data();
            break;

    case 'edit_data' :
            edit_data();
            break;

    case 'delete_data' :              
            delete_data();
            break;

    case 'update_data' :
            update_data();
            break;
}



function add_data()
{
    $data = json_decode(file_get_contents("php://input")); 
    $name      = $data->name;    
    $phone      = $data->phone;
    $address     = $data->address;
    //print_r($data);
    $qry = 'INSERT INTO test_d (name,phone,address) values ("' . $name . '","' . $phone . '","' .$address . '")';
   
    $qry_res = mysql_query($qry);
    if ($qry_res)
    {
        $arr = array('msg' => "Data Added Successfully!!!");
        $jsn = json_encode($arr);
        print_r($jsn);
    } 
    else
    {
        $arr = array('msg' => "Error In inserting record");
        $jsn = json_encode($arr);
        print_r($jsn);
    }
}


function get_data()
{    
    $qry = mysql_query('SELECT * from test_d');
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = $rows;
    }
    print_r(json_encode($data));
    return json_encode($data);  
}


function delete_data()
{
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->prod_index;     
    //print_r($data)   ;
    $del = mysql_query("DELETE FROM test_d WHERE id = ".$index);
    if($del)
    print_r(json_encode(array('msg' =>'Data successfully deleted')));
    //return true;
   // return false;     
}


function edit_data()
{
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->prod_index; 
    $qry = mysql_query('SELECT * from test_d WHERE id='.$index);
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = $rows;
    }
    print_r(json_encode($data));
    return json_encode($data);  
}



function update_data()
{
    $data = json_decode(file_get_contents("php://input")); 
    $id             =   $data->id;
    $name           =   $data->name;    
    $phone          =   $data->phone;
    $address        =   $data->address;
    
    $qry = "UPDATE test_d set name='".$name."' , phone='".$phone."',address='".$address."' WHERE id=".$id;
  
    $qry_res = mysql_query($qry);
    if ($qry_res)
    {
        $arr = array('msg' => "Data Updated Successfully !!!");
        $jsn = json_encode($arr);
        print_r($jsn);
    }
    else
    {
        $arr = array('msg' => "Error In Updating record");
        $jsn = json_encode($arr);
        print_r($jsn);
    }
}



?>