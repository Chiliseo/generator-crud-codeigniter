<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// Api Rest
use Restserver\Libraries\REST_Controller;
require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');
require(APPPATH . 'libraries/jsonpath-0.8.1.php');
// Show Errors
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

class <%=moduleName%> extends REST_Controller{

    public function index()
	{
        $this->load->model('><%=moduleName%>_model');
        $<%=moduleNameVar%> = $this-><%=moduleName%>_model->get_all();
        if($<%=moduleNameVar%>)
        {
            $this->response($<%=moduleNameVar%>, 200);
        }else
        {
            $this->response(NULL, 500);
        }
    }
    public function <%=moduleName%>_create()
	{
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function <%=moduleName%>_list()
	{
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function <%=moduleName%>_update()
	{
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function <%=moduleName%>_delete()
	{
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    
} 