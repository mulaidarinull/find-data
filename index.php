<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cari Data Modal</title>
  </head>
  <body>
	<div class= "container">
		<h1>Cari data terus ditampilin :)</h1>
		<div class = "row">
			<div class = "col-md-6">			
			
				<div class="form-group">
					<label class="control-label">
						Nama <span class="symbol required"></span>
					</label>
					<div class="input-group">
						<input class="form-control" type="text" id="nama">
						<span class="input-group-btn">
							<button type="button" id="src" class="btn btn-primary" onclick="cari_data();">
								Cari
							</button>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">
						Alamat <span class="symbol required"></span>
					</label>
					<input class="form-control" type="text" id="alamat" >
				</div>
				<div class="form-group">
					<label class="control-label">
						Hobi <span class="symbol required"></span>
					</label>
					<input class="form-control" type="text" id="hobi" >
				</div>
			</div>
			
		</div>
	</div>
		
	
	<!-- Modal -->
	<div class="modal fade" id="searchdatamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			...
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<script>
		// Nampilin list data pilihan ===================
		function cari_data(){
			
			$.ajax({
				method : "POST",
				url : "cari-data.php",						
				success : function(data){					
					$("#searchdatamodal").modal('show');
					$("#searchdatamodal").find('.modal-body').html(data);
				}	
			})
			
		}
		
		// Buat dapetin data waktu di klik list data yang dipilih ==========
		function post() {		
			var table = document.getElementById("table_filter_find");
			var tbody = table.getElementsByTagName("tbody")[0];
			tbody.onclick = function (e) {
				e = e || window.event;
				var data = [];
				var target = e.srcElement || e.target;
				while (target && target.nodeName !== "TR") {
					target = target.parentNode;
				}
				if (target) {
					var cells = target.getElementsByTagName("td");
					for (var i = 0; i < cells.length; i++) {
						data.push('--separator--'+cells[i].innerHTML);
						dt = data.toString();
					
					}
				}
				
				dt_split = dt.split(",--separator--");

				$('#nama').val(((dt_split[0]).replace("--separator--","")).trim());
				$('#alamat').val(((dt_split[1]).replace("--separator--","")).trim());
				$('#hobi').val(((dt_split[2]).replace("--separator--","")).trim());
				
			};
		}
		
		
		/// Ini filter di list datanya yaaa ==========
		function cari_data_list(){
			var $rows = $('#isi_data tr');
			$('#search').keyup(function() {
				var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
				
				$rows.show().filter(function() {
					var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
					return !~text.indexOf(val);
				}).hide();
			});
		}
	</script>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	

 </body>
</html>