<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="Pokemon API" content="Parse and Display Pokemon API data">
        <title>Pokedex!</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">   
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
        	 $(document).ready(function(){

        	//display all pokemon
        	var html_str = "";
        	for (var i  = 1; i < 100; i++)
        	{
        		html_str += "<img id ='" + i + "' src = 'http://pokeapi.co/media/img/" + i + ".png' />";
        	}
        	$("#pokemon").html(html_str);
	        });

        	 //populate pokedex based on which image is click on
        	$(document).on("click", "img", function(){
        		var html_str = "";
        		var id = $(this).attr("id");
        		$.get("http://pokeapi.co/api/v1/pokemon/" +id, function(output){
        			console.log(output)
        			html_str += "<h3>" +output.name+"</h3>";
        			html_str += "<img id=' "+id+" ' src = 'http://pokeapi.co/media/img/" +id+".png'>";
        			html_str += "<h4>Types</h4>";
        			html_str += "<ul>";
        			for(var i = 0; i < output.types.length; i++)
        			{
        				html_str += "<li>"+output.types[i].name+"</li>";
        			}
        			html_str += "</ul>";
        			html_str += "<h4>Height</h4>";
        			html_str += "<p>" + output.height + "</p>";
        			html_str += "<h4>Weight</h4>";
        			html_str += "<p>" + output.weight + "</p>";	
        			$("#pokebox").html(html_str);
        		})
        	})
		</script>
        <style>
            #pokebox {
                border: 15px solid red;
                width: 200px;
                height: 600px;
                }
            #pokemon {
                width: 700px;
            }
            .fixed {
                position: fixed;
                top: 20px;
            }
        </style>

	</head>


		<body>
            <div class="container-fluid">
                <div class = "col-md-8">
        			<div id="pokemon">
        			</div>
                </div>

                <div class="col-md-4">
        			<div class="fixed" id = "pokebox">
        			</div>
                </div>
            </div>
			
		</body>

</html>

