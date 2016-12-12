
<?php 

class Home extends Controller{

    protected function index(){
        $viewmodel = new HomeModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

}

?>
