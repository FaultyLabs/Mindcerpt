<?php 

    class Tags extends Model {
        public function getTags() {
            return $this->findAll();
        }
    }