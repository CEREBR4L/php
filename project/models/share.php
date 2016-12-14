<?php 

    class ShareModel extends Model{

        public function index(){
            
            $this->query('SELECT * FROM shares ' . 
                         ' ORDER BY create_date DESC '
                        );
            $rows = $this->resultSet();
            return $rows;

        }

        public function add(){

            //sanitize post array 
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($post['submit']){

                if($post['title'] == '' || $post['bodu'] == '' || $post['link'] == ''){
                    
                    Messages::setMsg('Please fill in all post information', 'error');
                    return; 

                }
                
                //insert into mysql 
                $this->query(" INSERT INTO shares(title, body, link, user_id) " . 
                             " VALUES (:title, :body, :link, :user_id) "
                            );

                $this->bind(':title', $post['title']);
                $this->bind(':body', $post['body']);
                $this->bind(':link', $post['link']);
                $this->bind(':user_id', 1);

                $this->execute();

                //verify 

                if($this->lastInsertId()){

                    //redirect if successful
                    header('Location: '. ROOT_URL . "shares");

                }

            }

            return;

        }

    }

?>
