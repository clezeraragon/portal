<?php

class CmsBloco extends BaseModel
{

    protected $table = 'cms_bloco';

    protected $guarded = array();

    protected $fillable = array('nome', 'identificacao', 'qtd_itens', 'descricao');

    public static $rules = array(
        'nome' => 'required|min:5|max:100|unique:cms_bloco,nome',
        'descricao' => 'required',

    );


    public function getGrid()
    {
        return $this->all();
    }

    public static function validate($data)
    {
        if (Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['nome'] .= ",$id";

        }

        return Validator::make($data, self::$rules);
    }

    public function video()
    {
        return $this->belongsToMany('Video', 'cms_bloco_video_item', 'bloco_id', 'video_id', 'ordem')->withPivot('id', 'ordem', 'video_id');
    }

    public function materia()
    {
        return $this->belongsToMany('Conteudo', 'cms_bloco_materia_item', 'bloco_id', 'conteudo_id', 'ordem')->withPivot('id', 'ordem', 'conteudo_id');
    }

    public function getBlocoVideo3p($identificacao)
    {

        $videos = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("video.status", "=", 1)
            ->join("cms_bloco_video_item", "cms_bloco_video_item.bloco_id", "=", "cms_bloco.id")
            ->join("video", "cms_bloco_video_item.video_id", "=", "video.id")
            ->get(array("cms_bloco_video_item.ordem", "video.link", "video.id", "cms_bloco.nome", "video.status"))
            ->toArray();

        return Util::shuffle_assoc($videos);
    }
    public static function getQuantidadeItensMateria($id)
    {
       $bloco = static::where('id',$id)->select('qtd_itens')->get();

        foreach ($bloco as $result) {

            return $result['qtd_itens'];
        }


    }

    public function getBlocoVideo2p($identificacao)
    {

        $conteudo = array();
        $indice1 = 0;
        $indice2 = 0;
        $videos = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("video.status", "=", 1)
            ->join("cms_bloco_video_item", "cms_bloco_video_item.bloco_id", "=", "cms_bloco.id")
            ->join("video", "cms_bloco_video_item.video_id", "=", "video.id")
            ->get(array("cms_bloco_video_item.ordem", "video.link", "video.id", "video.titulo"))
            ->toArray();

        foreach ($videos as $result) {

            $conteudo[$indice1][$indice2]['titulo'] = $result['titulo'];
            $conteudo[$indice1][$indice2]['link'] = $result['link'];
            $indice2 += 1;
            if ($indice2 % 2 == 0) {
                $indice1 += 1;


            }

        }
        return Util::shuffle_assoc($conteudo);

    }

    public function getBlocoMateria1x3($identificacao)
    {
        $bloco = array();
        $conteudo = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome", "conteudo.nome_img"))
            ->toArray();
        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $bloco[$key]['ordem'] = $result['ordem'];
            $bloco[$key]['conteudo_id'] = $result['conteudo_id'];
            $bloco[$key]['nome'] = $result['nome'];
            $bloco[$key]['titulo'] = $result['titulo'];
            $bloco[$key]['nome_img'] = $result['nome_img'];
            $bloco[$key]['url'] = $result['url'];
            $bloco[$key]['introducao'] = $result['introducao'];
            $bloco[$key]['path_img'] = $result['path_img'];

        }
        return $bloco;

    }

    public function getBlocoMateriaCarrossel($identificacao)
    {
        $carrossel = array();
        $conteudo =  $this->orderBy('cms_bloco_materia_item.ordem')->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "conteudo.nome_img"))
            ->toArray();
        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $carrossel[$key]['conteudo_id'] = $result['conteudo_id'];
            $carrossel[$key]['ordem'] = $result['ordem'];
            $carrossel[$key]['titulo'] = $result['titulo'];
            $carrossel[$key]['nome_img'] = $result['nome_img'];
            $carrossel[$key]['url'] = $result['url'];
            $carrossel[$key]['path_img'] = $result['path_img'];

        }
        return $carrossel;


    }

    public function getBlocoMateriaNoticiaDestaque($identificacao)
    {

        return $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();


    }

    public function getBlocoMateriaBannerDestaque($identificacao)
    {

        return $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome"))
            ->toArray();


    }

    public function getBlocoMateriaBlocoE($identificacao)
    {
        $bloco_e = array();
        $conteudo = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();

        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $bloco_e[$key]['ordem'] = $result['ordem'];
            $bloco_e[$key]['conteudo_id'] = $result['conteudo_id'];
            $bloco_e[$key]['nome'] = $result['nome'];
            $bloco_e[$key]['titulo'] = $result['titulo'];
            $bloco_e[$key]['nome_img'] = $result['nome_img'];
            $bloco_e[$key]['url'] = $result['url'];
            $bloco_e[$key]['introducao'] = $result['introducao'];
            $bloco_e[$key]['path_img'] = $result['path_img'];

        }
        return $bloco_e;

    }
    public function getBlocoMateriaBlocoSuperiorE($identificacao)
    {
        $bloco_superior_e = array();
        $conteudo = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();

        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $bloco_superior_e[$key]['ordem'] = $result['ordem'];
            $bloco_superior_e[$key]['conteudo_id'] = $result['conteudo_id'];
            $bloco_superior_e[$key]['nome'] = $result['nome'];
            $bloco_superior_e[$key]['titulo'] = $result['titulo'];
            $bloco_superior_e[$key]['nome_img'] = $result['nome_img'];
            $bloco_superior_e[$key]['url'] = $result['url'];
            $bloco_superior_e[$key]['introducao'] = $result['introducao'];
            $bloco_superior_e[$key]['path_img'] = $result['path_img'];

        }
        return $bloco_superior_e;

    }
    public function getBlocoMateriaBlocoSuperiorD($identificacao)
    {
        $bloco_superior_d = array();
        $conteudo = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();

        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $bloco_superior_d[$key]['ordem'] = $result['ordem'];
            $bloco_superior_d[$key]['conteudo_id'] = $result['conteudo_id'];
            $bloco_superior_d[$key]['nome'] = $result['nome'];
            $bloco_superior_d[$key]['titulo'] = $result['titulo'];
            $bloco_superior_d[$key]['nome_img'] = $result['nome_img'];
            $bloco_superior_d[$key]['url'] = $result['url'];
            $bloco_superior_d[$key]['introducao'] = $result['introducao'];
            $bloco_superior_d[$key]['path_img'] = $result['path_img'];

        }
        return $bloco_superior_d;
    }

    public function getBlocoMateriaBlocoD($identificacao)
    {
        $bloco_d = array();
        $conteudo = $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();

        foreach ($conteudo as $key => $result) {

            $key = $result['ordem'];
            $bloco_d[$key]['ordem'] = $result['ordem'];
            $bloco_d[$key]['conteudo_id'] = $result['conteudo_id'];
            $bloco_d[$key]['nome'] = $result['nome'];
            $bloco_d[$key]['titulo'] = $result['titulo'];
            $bloco_d[$key]['nome_img'] = $result['nome_img'];
            $bloco_d[$key]['url'] = $result['url'];
            $bloco_d[$key]['introducao'] = $result['introducao'];
            $bloco_d[$key]['path_img'] = $result['path_img'];

        }
        return $bloco_d;
    }

    public function getBlocoMiniCarrosselMateria($identificacao)
    {

        $mini = $this->orderBy('cms_bloco_materia_item.ordem')->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.conteudo_id","cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome","conteudo.nome_img"))
            ->toArray();

        return Util::shuffle_assoc($mini);


    }

    public function getBlocoBanners($identificacao)
    {

        return $this->where("cms_bloco.identificacao", "=", $identificacao)->where("conteudo.status_id", "=", 2)
            ->join("cms_bloco_materia_item", "cms_bloco_materia_item.bloco_id", "=", "cms_bloco.id")
            ->join("conteudo", "cms_bloco_materia_item.conteudo_id", "=", "conteudo.id")
            ->get(array("cms_bloco_materia_item.ordem", "conteudo.titulo", "conteudo.introducao", "conteudo.path_img", "conteudo.url", "cms_bloco.nome"))
            ->toArray();


    }


    public function Banners200x400()
    {
        // Metodo para banner-lateral com 206x434px

        $banners[0]['imagem'] = "/portal/images/banner-static/banner_descontos.jpg";
        $banners[0]['url'] = "lista-cupons-de-desconto";

//        $banners[1]['imagem'] = "/portal/images/banner-static/16c17k3.png";
//        $banners[1]['url'] = "www.nose.tal";
//
//        $banners[2]['imagem'] = "/portal/images/banner-static/Barbara-Palvin-Christmas-200x400.jpg";
//        $banners[2]['url'] = "pagina.html";

        return $banners;


    }

}


