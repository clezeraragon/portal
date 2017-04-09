<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 02/02/2015
 * Time: 15:27
 */

class CmsBlocoMateria extends BaseModel
{
    protected $table = 'cms_bloco_materia_item';

    protected $guarded = array();
    protected $fillable = array('bloco_id', 'conteudo_id','ordem');



    public function materia_item(){

        return $this->belongsToMany('Conteudo');

    }




}