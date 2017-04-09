<?php

class MigracaoController extends Controller {

	public function migrateUsers()
	{
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => '',
            'email'            => 'required|email|unique:users,email', //RUS-002
            'password'         => 'required|between:5,32',
            'genero'           => 'required|max:1',
            'cpf'              => 'required|unique:users,cpf',
            'telefone'         => ''
        );

        error_reporting(E_ALL);

			$con_atual = @mysql_connect("localhost", "isonhei", "1sonh3i2014", true) or die (mysql_error());
			@mysql_select_db("isonhei" , $con_atual) or die (mysql_error());

			echo $sql = "SELECT u.`email`, u.`name`, u.`cpf`, u.user_mailok, u.uid,
			 d.usu_30_telefone , d.usu_30_celular , d.`usu_22_nascimento`, d.`usu_31_sexo`, d.`usu_30_utm_campaign`, d.`usu_30_utm_source`, d.`usu_30_utm_medium`, d.`usu_30_utm_term`, d.`usu_30_utm_content`
			 FROM `rzn_users` as u,
			 `rzn_das_usu_usuarios_extra` as d
			 WHERE d.uid=u.uid
			 and u.uid not in (4418,4871,4704,4529,4312,4463,4470,4442)
			 order by u.`uid`
			 ";
            //die();
            echo "<br>";

			$result = @mysql_query($sql, $con_atual) or die(mysql_error());
            //dd(mysql_affected_rows());

			while($rs = @mysql_fetch_array($result))
			{
                if($rs['cpf']) {

                    //echo $rs['email'] . "<br>";
                    $nome = null;
                    $sobrenome = " ";

                    preg_match("/([^ ]+)/", ($rs['name']), $nome);

                    if(isset($nome[0])) {
                        $nome = $nome[0];
                        $sobrenome = (preg_replace("/" . $nome . "/", "", $rs['name']));
                        if(!$sobrenome){
                            $sobrenome = " ";
                        }
                    }
                    else{
                        $nome = $rs['name'];
                    }

                    echo $rs['email'] . " ==> ";
                    echo $nome . " ==> ";
                    echo $sobrenome . "<br>";

                    $nu_contato = " ";
                    if ($rs['usu_30_celular']) {
                        $nu_contato = $rs['usu_30_celular'];
                    } else if ($rs['usu_30_telefone']) {
                        $nu_contato = $rs['usu_30_telefone'];
                    }

                    $dados = null;
                    $dados = array(
                        'first_name' => $nome,
                        'last_name' => $sobrenome,
                        'email' => $rs['email'],
                        'password' => 'd!1G@7+_#6rt$',
                        'activated' => 1, // verificar
                        'dt_nascimento' => date("Y-m-d", $rs['usu_22_nascimento']),
                        'genero' => $rs['usu_31_sexo'],
                        'perfil_id' => User::getPerfilPadrao(),
                        'gamefication_id' => Gamefication::getNivelPadrao(),
                        'utm_source' => $rs['usu_30_utm_source'],
                        'utm_medium' => $rs['usu_30_utm_medium'],
                        'utm_term' => $rs['usu_30_utm_term'],
                        'utm_content' => $rs['usu_30_utm_content'],
                        'utm_campaign' => $rs['usu_30_utm_campaign'],
                        'cpf' => $rs['cpf'],
                        'st_portal_antigo' => 1,
                        'st_newsletter' => $rs['user_mailok'],
                        'telefone' => $nu_contato
                    );

                    $validator = \Validator::make($dados, $rules);
                    // If validation fails, we'll exit the operation now.
                    if ($validator->fails()) {

                        dd($validator->getMessageBag()->toArray());

                    }

                    // Register the user
                    $user = Sentry::register($dados);


                    //Registra pontos Fidelidade
                    $movFid = new \Fidelidade();
                    $movFid->processaCadastroPortalAntigo($user->id);
                }
			}
	}



}
