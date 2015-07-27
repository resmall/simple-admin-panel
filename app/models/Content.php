<?php

class Content extends Eloquent {
    protected $table = 'content';
    protected $fillable = array('page_title', 'page_content');
    public $timestamps = true;
    public static $rules = array(
            'page_title' => 'required|min:10',
            'page_content' => 'required|min:200'
    );

}
