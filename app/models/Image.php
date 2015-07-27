<?php

class Image extends \Eloquent {
	protected $fillable = [];

	public function scopeRules()
	{
	    return [
	      'featured_image' => 'mimes:png,jpeg,jpg'
	    ];
	}
}
