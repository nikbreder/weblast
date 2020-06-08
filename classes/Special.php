<?php

class Special extends Table {

    public $special_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $active = 1;


    public function validate()
        {

            if (!empty($this->name) && !empty($this->otdel_id) && !empty($this->active)) {
                return true;
            }
            return false;

        }
}
