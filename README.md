# teste-dev-pleno

Para configurar o banco de dados, precisa ser alterado as variaveis banco de dados do arquivo .env;
Para criação de tabelas, executar no terminal o seguinte comando:
	*php artisan migrate

Foi usado o model factories para criar dados na base de dados, execultar no terminal o seguinte comando
	*php artisan db:seed

Para envio dos dados e retorno do json, foi usado o Postman:
Vendedor:
  - Criar vendedor
	Tipo de envio (POST)
	Parametros:
	-nome tipo string (nome deve ser enviado string)
	-email tipo string (nome deve ser enviado string)	
	URL: http://localhost:8000/vendedores/store



VENDAS:
   - Listar todas as vendas de um vendedor
	Tipo de envio (POST)
	Parametro:
	 - vendedor_id : int (Deve ser enviado o ID do vendedor que é do tipo inteiro)	
	URL: http://localhost:8000/vendas/listar-all
  
   - Lançar nova venda para um vendedor	
       Tipo de envio (POST)		
       Parametros:
	- vendedor_id : int (Deve ser enviado o ID do vendedor que é do tipo inteiro)
	-valor_venda : float (Deve ser enviado o valor R$ que é do tipo float)
       URL:http://localhost:8000/vendas/store 

   -Listar todos os vendedores:
	Tipo de envio (GET)
	Parametros (Sem parametros)
	URL: http://localhost:8000/vendedores/listar-all
