<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Autorização de Entrada e uso de Apartamento</title>
        <link rel="stylesheet" href="assets/css/app.css">
        <style>
            label{
                font-weight: bold;
                color: #449900;
            }
        </style>
    </head>
    <body>
        <div class="grid-container">
           
            <Br>
            &nbsp;
            <br>
                       
 
            
            
            <div id="formPrincipal"  >
                <div class="grid-x grid-padding-x">
                    <div class="large-12 cell">
                        <h1>Autorização de Entrada e uso de Apartamento</h1>
                    </div>
                </div> 
                <form id="formularioCadastro">
                    
                       <fieldset class="fieldset">
                        <legend>Período de sua Hospedagem</legend>
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 large-3 cell">
                                <label for="dataEntrada">Data de Entrada</label>
                                <input type="date" id="dataEntrada" name="dataEntrada">

                            </div>

                            <div class="small-12  large-3 cell">
                                <label for="dataSaida">Data de Saida</label>
                                <input type="date" id="dataSaida" name="dataSaida">

                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend>Hospede Principal - Responsável pela Locação</legend>
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 large-4 cell">
                                <label for="dataEntrada">Nome Hóspede Principal</label>
                                <input type="text"  required="true" class="txtVerifica" id="txtHospedePrincipal" name="txtHospedePrincipal">
                            </div> 

                            <div class="small-12 large-2 cell">
                                <label for="txtCPFPrincipal">CPF</label>
                                <input type="text"  required="true" class="txtVerifica" id="txtCPFPrincipal" name="txtCPFPrincipal">
                            </div> 
                            <div class="small-12 large-2 cell">
                                <label for="txtTelefone">Telefone</label>
                                <input type="text"  class="txtVerifica" required="true" id="txtTelefone" name="txtTelefone">
                            </div> 
                            <div class="small-12 large-2 cell">
                                <label for="txtQtdeConvidados">Quantos Convidados</label>
                                <input type="text"  class="txtVerifica" id="txtQtdeConvidados" required="true" name="txtQtdeConvidados">


                            </div> 

                            <div class="small-12 large-2 cell">
                                <label for="txtTelefone">Placa do Carro </label>
                                <input type="text" required="true"  class="txtVerifica" id="txtTelefone" name="txtTelefone">
                            </div> 
                            
                            <div class="small-12 large-2 cell">
                                <label for="txtCep">Digite Seu CEP</label>
                                <input type="text" required="true" onchange="consultarCEP($(this).val())" class="txtVerifica" id="txtCep" name="txtCep" placeholder="Digite o CEP">
                            </div> 
                            
                            <div class="small-12 large-4 cell">
                                <label for="txtRua" class="enderecoValida">Rua</label>
                                <input type="text" required="true" readonly=""  class="txtRua enderecoValida" id="txtRua" name="txtRua" placeholder="">
                            </div> 
                            
                            <div class="small-12 large-1 cell">
                                <label for="txtNumero" class="enderecoValida">Nº</label>
                                <input type="text" required="true"  class="txtNumero enderecoValida txtVerifica " id="txtNumero  " name="txtNumero" placeholder="">
                            </div>
                            
                            <div class="small-12 large-2 cell">
                                <label for="txtComplemento" class="enderecoValida">Complemento</label>
                                <input type="text" required="true"  class="txtComplemento enderecoValida txtVerifica" id="txtComplemento" name="txtComplemento" placeholder="">
                            </div>
                              <div class="small-12 large-3 cell">
                                <label for="txtCidade" class="enderecoValida">Cidade</label>
                                <input type="text" required="true" readonly="true" class="txtCidade enderecoValida" id="txtCidade" name="<txtCidade></txtCidade>" placeholder="">
                            </div>
                            
                            <div class="small-12 large-12 cell">
                                <center>  <h3 id="mensagemErro" ></h3> </center>
                                
                            </div>
                            
                            
                            
                            
                        </div>
                    </fieldset>
                    <a class="button success " id="botCadastrarHospedes" onclick="verificar()" style="width: 100%">Iniciar Cadastro dos Hospedes </a>
                    
                    
                 

                    <fieldset class="fieldset" >
                        <legend>Hospedes Convidados
                        </legend>
                        <div id="inserirConvidados">

                        </div> 
                    </fieldset>
                </form>
            
                
            </div>
            
            
            
            
            
        </div>
        <script src="assets/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.mask.js" type="text/javascript"></script>


        <script> 
            
            $('.enderecoValida').hide();
            
            function consultarCEP(cep){
                
                $.getJSON( "https://viacep.com.br/ws/"+cep+"/json/", function( data ) {
                 
               
                    if( data['erro'] === true){
                       
                            console.log('erro');
                              $('#mensagemErro').html('Cep não encontrado, Digite novamente');
                              
                           

                            $('#txtCidade').val(' ');

                              $('.enderecoValida').show();
                    }else
                    {
                   
                    
                            $('#txtRua').val(data['logradouro']);

                            $('#txtCidade').val(data['bairro'] + ' - ' +data['localidade']);

                              $('.enderecoValida').show();
                                      
                    };
                
                
                
            });
        }
            
            
            $(document).ready(function() {
                $('#txtCPFPrincipal').mask("000.000.000-00");
                $('#txtTelefone').mask("(00) 00000-0000");
            })
            
            //verifica quantos campos possuem no formulario, para validar o preenchimento 
            
            $('.txtVerifica').click( function () {
                $(this).val('');
                $(this).css('background-color','white');
                 $(this).css("color","black");
                 $('#mensagemErro').html('');
                
            });
            
            function verificar(){
                    var contador=0;
                    var validos=0;
               $('#formularioCadastro').find('input[required=true]').each(function(){
                   
                   //conta os campos
                    contador++;
                });
             
             
                $('#formularioCadastro').find('input[required=true]').each(function(){
                    if($(this).val())
                        {
                        //campos preenchidos
                            validos++;
                            return true;

                      }
                      else
                        {
                            $(this).css("background-color","red");
                            $(this).css("color","white");
                            $(this).val('Preencher');
                            //campos vazios
                            validos=0;
                            
                            
                            
                        }
                });
                    
               

                if(validos === contador)
                    {
                        validador();
                        $('#botCadastrarHospedes').hide();
                        return true;
                    }
                else
                    {
                        return false;
                    }
             
            }
             
            function validador  (){
                 
                var nConvidados = $('#txtQtdeConvidados').val();
                
                
                      
                var  cont=1;
                while( cont <= nConvidados )
                    {
                        $("#inserirConvidados").append("<div class='grid-x grid-padding-x'> \n\
                            <div class='small-12 large-8 cell'>  \n\
                                    <label for='dataEntrada'>Nome Hóspede convidado</label> \n\
                                        <input type='text' id='txtHospedePrincipal' name='txtHospedePrincipal'>\n\
                            </div>\n\
                            <div class='small-12 large-4 cell'> \n\
                                <label for='txtCPFPrincipal'>CPF</label> \n\
                                         <input type='text' id='txtCPFPrincipal' name='txtCPFPrincipal'>\n\
                             </div> \n\
                        </div>");    
                            cont++;       
                    }
                                     };
                                     
                               
                        
        </script>
    </body>
</html>
