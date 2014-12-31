<?php

/*
 * 
 */

interface iCard
{
    
    /**
     * 
     */
    public function set_type($type);
    public function set_value($value);
    public function get_type();
    public function get_value();
    public function get_id();
}
