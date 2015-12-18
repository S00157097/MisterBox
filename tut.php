<?PHP
    class Chest {
        protected $lock;
        protected $isClosed;
        
        public function __construct($lc) {
            $this->lock = $lc;
        }
        
        public function Close($lock = true) {
            if($lock === true)
                $this->lock->Lock();
            
            $this->isClosed = true;
            
            echo 'Closed';
        }
        
        public function Open() {
            if($this->lock->IsLocked())
                $this->lock->UnLock();
            
            $this->isClosed = false;
            
            echo 'Opened';
        }
        
        public function IsCLosed() {
            return $this->isCLosed;
        }
    }



    class Lock {
        protected &isLocked;
        
        public function Lock() {
            $this->isLocked = true;
        }
        
        public function UnLock() {
            $this->isLocked = false;
        }
        
        public function IsLocked() {
            return $this->isLocked;
        }    
    }

    $chest = new Chest(new Lock);
    $chest->Close();
    $chest->Open();
?>