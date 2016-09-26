<meta charset="utf-8">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('placas_model');

			
	}
		
	public function index() 
	{
  		redirect('placa/visualizar_todos');
	} 

	public function visualizar_todos()
	{
		
	    $this->load->model('placas_model');

	    $placas = $this->placas_model->get_placas();

	    $dados = array(
	      
	      "view"    => 'placa/visualizar_todos',
	      "placas" => $placas

		);
		 
	    $this->load->view('template', $dados);

	}

	public function cadastrar()
	{
		$alerta = null;

		if($this->input->post('cadastrar') && $this-> input-> post('cadastrar') === 'cadastrar')
		{
			//Definir regras de validação
			$this->form_validation->set_rules('nome_placa', 'NOME_PLACA', 'required|is_unique[placas.nome_placa]');
			$this->form_validation->set_rules('descricao_placa', 'DESCRICAO_PLACA', 'required|min_length[20]|max_length[300]');
			

			if($this->form_validation-> run() === TRUE)
			{
			    $nome_placa = $this->input->post("nome_placa");
			    $descricao_placa = $this->input->post("descricao_placa");
			    //Trabalhar o upload do arquivo

			    //Configurar a biblioteca
			    $config["upload_path"] = FCPATH. "assets/uploads/placas";//para onde vou enviar este arquivo
			    $config["allowed_types"] = "jpg|jpeg|gif|png";
			          

			    $this->load->library("upload", $config);

				if($this->upload->do_upload('nome_imagem'))
				{
					$info_imagem = $this->upload->data();
					$nome_imagem = $info_imagem["file_name"];

					$this->load->model('placas_model');

				    $dados_placa = array(
				        "nome_placa"      => $nome_placa,
				        "descricao_placa" => $descricao_placa,
				        "nome_imagem"    => $nome_imagem

			           );
			          

			     
				    $cadastrou = $this->placas_model->create_placa($dados_placa);

					if($cadastrou)
					{
					    //placa cadastrada
					    $alerta = array(
					      "class" => "success",
					      "mensagem" => "Atenção! A placa FOI cadastrada com sucesso!"
					    	);
					}
					else
					{
					 	//placa não cadastrada
						$alerta = array(
					    "class" => "danger",
					    "mensagem" => "Atenção! A placa NÂO foi cadastrada..."
					    	);
					}
				}	
				else
				{
					$erros = $this->upload->display_errors();

					$alerta = array(
					"class" => "danger",
					"mensagem" => "Atenção! A placa não foi cadastrada.</br>". $errors
						);
				}

			}
			else
			{
			   	//Formulário inválido
			    $alerta = array(
			        "class" => "danger",
			        "mensagem" => "Atenção! O formulário não foi validado.</br>".validation_errors()
			       	);
			}
	    }

		$dados = array(
			"alerta" => $alerta,
			"view"   => 'placa/cadastrar'
			);
	   
	    $this->load->view('template', $dados);
	
	}

	public function editar($codigo_placa)
	{

    	$alerta = null;
    	$placa = null;
     
    	 //Converte o id dA placa para int
    	$codigo_placa = (int) $codigo_placa;

    	if($codigo_placa) 
    	{
	        //Carrega o model
	        $this->load->model('placas_model');

	        //Verifica se A placa está cadastrado no banco
	        $existe = $this->placas_model->get_placa($codigo_placa);
	        if ($existe) 
	        {
		        //Armazena em uma variável legível
		        $placa = $existe;

		        if($this->input->post('editar') === "editar")
		        {

		            //Converte TAMBÉM o id dA placa, que vem do post, para int
		            $codigo_placa_form = (int) $this ->input-> post('codigo_placa');

		            //Definir regras de validação
		            $this->form_validation->set_rules('nome_placa', 'NOME_PLACA', 'required|is_unique[placas.nome_placa]');
					$this->form_validation->set_rules('descricao_placa', 'DESCRICAO_PLACA', 'required|min_length[20]|max_length[300]');

		            //Verficar se as regras são atentidas
	            	if ($this->form_validation->run() === TRUE)
	            	{

	            		$nome_placa = $this->input->post("nome_placa");
					    $descricao_placa = $this->input->post("descricao_placa");
					    //Trabalhar o upload do arquivo

					    //Configurar a biblioteca
					    $config["upload_path"] = FCPATH. "assets/uploads/placas";//para onde vou enviar este arquivo
					    $config["allowed_types"] = "jpg|jpeg|gif|png";
					          

					    $this->load->library("upload", $config);

						if($this->upload->do_upload('nome_imagem'))
						{
							$info_imagem = $this->upload->data();
							$nome_imagem = $info_imagem["file_name"];

							$this->load->model('placas_model');

								$placa_atualizada = array(
					                "nome_placa"=> $this->input->post('nome_placa'),
					                "descricao_placa"=> $this->input->post('descricao_placa'),
					                "nome_imagem"=> $this->input->post('nome_imagem')
					                  );
				                
			              	$atualizou = $this->placas_model->update_placa($codigo_placa, $placa_atualizada);


			              	if($atualizou)
			              	{

			                 	$alerta = array(
				                    "class" => "success",
				                    "mensagem" => "Atenção! A placa foi atualizada com sucesso!</br>"
			                 	);

			              	}
			              	else
			              	{
			              		//Formulário Inválido
		                  		$alerta = array(
		                    	"class" => "danger",
		                    	"mensagem" => "Atenção! A placa foi não atualizada. :(</br>"
		                			);	
			              	}
			             }		
						else
						{
							$erros = $this->upload->display_errors();

							$alerta = array(
							"class" => "danger",
							"mensagem" => "Atenção! A placa não foi atualizada.</br>".$erros
								);
						}


	            	} 
	            	else 
	            	{
	            		//Formulário Inválido
		            	$alerta = array(
		            	  "class" => "danger",
		            	  "mensagem" => "Atenção! O formulário não foi validado.</br>".validation_errors()
		            	);

	            	}


        		}

	        }
	        else
	        {
	          // Define um valor vazio para a placa
	          $placa = FALSE;
	          
	          //placa não existe
	          $alerta = array(
	            "class" => "danger",
	            "mensagem" => "Atenção! A placa informada não está cadastrada.</br>"
	          );
	        }

    	}
    	else
    	{
	      	//placa inválido
	       	$alerta = array(
	          	"class" => "danger",
	          	"mensagem" => "Atenção! A placa informada está incorreta.</br>"
	        	);
    	}

      	$dados = array(
            "alerta" => $alerta,
            "placa" => $placa,
            "view"    => 'placa/editar'
        	);
         
        $this->load->view('template', $dados);

	}

	public function deletar($codigo_placa)
  {
     $alerta = null;
     
     //Converte o id da placa para int
     $codigo_placa = (int) $codigo_placa;

     if($codigo_placa)
     {
        //Carrega o model
        $this->load->model('placas_model');

        //Verifica se a placa está cadastrado no banco
        $existe = $this->placas_model->get_placa($codigo_placa);
        if ($existe) 
        {
          $deletou = $this->placas_model->delete_placa($codigo_placa);

          if($deletou)
          {
            $arquivo = FCPATH . "assets/uploads/placas/". $existe["nome_imagem"];
            if(file_exists($arquivo))
            {
              unlink($arquivo);
            }
            //placa deletado com sucesso.
            $alerta = array(
              "class" => "success",
              "mensagem" => "Atenção! A placa foi escluída.</br>"
            );



          	}
          	else
          	{
            	//placa não foi excluída.
            	$alerta = array(
            	  "class" => "danger",
            	  "mensagem" => "Atenção! A placa não foi escluída!</br>"
            	);
          	}

        }
        else
        {
          //placa não existe
          $alerta = array(
            "class" => "danger",
            "mensagem" => "Atenção! A placa não foi excluída.</br>"
          );
        }

     }
     else
     {
        //placa inválido
         $alerta = array(
            "class" => "danger",
            "mensagem" => "Atenção! A placa informada está incorreta.</br>"
         );


     }


      
      $dados = array(
        "alerta" => $alerta,
         "view" => 'placa/deletar'
      );
     
      $this->load->view('template', $dados);

  }




}