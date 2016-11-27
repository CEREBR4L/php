<?php 

    class People{

        public $person1 = "Mike";
        public $person2 = "Johnny";
        public $person3 = "Lil Jeff";

        protected $person4 = "Erik";

        private $person5 = "Jenna";

        public function iterateObj(){

            foreach($this as $key => $value){
                print "$key => $value\n";
            }

        }

    }

    $people = new People;
    $people->iterateObj();

    echo "<br />";

    // only able to access public props 

    foreach($people as $key => $value){
        print "$key => $value\n";
    }

?>

