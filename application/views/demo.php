public function get_login_volley()
  {
    
        $username = trim($this->input->post("userid"));
        $password = trim($this->input->post("password"));
        $usr_result = $this->Inm->get_user($username,$password);
      
        $result=array();
        $result['Login']=array();
        
        if(isset($usr_result)){
            
            $index['name']=$usr_result->name;
            $index['email']=$usr_result->email;
            
            array_push($result['Login'],$index);
            $result['success']=1;
            $result['message']="success";
            echo json_encode($result);
        }
        else
        {
            $result['success']=0;
            $result['message']="error";
            echo json_encode($result);
        }