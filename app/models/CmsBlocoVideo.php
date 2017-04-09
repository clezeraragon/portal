<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 02/02/2015
 * Time: 15:27
 */

class CmsBlocoVideo extends BaseModel
{
    protected $table = 'cms_bloco_video_item';

    protected $guarded = array();
    protected $fillable = array('bloco_id', 'video_id','ordem');



public function video_item(){

    return $this->belongsToMany('Video');

}


}