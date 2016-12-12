
<?php 

class Shares extends Controller{

    protected function index(){
        $viewmodel = new ShareModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

}

?>
