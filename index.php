<!doctype html>
<html lang="pt-br">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Exemplo Upload</title>

        <!--jQuery-->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		
		<!-- Bootstrap CSS CDN -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome JS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<!-- Custom JS -->
		<script src="script.js" type="text/javascript"></script>
	</head>
	<body>
        <div class="container mt-5">

            <form enctype="multipart/form-data" id="formulario" name="formulario">
                <div class="row">
                    <div class="col">
                        <label><b>Upload do arquivo</b></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="inputFile" id="inputFile" accept=".txt">
                                <label class="custom-file-label" for="inputFile">Selecione o arquivo</label>
                            </div>
                        </div>
                    </div>
                 <div class="col-3">
                      <label>&nbsp;</label>
                      <button type="button" class="btn btn-primary btn-block" id="carregar">Carregar</button>
                     </div>
                </div>
            </form>
            
            <div id="retorno"></div>
            
    </body>
</html> 

