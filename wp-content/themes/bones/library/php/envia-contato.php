<?php
  if (isset($_POST['enviarFormulario'])){ //name input subimit


      // busca a biblioteca recaptcha
      require_once "recaptchalib.php";
      // sua chave secreta
      $secret = "6LeyQnMUAAAAAPK_LEWuaZ4HPkRtePYSUooXtfkn";
      // resposta vazia
      $response = null;
      // verifique a chave secreta
      $reCaptcha = new ReCaptcha($secret);
      // se submetido, verifique a resposta
      if ($_POST["g-recaptcha-response"]) {
      $response = $reCaptcha->verifyResponse(
              $_SERVER["REMOTE_ADDR"],
              $_POST["g-recaptcha-response"]
          );
      }
//Verifica se a resposta retornada no Google foi positiva, sendo positiva retorna a mensagem abaixo, caso contrário retorna para a página do formulário:
      if ($response != null && $response->success) {
      

 
        //Variaveis de POST, Alterar somente se necessário 
        //====================================================
         $nome = $_POST['nome'];
         $email = $_POST['email'];
         $telefone = $_POST['telefone'];
         $mensagem = $_POST['mensagem'];

        //====================================================
 
        //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
        //====================================================
        $email_remetente = "contato@dominio.com.br"; // deve ser um email do dominio
        //====================================================
 
 
        //Configurações do email, ajustar conforme necessidade
        //====================================================
        $email_destinatario = "anderson.born@gmail.com"; // qualquer email pode receber os dados
        $email_reply = "$email";
        $email_assunto = "[CONTATO] - Cliente";
        //====================================================


        //Monta o Corpo da Mensagem
        //====================================================

        $email_conteudo .= "<p>Nome: $nome</p>";
        $email_conteudo .= "<p>E-mail: $email </p>";
        $email_conteudo .= "<p>Telefone: $telefone </p>";
        $email_conteudo .= "<p>Mensagem: $mensagem </p>";

 
        //Seta os Headers (Alerar somente caso necessario)
        //====================================================
        $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=utf-8" ) );
        //====================================================
          if (mail ($email_destinatario, $email_assunto, utf8_decode($email_conteudo), $email_headers)){
            echo '<script type="text/javascript">
            alert(\'Sua mensagem foi enviada com sucesso!\nAssim que poss\u00edvel responderemos voc\u00ea.\');
            window.location.href = "http://www.dominio.com.br/contato/";
            </script>';
          }
          else{
             echo '<script type="text/javascript">
             alert(\'Falha ao enviar, por favor tente novamente.\');
             window.location.href = "http://www.dominio.com.br/contato/";   </script>';
          }
 
        } else {
           echo '<script type="text/javascript">
             alert(\'Falha ao enviar, por favor preencha o captcha para verificarmos.\');
             window.location.href = "http://www.dominio.com.br/contato/";   </script>';
           
        }

        //Enviando o email
        //====================================================
       

      }
        
?>



