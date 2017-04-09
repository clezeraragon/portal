<?php

/**
 * Created by PhpStorm.
 * User: Michel
 * Date: 15/05/2015
 * Time: 12:01
 */
class RedimensionaImagem extends \Intervention\Image\Facades\Image
{
    private $imagem;
    private $nomeDaImagem;
    private $extensaoDaImg;

    public function __construct($imagem = null)
    {
        $this->imagem = $imagem;

    }

    protected function criaDireitorio()
    {
        file_exists($this->path) ? $this->path : File::makeDirectory($this->path, $mode = 0777, true, true);
    }

    public function redimensionarImagem($id_do_post, $nomeDaImagem, $extensaoDaImg)
    {
        $this->nomeDaImagem = $nomeDaImagem;
        $this->extensaoDaImg = $extensaoDaImg;

        $this->id_do_post = $id_do_post;
        $this->path = public_path() . '/assets/imagens/conteudo/' . $this->id_do_post;
        $width = \Image::make($this->imagem)->width();
        $height = \Image::make($this->imagem)->height();
        $this->tamanhos = array
        (
            array($width, $height),
            array(565, 339, 90),
            array(365, 220, 90),
            array(349, 210, 90),
            array(251, 151, 90),
            array(132, 79, 90),


        );

        $this->salvaImagem();
    }

    public function salvaImagem()
    {
        $this->criaDireitorio();

        $img = \Image::make($this->imagem);
        foreach ($this->tamanhos as $row) {

            if (count($row) < 3) {
                $img->save($this->path . "/" . $this->nomeDaImagem . "." . "$this->extensaoDaImg");

            } else {
                $img->resize($row[0], $row[1]);
                $img->save($this->path . "/" . $row[0] . "x" . $row[1] . "_" . $this->nomeDaImagem . "." . $this->extensaoDaImg, $row[2]);

            }

        }

    }


}