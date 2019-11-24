<?php
   
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class User extends REST_Controller {
    
	  /**
     * Get All Data from this method  roomali2019.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function roosue_post()
	{
         $data = $this->db->where('name',$this->post('name'))->where('password',$this->post('password'))->get('products')->row();
         $this->response($data, REST_Controller::HTTP_OK);
    }
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('products',$input);
        $this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('products', $input, array('id'=>$id));
     
        $this->response(['Product updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('products', array('id'=>$id));
       
        $this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}