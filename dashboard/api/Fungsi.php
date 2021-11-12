<?php
class Fungsi
{
    public function random_id()
    {
        $permitted_chars = '0123456789';
        $rand_alnum = substr(str_shuffle($permitted_chars), 0, 3);
        $date = date('Ymdhis');
        $rand_result = $date.$rand_alnum;

        return $rand_result;
    }
}
